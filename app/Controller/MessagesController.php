<?php
App::uses('AppController', 'Controller');

class MessagesController extends AppController {

	public $components = array('Paginator', 'Session');

	/*
	*
	*	status = 0 : not read/ not sent
	*	in_out = 0 : out, 1 : in
	*
	*/


	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('public_report');
    }

    public function admin_dashboard_msg() {
    	$not_read = $this->Message->find('count', array(
    			'conditions' => array(
    				'Message.in_out' => 1,
    				'Message.status' => 0
    			)
    		)
    	);

    	$not_sent = $this->Message->find('count', array(
    			'conditions' => array(
    				'Message.in_out' => 0,
    				'Message.status' => 0
    			)
    		)
    	);

    	$balance = 500;

    	$this->set(compact('balance', 'not_read', 'not_sent'));
    }

	public function public_report() {
		if($this->request->is('post')) {
			$this->Message->create();
			$this->request->data['Message']['in_out'] = 1;
			$this->request->data['Message']['status'] = 0;
			if ($this->Message->save($this->request->data)) {
				return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'contact_thanks'));
			}
		}

		return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'contact'));
	}

	public function admin_sent() {
		$conditions = array('Message.in_out' => 0);
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Message.receiver_name LIKE' => '%' . $keyword . '%',
	                        'Message.receiver_phone LIKE' => '%' . $keyword . '%',
	                        'Message.subject LIKE' => '%' . $keyword . '%',
	                        'Message.text LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Message->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Message.status', 'Message.created' => 'DESC'),
        );

		$this->set('messages', $this->Paginator->paginate());
		$this->set('keyword');
	}

	public function admin_inbox() {
		$conditions = array('Message.in_out' => 1);
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Message.sender_name LIKE' => '%' . $keyword . '%',
	                        'Message.sender_phone LIKE' => '%' . $keyword . '%',
	                        'Message.subject LIKE' => '%' . $keyword . '%',
	                        'Message.text LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->Message->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('Message.status', 'Message.created' => 'DESC'),
        );

		$this->set('messages', $this->Paginator->paginate());
		$this->set('keyword');
	}

	public function admin_compose() {
		if ($this->request->is('post')) {

			// send msg here

			$count = 0;
			$numbers = explode(',', $this->request->data['Message']['numbers']);
			foreach ($numbers as $key => $number) {
				$this->Message->create();
				$this->request->data['Message']['in_out'] = 0;
				$this->request->data['Message']['status'] = 1;
				$this->request->data['Message']['receiver_phone'] = $number;
				if ($this->Message->save($this->request->data)) {
					$count += 1;
				}	
			}

			$this->Session->setFlash($count . ' message has been sent successfully.');
			return $this->redirect(array('action' => 'sent'));
		}
	}
}
