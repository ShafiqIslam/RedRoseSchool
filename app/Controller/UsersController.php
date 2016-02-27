<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
        $conditions = array();
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'User.email LIKE' => '%' . $keyword . '%',
	                        'User.username LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->User->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('User.created' => 'DESC'),
        );

		$this->set('users', $this->Paginator->paginate());
		$this->set('keyword', $keyword);
	}

	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['simple_pwd']);
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_login() {
        if($this->request->is('post')){
            $password = AuthComponent::password($this->request->data['User']['password']);
            $query = array(
                'conditions' => array(
                    'User.username' => $this->request->data['User']['username'],
                    'User.password' => $password,
                ),
            );
            $is_exist = $this->User->find('first', $query);
            if(!empty($is_exist)){
                $this->Auth->login($this->request->data['User']);
                // logged in
                // did they select the remember me checkbox?
                if ($this->request->data['User']['remember_me'] == 1) {
                    unset($this->request->data['User']['remember_me']);
                    $this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                }

                $this->redirect(array('action' => 'dashboard', 'admin' => true));
            }else{
                $this->Auth->logout();
                $this->Session->setFlash(__('Incorrect username or password, please try again.'), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_dashboard() {

    }

    public function admin_dashboard_academic() {

    }

    public function admin_dashboard_administration() {

    }

    public function admin_dashboard_accounting() {
    	$this->loadModel('Accounting');

    	if(!empty($this->request->params['named']['from']) && !empty($this->request->params['named']['to'])) {
			$from = $this->request->params['named']['from'];
			$to = $this->request->params['named']['to'];
		} else {
			$from = date('Y-m-01', time());
			$to = date('Y-m-t', time());
		}
     
        $this->Accounting->recursive = 0;
        $credits = $this->Accounting->find('all', array(
        		'fields' => array('SUM(Accounting.amount) AS credit'), 
	            'conditions' => array(
	            	'Accounting.debit_credit' => 1,
	            	'Accounting.date BETWEEN ? AND ?' => array( $from, $to )
	            )
	        )
        );
        $debits = $this->Accounting->find('all', array(
        		'fields' => array('SUM(Accounting.amount) AS debit'), 
	            'conditions' => array(
	            	'Accounting.debit_credit' => 0,
	            	'Accounting.date BETWEEN ? AND ?' => array( $from, $to )
	            )
	        )
        );

        $credit = $credits[0][0]['credit'];
        if(empty($credit))
        	$credit = 0;

        $debit = $debits[0][0]['debit'];
        if(empty($debit))
        	$debit = 0;
        
        $total = $credit - $debit;
        $this->set(compact('credit', 'debit', 'total', 'from', 'to'));
    }

    public function admin_dashboard_event() {

    }

    public function admin_dashboard_settings() {

    }

    //admin logout
    public function admin_logout() {
        $this->redirect($this->Auth->logout());
    }
}
