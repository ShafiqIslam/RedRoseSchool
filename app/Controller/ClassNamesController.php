<?php
App::uses('AppController', 'Controller');
/**
 * ClassNames Controller
 *
 * @property ClassName $ClassName
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ClassNamesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('book_list');
	}

	public function admin_index() {
		$this->ClassName->recursive = 0;
		$this->set('classNames', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ClassName->create();
			if ($this->ClassName->save($this->request->data)) {
				$this->Session->setFlash(__('The class name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The class name could not be saved. Please, try again.'));
			}
		}
		$teachers = $this->ClassName->Teacher->find('list');
		$this->set(compact('teachers'));
	}

	public function admin_edit($id = null) {
		if (!$this->ClassName->exists($id)) {
			throw new NotFoundException(__('Invalid class name'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->ClassName->id = $id;

			if (!empty($this->request->data['ClassName']['book_list'])) {
				if (!empty($this->request->data['ClassName']['book_list']['name'])) {
					$file_name = $this->_upload_file($this->request->data['ClassName']['book_list'], 'book_lists');
					$this->request->data['ClassName']['book_list'] = $file_name;
				} else {
					$options = array('conditions' => array('ClassName.' . $this->ClassName->primaryKey => $id));
					$data = $this->ClassName->find('first', $options);
					$this->request->data['ClassName']['book_list'] = $data['ClassName']['book_list'];
				}
			} else {
				unset($this->request->data['ClassName']['book_list']);
			}

			if ($this->ClassName->save($this->request->data)) {
				$this->Session->setFlash(__('The class name has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The class name could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ClassName.' . $this->ClassName->primaryKey => $id));
			$this->request->data = $this->ClassName->find('first', $options);
		}
		$teachers = $this->ClassName->Teacher->find('list');
		$this->set(compact('teachers'));
	}

	public function admin_delete($id = null) {
		$this->ClassName->id = $id;
		if (!$this->ClassName->exists()) {
			throw new NotFoundException(__('Invalid class name'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ClassName->delete()) {
			$this->Session->setFlash(__('The class name has been deleted.'));
		} else {
			$this->Session->setFlash(__('The class name could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function book_list () {
		$logged = $this->Session->read('student_logged');
		if(!$logged) {
			return $this->redirect(array('controller'=>'students', 'action' => 'student_login'));
		}

		$this->ClassName->recursive = -1;
		$book_lists = $this->ClassName->find('all');

		$page = $subpage = $title_for_layout = 'academic';
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		$this->loadModel('News');
		$this->News->recursive = 0;
		$latest_news = $this->News->find('all', array(
			'order' => 'News.created DESC',
			'limit' => 5
		));
		$this->set(compact('latest_news'));

		$this->set(compact('book_lists'));
		$this->layout = 'public';
	}
}
