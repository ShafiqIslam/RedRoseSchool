<?php
App::uses('AppController', 'Controller');

class OnlineApplicationsController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('public_add', 'public_complete', 'public_status', 'test_create_PDF');
    }

	public function admin_index() {
		$conditions = array('NOT' => array('OnlineApplication.status' => 'Admitted'));
        $keyword = null;
		if(!empty($this->request->params['named']['keyword'])) {
			$keyword = $this->request->params['named']['keyword'];
			if (!empty($keyword)) {
	        	$conditions = am($conditions, array(
	                    'OR' =>array(
	                        'OnlineApplication.token LIKE' => '%' . $keyword . '%',
	                        'OnlineApplication.name_en LIKE' => '%' . $keyword . '%',
	                        'OnlineApplication.name_bn LIKE' => '%' . $keyword . '%'
	                    )
	                )
	            );
	        } 
		}
               
        $this->OnlineApplication->recursive = 1;
        $this->paginate = array('all',
            'limit' => 20,
            'conditions' => $conditions,
            'order' => array('OnlineApplication.class_name_id'),
        );

        $this->set('keyword', $keyword);
		$this->set('onlineApplications', $this->Paginator->paginate());
	}

	public function admin_edit($id = null) {
		if (!$this->OnlineApplication->exists($id)) {
			throw new NotFoundException(__('Invalid online application'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->OnlineApplication->id = $id;
			if ($this->OnlineApplication->save($this->request->data)) {
				$this->Session->setFlash(__('The online application has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The online application could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OnlineApplication.' . $this->OnlineApplication->primaryKey => $id));
			$this->request->data = $this->OnlineApplication->find('first', $options);
		}
		$classNames = $this->OnlineApplication->ClassName->find('list');
		$this->set(compact('classNames'));
	}

	public function admin_change($id = null, $change=null) {
		$this->OnlineApplication->id = $id;
		if (!$this->OnlineApplication->exists()) {
			throw new NotFoundException(__('Invalid online application'));
		}
		
		if($change==null) {
			return $this->redirect(array('action' => 'edit', $id));
		} elseif($change==1) {
			$data['OnlineApplication']['status'] = "Granted";

			//make pdf here

			$data['OnlineApplication']['pdf_link'] = "";
			$this->OnlineApplication->save($data);
			return $this->redirect(array('action' => 'edit', $id));
		} elseif($change==2) {
			$data['OnlineApplication']['status'] = "Declined";
			$this->OnlineApplication->save($data);
			return $this->redirect(array('action' => 'edit', $id));
		} elseif($change==4) {
			$data['OnlineApplication']['status'] = "In Queue";
			$this->OnlineApplication->save($data);
			return $this->redirect(array('action' => 'edit', $id));
		} elseif($change==3) {
			$options = array('conditions' => array('OnlineApplication.' . $this->OnlineApplication->primaryKey => $id));
			$data = $this->OnlineApplication->find('first', $options);

			$exclude_keys = array("id","status","token","pdf_link","created","modified");
			foreach ($data['OnlineApplication'] as $key => $value) {
				if(!in_array($key, $exclude_keys))
					$student_data['Student'][$key] = $value;
			}

			$student_data['Student']['session'] = date('Y');
			$this->loadModel('Student');
			$max_roll = $this->Student->find('all', array(
					'fields' => array('MAX(Student.roll_no) AS max'),
					'conditions' => array(
						'Student.class_name_id' => $student_data['Student']['class_name_id'],
						'Student.session' => $student_data['Student']['session']
					)
				)
			);
			$student_data['Student']['roll_no'] = $max_roll[0][0]['max']+1;

			$code_1 = $student_data['Student']['session'] % 100;
			$code_1 = $code_1<10 ? "0".strval($code_1) : strval($code_1);
			$code_2 = $student_data['Student']['class_name_id'] % 100;
			$code_2 = $code_2<10 ? "0".strval($code_2) : strval($code_2);
			$code_3 = $student_data['Student']['roll_no'];
			$code_3 = $code_3<10 ? "0".strval($code_3) : strval($code_3);

			$student_data['Student']['code'] = $code_1.$code_2.$code_3;
			$student_data['Student']['simple_pwd'] = $this->random_string(6,1);
			$student_data['Student']['password'] = AuthComponent::password($student_data['Student']['simple_pwd']);

			$this->Student->create();
			$this->Student->save($student_data);

			$s_data['OnlineApplication']['status'] = "Admitted";
			$this->OnlineApplication->save($s_data);
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function admin_delete($id = null) {
		$this->OnlineApplication->id = $id;
		if (!$this->OnlineApplication->exists()) {
			throw new NotFoundException(__('Invalid online application'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OnlineApplication->delete()) {
			$this->Session->setFlash(__('The online application has been deleted.'));
		} else {
			$this->Session->setFlash(__('The online application could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function test_create_PDF () {
		//$this->_create_PDF(1);
		AuthComponent::_setTrace($this->_create_PDF(1));
	}

	private function _create_PDF($id){
        $this->autoRender = false;
        $this->layout = false;
        ini_set('max_execution_time', 0);

        $options = array('conditions' => array('OnlineApplication.' . $this->OnlineApplication->primaryKey => $id));
		$data = $this->OnlineApplication->find('first', $options);        
        #AuthComponent::_setTrace($data);

        $this->set(compact('data'));
        $html = $this->render('application_pdf');

        App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
        spl_autoload_register('DOMPDF_autoload');
        $dompdf = new DOMPDF();
        $dompdf->set_base_path(WWW_ROOT);
        $dompdf->load_html($html);
        $dompdf->render();
        $output = $dompdf->output();
        $file = time() . rand(1,999) . '.' .'pdf';
        $fileName = WWW_ROOT . 'files' . DS . 'online_applications' . DS . $file;
        file_put_contents($fileName, $output);
        return $file;
    }
	
	

	/*
	*
	* Front End functions
	*
	*/
	public function public_add() {
		$this->autoRender = false;
		$this->autoLayout = false;
		if ($this->request->is('post')) {
			#AuthComponent::_setTrace($this->request->data);
			$this->request->data['OnlineApplication']['status'] = 'In Queue';
			$this->request->data['OnlineApplication']['token'] = time();
			$this->OnlineApplication->create();
			if ($this->OnlineApplication->save($this->request->data)) {
				/*
				*
				* Send Message Here
				*
				*/

				return $this->redirect(array('action' => 'public_complete', 1, $this->request->data['OnlineApplication']['token']));
			} else {
				return $this->redirect(array('action' => 'public_complete', 0));
			}
		}
		return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'online_application'));
	}

	public function public_complete($success=null, $token=null) {
		if($success==null) {
			return $this->redirect(array('controller'=>'pages', 'action' => 'display', 'online_application'));
		}

		$path = func_get_args();

		$count = count($path);
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = "public";


		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

        $this->set(compact('success', 'token'));
		$this->render("../Pages/application_message");
	}

	public function public_status() {
		if ($this->request->is('post')) { 
			$is_exist = $this->OnlineApplication->find('first', array(
					'conditions' => array('OnlineApplication.token' => $this->request->data['OnlineApplication']['token'])
				)
			);
			$msg = 1;
			$this->set(compact('is_exist', 'msg'));
		}

		$path = func_get_args();
		$count = count($path);
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}

		
		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->layout = "public";
		$this->render("../Pages/application_status");
	}
}
