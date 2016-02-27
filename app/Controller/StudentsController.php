<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['session'])) {
				return $this->redirect(array('action' => 'index2', $this->request->data['session']));
			}
		}
		$classNames = $this->Student->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id'));
	}

	public function admin_index2($session=null) {
		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('action' => 'index'));
		}
		$classNames = $this->Student->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id', 'session'));
	}

	public function admin_list($session=null, $class_name_id=null) {
		if (!$this->Student->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('action' => 'index'));
		}

		$conditions = array(
			'Student.class_name_id' => $class_name_id,
			'Student.session' => $session
		);
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Student.name_en LIKE' => '%' . $keyword . '%',
	                        'Student.name_bn LIKE' => '%' . $keyword . '%',
	                        'Student.roll_no LIKE' => '%' . $keyword . '%',
	                        'Student.father_name_bn LIKE' => '%' . $keyword . '%',
	                        'Student.father_name_en LIKE' => '%' . $keyword . '%',
	                        'Student.mother_name_en LIKE' => '%' . $keyword . '%',
	                        'Student.mother_name_bn LIKE' => '%' . $keyword . '%',
	                        'Student.mobile LIKE' => '%' . $keyword . '%',
	                        'Student.blood_group LIKE' => '%' . $keyword . '%',
	                        'Student.code LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}

		$this->Student->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => 'Student.roll_no'
        );

		$this->set('students', $this->Paginator->paginate());

		$this->Student->ClassName->recursive = -1;
		$classNames = $this->Student->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}

		$this->set(compact('classNames', 'class_name', 'class_name_id', 'session'));
		$this->set(compact('keyword'));
	}

	public function admin_find_by_code() {
		if ($this->request->is('post')) {
			$code = $this->request->data['Student']['code'];
			$is_exist = $this->Student->find('first', array(
		            'conditions' => array('Student.code' => $code)
	          	)
	        );
	        if(empty($is_exist)) {
	        	$this->Session->setFlash(__('The student could not be found.'));
	        	return $this->redirect(array('action' => 'index'));
	        } else {
	        	return $this->redirect(array('action' => 'edit', $is_exist['Student']['id']));
	        }
	    } else {
	    	$this->Session->setFlash(__('Invalid Request.'));
	    	return $this->redirect(array('action' => 'index'));
	    }
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$code_1 = $this->request->data['Student']['session'] % 100;
			$code_1 = $code_1<10 ? "0".strval($code_1) : strval($code_1);
			$code_2 = $this->request->data['Student']['class_name_id'] % 100;
			$code_2 = $code_2<10 ? "0".strval($code_2) : strval($code_2);
			$code_3 = $this->request->data['Student']['roll_no'];
			$code_3 = $code_3<10 ? "0".strval($code_3) : strval($code_3);

			$this->request->data['Student']['code'] = $code_1.$code_2.$code_3;
			$this->request->data['Student']['simple_pwd'] = $this->random_string(6,1);
			$this->request->data['Student']['password'] = AuthComponent::password($this->request->data['Student']['simple_pwd']);
			if (!empty($this->request->data['Student']['image']['name'])) {
                $file_name = $this->_upload($this->request->data['Student']['image'], 'students_images');
                $this->request->data['Student']['image'] = $file_name;
            } else {
                unset($this->request->data['Student']['image']);
            }            
			//AuthComponent::_setTrace($this->request->data);

			$this->Student->create();
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'list', $this->request->data['Student']['session'], $this->request->data['Student']['class_name_id']));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		}
		$classNames = $this->Student->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_edit($id = null) {
		if (!$this->Student->exists($id)) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$code_1 = $this->request->data['Student']['session'] % 100;
			$code_1 = $code_1<10 ? "0".strval($code_1) : strval($code_1);
			$code_2 = $this->request->data['Student']['class_name_id'] % 100;
			$code_2 = $code_2<10 ? "0".strval($code_2) : strval($code_2);
			$code_3 = $this->request->data['Student']['roll_no'];
			$code_3 = $code_3<10 ? "0".strval($code_3) : strval($code_3);

			$this->request->data['Student']['code'] = $code_1.$code_2.$code_3;
			$this->request->data['Student']['password'] = AuthComponent::password($this->request->data['Student']['simple_pwd']);

			if (!empty($this->request->data['Student']['image'])) {
                if (!empty($this->request->data['Student']['image']['name'])) {
	                $file_name = $this->_upload($this->request->data['Student']['image'], 'students_images');
	                $this->request->data['Student']['image'] = $file_name;
	            } else {
                    $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
                    $data = $this->Student->find('first', $options);
                    $this->request->data['Student']['image'] = $data['Student']['image'];
                }
            } else {
                unset($this->request->data['Student']['image']);
            }

			$this->Student->id = $id;
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('The student has been saved.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The student could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
			$this->request->data = $this->Student->find('first', $options);
		}
		$classNames = $this->Student->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_delete($id = null) {
		$this->Student->id = $id;
		if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Student->delete()) {
			$this->Session->setFlash(__('The student has been deleted.'));
		} else {
			$this->Session->setFlash(__('The student could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
