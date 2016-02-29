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

	public function admin_view($id) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message.'));
		}

		$message = $this->Message->findById($id);

		if($message['Message']['in_out'] && !$message['Message']['status']) {			
			$this->Message->id = $id;
			$data['Message']['status'] = 1;
			$this->Message->save($data);
		}

		$this->set(compact('message'));
	}

	public function admin_resend($id) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message.'));
		}
		$data = $this->Message->findById($id);
		#AuthComponent::_setTrace($data);

		$receiver = substr($data['Message']['receiver_phone'], 3); 
		$message = $data['Message']['text'];
		$receiver_name = $data['Message']['receiver_name'];
		$subject = $data['Message']['subject'];

		$this->Message->id = $id;
		$this->Message->delete();

		$return_to = "messages/sent";
		$flash_msg = "Message successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_compose() {
		if ($this->request->is('post')) {
			$count = 0;
			$numbers = explode(',', $this->request->data['Message']['numbers']);
			foreach ($numbers as $key => $number) {
				$this->Message->create();
				$this->request->data['Message']['in_out'] = 0;
				$this->request->data['Message']['status'] = 1;
				$this->request->data['Message']['receiver_phone'] = '+88' . $number;

				// send msg here

				if ($this->Message->save($this->request->data)) {
					$count += 1;
				}	
			}

			if(!empty($this->request->data['return_to'])) {
				$return_to = explode("/", $this->request->data['return_to']);
				$this->Session->setFlash($this->request->data['flash_msg']);
				
				$redirect_array['controller'] = $return_to[0];
				$redirect_array['action'] = $return_to[1];
				for($i=2; $i<=5; $i++) {
					if(!empty($return_to[$i])) {
						array_push($redirect_array, $return_to[$i]);
					}
				}
				return $this->redirect($redirect_array);
			}

			$this->Session->setFlash($count . ' message has been sent successfully.');
			return $this->redirect(array('action' => 'sent'));
		}
	}

	public function admin_send_notice($id = null, $to = null) {
		$this->loadModel('Notice');
		$this->Notice->id = $id;
		if (!$this->Notice->exists()) {
			throw new NotFoundException(__('Invalid notice'));
		}

		if(empty($this->request->params['named']['to'])) {
			$this->Session->setFlash(__('Invalid Receiver.'));
			return $this->redirect(array('controller'=>'notices', 'action' => 'edit', $id));	
		}

		$to = $this->request->params['named']['to'];

		$data = array();
		if($to == 'everyone') {
			$this->loadModel('Student');
			$this->Student->recursive = -1;
			$data = am($data, $this->Student->find('list', array(
					'fields' => 'Student.mobile',
					'conditions' => array('Student.session' => date('Y'))
				)
			));

			$this->loadModel('Teacher');
			$this->Teacher->recursive = -1;
			$data = am($data, $this->Teacher->find('list', array(
					'fields' => 'Teacher.mobile'
				)
			));
		} elseif($to == 'students') {
			$this->loadModel('Student');
			$this->Student->recursive = -1;
			$data = am($data, $this->Student->find('list', array(
					'fields' => 'Student.mobile',
					'conditions' => array('Student.session' => date('Y'))
				)
			));
		} elseif($to == 'teachers') {
			$this->loadModel('Teacher');
			$this->Teacher->recursive = -1;
			$data = am($data, $this->Teacher->find('list', array(
					'fields' => 'Teacher.mobile'
				)
			));
		} else {
			$this->Session->setFlash(__('Invalid Receiver.'));
			return $this->redirect(array('controller'=>'notices', 'action' => 'edit', $id));
		}

		$receiver = implode(',', $data);
		$notice = $this->Notice->findById($id);
		$message = $notice['Notice']['notice'];
		$receiver_name = "Notice";
		$subject = $notice['Notice']['title'];
		$return_to = "notices/edit/".$id;
		$flash_msg = "Notice successfully sent to " . $to;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_send_sms_to_teacher($id = null) {
		$data = array();
		$this->loadModel('Teacher');
		$this->Teacher->id = $id;
		if (!$this->Teacher->exists()) {
			throw new NotFoundException(__('Invalid teacher'));
		}
		$this->Teacher->recursive = -1;
		$teacher = $this->Teacher->findById($id);

		$receiver = $teacher['Teacher']['mobile'];
		$message = "";
		$receiver_name = $teacher['Teacher']['name'];
		$subject = "";
		$return_to = "teachers/index";
		$flash_msg = "Message successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_send_sms_to_all_teacher() {
		$data = array();
		$this->loadModel('Teacher');
		$this->Teacher->recursive = -1;
		$teachers = $this->Teacher->find('list', array(
				'fields' => 'Teacher.mobile'
			)
		);

		$receiver = implode(',', $teachers);
		$message = "";
		$receiver_name = "All Teachers";
		$subject = "";
		$return_to = "teachers/index";
		$flash_msg = "Message successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_send_result_to_students($session=null, $class_name_id = null, $term=null) {
		$this->loadModel('Student');
		$this->loadModel('ClassName');
		if (!$this->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('controller'=>'results', 'action' => 'list', $session, $class_name_id, $term));
		}

		$students = $this->Student->find('list', array(
				'fields' => 'Student.mobile',
				'conditions' => array(
					'Student.session' => $session,
					'Student.class_name_id' => $class_name_id
				)
			)
		);

		$receiver = implode(',', $students);
		$message = "Result for term " . $term . " has been published.";
		$receiver_name = "Students";
		$subject = "Result";
		$return_to = "results/list/$session/$class_name_id/$term";
		$flash_msg = "Result successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_send_sms_to_student($id = null) {
		$this->loadModel('Student');
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}

		$this->Student->recursive = -1;
		$student = $this->Student->find('first', array(
				'fields' => array('Student.mobile', 'Student.name_en', 'Student.session', 'Student.class_name_id'),
				'conditions' => array(
					'Student.id' => $id
				)
			)
		);

		$receiver = $student['Student']['mobile'];
		$message = "";
		$receiver_name = $student['Student']['name_en'];
		$subject = "";
		$return_to = "students/list/" . $student['Student']['session'] . "/" . $student['Student']['class_name_id'];
		$flash_msg = "Message successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}

	public function admin_send_sms_to_all_students($session=null, $class_name_id=null) {
		$this->loadModel('Student');
		$this->loadModel('ClassName');
		if (!$this->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('controller'=>'results', 'action' => 'list', $session, $class_name_id, $term));
		}

		$students = $this->Student->find('list', array(
				'fields' => 'Student.mobile',
				'conditions' => array(
					'Student.session' => $session,
					'Student.class_name_id' => $class_name_id
				)
			)
		);

		$receiver = implode(',', $students);
		$message = "";
		$receiver_name = "All Students";
		$subject = "";
		$return_to = "students/list/$session/$class_name_id";
		$flash_msg = "Message successfully sent to " . $receiver_name;

		$this->set(compact('receiver_name', 'subject', 'receiver', 'message', 'return_to', 'flash_msg'));
		$this->render('admin_compose_with_data');
	}
}
