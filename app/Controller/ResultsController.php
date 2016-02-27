<?php
App::uses('AppController', 'Controller');

class ResultsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('public_result');
    }

	public function admin_index() {
		if ($this->request->is('post')) {
			if(!empty($this->request->data['session'])) {
				return $this->redirect(array('action' => 'index2', $this->request->data['session']));
			}
		}
		$this->loadModel('ClassName');
		$classNames = $this->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id'));
	}

	public function admin_index2($session=null) {
		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->loadModel('ClassName');
		$classNames = $this->ClassName->find('all');
		$class_name_id = null;
		$this->set(compact('classNames', 'class_name_id', 'session'));
	}

	public function _create_result_of_all ($session=null, $class_name_id=null) {
		$this->loadModel('Student');
		$conditions = array(
			'Student.class_name_id' => $class_name_id,
			'Student.session' => $session
		);
		$this->Student->recursive = -1;
        $students_list = $this->Student->find('list', array(
	            'conditions' => $conditions
            )
        );

		foreach ($students_list as $key => $item) {
        	for($i=1; $i<=3; $i++) {
        		$is_exist = $this->Result->find('first', array(
	        			'conditions'=>array(
	        				'Result.student_id'=> $item,
	        				'Result.term' => $i
	        			)
	        		)
	        	);
	        	if(empty($is_exist)) {
	        		$this->Result->create();
	        		$data['Result']['student_id'] = $item;
	        		$data['Result']['term'] = $i;
	        		$this->Result->save($data);
	        	}
        	}        	
        }
	}

	public function _create_result_of_student ($student_id=null) {
		$this->loadModel('Student');
		if (!$this->Student->exists($student_id)) {
			throw new NotFoundException(__('Invalid Student'));
		}

    	for($i=1; $i<=3; $i++) {
    		$is_exist = $this->Result->find('first', array(
        			'conditions'=>array(
        				'Result.student_id'=> $student_id,
        				'Result.term' => $i
        			)
        		)
        	);
        	if(empty($is_exist)) {
        		$this->Result->create();
        		$data['Result']['student_id'] = $student_id;
        		$data['Result']['term'] = $i;
        		$this->Result->save($data);
        	}
    	}
	}

	public function admin_list($session=null, $class_name_id=null, $term=1) {
		$this->loadModel('ClassName');
		if (!$this->ClassName->exists($class_name_id)) {
			throw new NotFoundException(__('Invalid class'));
		}

		if($session==null || $session>date('Y') || $session<2016) {
			$this->Session->setFlash(__('Invalid Session.'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->loadModel('Subject');
		$subjects = $this->Subject->find('list', array('conditions'=>array('Subject.class_name_id'=>$class_name_id)));
		#AuthComponent::_setTrace($subjects);

		$this->loadModel('Student');
		$conditions = array(
			'Student.class_name_id' => $class_name_id,
			'Student.session' => $session
		);
		$this->_create_result_of_all($session, $class_name_id);        

        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'Student.name_en LIKE' => '%' . $keyword . '%',
	                        'Student.name_bn LIKE' => '%' . $keyword . '%',
	                        'Student.roll_no' => $keyword,
	                        'Student.code LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}

		$this->Student->recursive = 2;
        $students = $this->Student->find('all', array(
	            'conditions' => $conditions,
	            'order' => 'Student.roll_no'
            )
        );
        foreach ($students as $key => $student) {
        	foreach ($student['Result'] as $result) {
        		if($result['term']==$term) {
        			$students[$key]['Marks'] = $result['Mark'];
        		}
        	}
        }
        #AuthComponent::_setTrace($students[0]);

		$this->ClassName->recursive = -1;
		$classNames = $this->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}

		$this->set(compact('students', 'classNames', 'class_name', 'class_name_id', 'session', 'term', 'subjects'));
		$this->set(compact('keyword'));
	}

	public function admin_find_by_code() {
		$this->loadModel('Student');
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
	        	return $this->redirect(array('action' => 'edit', $is_exist['Student']['id'], 1));
	        }
	    } else {
	    	$this->Session->setFlash(__('Invalid Request.'));
	    	return $this->redirect(array('action' => 'index'));
	    }
	}

	public function admin_edit($student_id=null, $term=null) {
		$this->loadModel('Student');
		if (!$this->Student->exists($student_id)) {
			throw new NotFoundException(__('Invalid Student'));
		}

		$this->_create_result_of_student($student_id);

		$conditions = array(
			'Student.id' => $student_id
		);
		$this->Student->recursive = 2;
		$students = $this->Student->find('all', array('conditions'=>$conditions));

        foreach ($students as $key => $student) {
        	foreach ($student['Result'] as $result) {
        		if($result['term']==$term) {
        			$result_id = $result['id'];
        			$students[$key]['Marks'] = $result['Mark'];
        		}
        	}
        }
        #AuthComponent::_setTrace($students[0]['Marks']);
        $student = $students[0];

        $class_name_id = $student['Student']['class_name_id'];
        $session = $student['Student']['session'];

        $this->loadModel('ClassName');
        $this->ClassName->recursive = -1;
		$classNames = $this->ClassName->find('all');
		$class_name = "";
		foreach ($classNames as $key => $className) {
			if($className['ClassName']['id']==$class_name_id) {
				$class_name = $className['ClassName']['name'];
				break;
			}
		}

		$this->loadModel('Subject');
		$subjects = $this->Subject->find('list', array('conditions'=>array('Subject.class_name_id'=>$class_name_id)));
		#AuthComponent::_setTrace($subjects);

		if ($this->request->is(array('post', 'put'))) {
			#AuthComponent::_setTrace($this->request->data);
			foreach ($subjects as $key => $subject) {
				$this->loadModel('Mark');
				$is_exist = $this->Mark->find('first', array(
						'conditions'=>array(
							'Mark.result_id'=>$result_id,
							'Mark.subject_id'=>$key
						)
					)
				);

				$data['Mark']['result_id'] = $result_id;
				$data['Mark']['subject_id'] = $key;
				$data['Mark']['monthly'] = $this->request->data['m_'.$key];
				$data['Mark']['terminal'] = $this->request->data['t_'.$key];
				#AuthComponent::_setTrace($data);
				if(empty($is_exist)) {
					$this->Mark->create();
					$this->Mark->save($data);
				}
				else {
					$this->Mark->id = $is_exist['Mark']['id'];
					$this->Mark->save($data);
				}
			}
			$data['Result']['student_id'] = $student_id; 
			$data['Result']['term'] = $term;
			$this->Session->setFlash(__('The result has been updated.'));
			return $this->redirect(array('action' => 'edit', $student_id, $term));

		}

        $this->set(compact('student', 'classNames', 'class_name', 'class_name_id', 'session', 'term', 'subjects'));
	}

	public function admin_delete($student_id=null, $term=null) {
		$this->loadModel('Student');
		if (!$this->Student->exists($student_id)) {
			throw new NotFoundException(__('Invalid Student'));
		}

		$conditions = array(
			'Student.id' => $student_id
		);
		$students = $this->Student->find('all', array('conditions'=>$conditions));
        foreach ($students as $key => $student) {
        	$session = $student['Student']['session'];
        	$class_name_id = $student['Student']['class_name_id'];
        	foreach ($student['Result'] as $result) {
        		if($result['term']==$term) {
        			$result_id = $result['id'];
        		}
        	}
        }
		#AuthComponent::_setTrace($result_id);

		$this->loadModel('Mark');
		if($this->Mark->deleteAll(array('Mark.result_id' => $result_id))){
			$this->Session->setFlash(__('The result has been deleted.'));
		} else {
			$this->Session->setFlash(__('The result could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'list', $session, $class_name_id, $term));
	}

	public function public_result () {
		$this->autoRender = false;
		$this->loadModel('Student');
		if($this->request->is('post')) {
            $password = AuthComponent::password($this->request->data['Student']['password']);
            $query = array(
                'conditions' => array(
                    'Student.code' => $this->request->data['Student']['code'],
                    'Student.password' => $password,
                )
            );

            $this->Student->recursive = 2;
            $is_exist = $this->Student->find('first', $query);
            #AuthComponent::_setTrace($is_exist);
            if(empty($is_exist)) {
				return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'result_index_error'));
            }
            $this->_create_result_of_student($is_exist['Student']['id']);

            $student['Student'] = $is_exist['Student'];
            $student['ClassName'] = $is_exist['ClassName']['name'];
            $class_name_id = $is_exist['ClassName']['id'];

			$this->loadModel('Subject');
			$subjects = $this->Subject->find('list', array('conditions'=>array('Subject.class_name_id'=>$class_name_id)));
			#AuthComponent::_setTrace($subjects);

            foreach ($is_exist['Result'] as $result) {
				foreach ($result['Mark'] as $mark) {
					$m = !empty($mark['monthly']) ? $mark['monthly'] : 0;
					$t = !empty($mark['terminal']) ? $mark['terminal'] : 0;
					$student['Marks'][$result['term']][$mark['subject_id']]['monthly'] = $m;
					$student['Marks'][$result['term']][$mark['subject_id']]['terminal'] = $t;
					$student['Marks'][$result['term']][$mark['subject_id']]['total'] = $m + $t;
				}
        	}
			#AuthComponent::_setTrace($student);


        	/*
        	* finding highest marks // this code can also find the posted student result, so
        	* actually no need of above code. But, not edited due to laziness.
        	*/
        	foreach ($subjects as $key => $subject) {
        		$highest[1][$key] = 0;
        		$highest[2][$key] = 0;
        		$highest[3][$key] = 0;
        	}

            // first find all classmates of this student including himself
            $this->Student->recursive = 0;
            $classmates = $this->Student->find('list', array(
	                'conditions' => array(
	                    'Student.class_name_id' => $class_name_id,
	                    'Student.session' => $is_exist['Student']['session']
	                )
	            )
            );
            for($i=1; $i<=3; $i++) {
            	foreach ($classmates as $classmate) {
            		// find this mate result id of this term
            		$this->Result->recursive = -1;
            		$classmate_result = $this->Result->find('first', array(
            				'fields' => array('Result.id'),
	            			'conditions' => array(
			                    'Result.student_id' => $classmate,
			                    'Result.term' => $i
			                )
	            		)
	            	);
	            	$this->loadModel('Mark');
	            	$this->Mark->recursive = -1;
	            	
	            	// find marks for each subject of this mate in this result
	            	foreach ($subjects as $key => $subject) {
	            		$classmate_marks = $this->Mark->find('first', array(
	            				'fields' => array('Mark.monthly', 'Mark.terminal'),
		            			'conditions' => array(
				                    'Mark.result_id' => $classmate_result['Result']['id'],
				                    'Mark.subject_id' => $key
				                )
		            		)
		            	);
		            	$m = !empty($classmate_marks['Mark']['monthly']) ? $classmate_marks['Mark']['monthly'] : 0;
		            	$t = !empty($classmate_marks['Mark']['terminal']) ? $classmate_marks['Mark']['terminal'] : 0;
		            	
		            	// dynamic association of highest marks of this subject in this term
		            	if( ( $m+$t ) > $highest[$i][$key] )
	            			$highest[$i][$key] = $m+$t;
	            	}
            	}            	
            }
            #AuthComponent::_setTrace($highest);

			




			$page = $subpage = $title_for_layout = "result";
			$this->set(compact('page', 'subpage', 'title_for_layout'));

			$this->loadModel('News');
			$this->News->recursive = 0;
			$latest_news = $this->News->find('all', array(
				'order' => 'News.created DESC',
				'limit' => 5
			));
			$this->set(compact('latest_news'));

			$this->set(compact('student', 'class_name_id', 'subjects', 'highest'));
			$this->layout = 'public';
			$this->render('../Pages/results');
		} else {
			return $this->redirect(array('pages', 'action' => 'display', 'result'));
		}
	}
}
