<?php
App::uses('AppController', 'Controller');

class AccountingsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index ($type = null) {
		$conditions = array('Accounting.debit_credit' => $type);
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' => array(
	                        'Accounting.amount LIKE' => '%' . $keyword . '%',
	                        'Accounting.name LIKE' => '%' . $keyword . '%',
	                        'Accounting.date LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}

		if(!empty($this->request->params['named']['from']) && !empty($this->request->params['named']['to'])) {
			$from = $this->request->params['named']['from'];
			$to = $this->request->params['named']['to'];
		} else {
			$from = date('Y-m-01', time());
			$to = date('Y-m-t', time());
		}
        $conditions = am($conditions, array(
                'Accounting.date BETWEEN ? AND ?' => array( $from, $to )
            )
        );     
        $this->Accounting->recursive = 0;
        $this->paginate = array('all',
            'conditions' => $conditions,
            'order' => array('Accounting.date'),
        );
        //AuthComponent::_setTrace($this->Paginator->paginate());
		$this->set('accountings', $this->Paginator->paginate());

		$debit_credit = $type ? "Credit" : "Debit";
		$this->set(compact('keyword', 'type', 'debit_credit', 'from', 'to'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Accounting->create();
			if($this->request->data['Accounting']['debit_credit']) {
				$this->request->data['Accounting']['category_id'] = $this->request->data['Accounting']['credit_category'];
			} else {
				$this->request->data['Accounting']['category_id'] = $this->request->data['Accounting']['debit_category'];
			}
			if ($this->Accounting->save($this->request->data)) {
				$this->Session->setFlash(__('The accounting has been saved.'));
				$type = $this->request->data['Accounting']['debit_credit'];
				if(empty($type)) 
					$type = 0;
				return $this->redirect(array('action' => 'index', $type));
			} else {
				$this->Session->setFlash(__('The accounting could not be saved. Please, try again.'));
			}
		}
		$debit_categories = $this->Accounting->Category->find('list', array('conditions'=>array('debit_credit'=>0)));
		$credit_categories = $this->Accounting->Category->find('list', array('conditions'=>array('debit_credit'=>1)));
		$this->set(compact('debit_categories','credit_categories'));
	}

	public function admin_edit($id = null) {
		if (!$this->Accounting->exists($id)) {
			throw new NotFoundException(__('Invalid accounting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Accounting']['debit_credit']) {
				$type = 1;
				$this->request->data['Accounting']['category_id'] = $this->request->data['Accounting']['credit_category'];
			} else {
				$type = 0;
				$this->request->data['Accounting']['category_id'] = $this->request->data['Accounting']['debit_category'];
			}
			$this->Accounting->id = $id;
			if ($this->Accounting->save($this->request->data)) {
				$this->Session->setFlash(__('The accounting has been saved.'));
				return $this->redirect(array('action' => 'index', $type));
			} else {
				$this->Session->setFlash(__('The accounting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Accounting.' . $this->Accounting->primaryKey => $id));
			$this->request->data = $this->Accounting->find('first', $options);
		}

		$debit_categories = $this->Accounting->Category->find('list', array('conditions'=>array('debit_credit'=>0)));
		$credit_categories = $this->Accounting->Category->find('list', array('conditions'=>array('debit_credit'=>1)));
		$this->set(compact('debit_categories','credit_categories'));
	}

	public function admin_delete($id = null) {
		$this->Accounting->id = $id;
		if (!$this->Accounting->exists()) {
			throw new NotFoundException(__('Invalid accounting'));
		}
		
		$options = array('conditions' => array('Accounting.' . $this->Accounting->primaryKey => $id));
		$data = $this->Accounting->find('first', $options);
		$type = $data['Accounting']['debit_credit'];
		if(empty($type)) 
			$type = 0;

		$this->request->allowMethod('post', 'delete');
		if ($this->Accounting->delete()) {
			$this->Session->setFlash(__('The accounting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The accounting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index', $type));
	}

}
