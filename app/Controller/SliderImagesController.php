<?php
App::uses('AppController', 'Controller');

class SliderImagesController extends AppController {

	public $components = array('Paginator', 'Session');

	public function admin_index() {
		$this->SliderImage->recursive = 0;
		$this->paginate = array('all',
            'order' => array('SliderImage.order'),
        );
		$this->set('sliderImages', $this->Paginator->paginate());
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SliderImage->create();
			if ($this->SliderImage->save($this->request->data)) {
				$this->Session->setFlash(__('The slider image has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The slider image could not be saved. Please, try again.'));
			}
		}
	}

	public function admin_edit() {
		if ($this->request->is(array('post', 'put'))) {
			//AuthComponent::_setTrace($this->request->data);
			foreach ($this->request->data as $key => $item) {
				$image_id = substr($key, 6);
				$this->SliderImage->id = $image_id;
				$data['order'] = $item;
				$this->SliderImage->save($data);
			}
			$this->Session->setFlash(__('The slider image order has been updated.'));
			return $this->redirect(array('action' => 'edit'));
		} else {
			$this->SliderImage->recursive = 0;
			$sliderImages = $this->SliderImage->find('all', array('order' => 'SliderImage.order'));
			$this->set(compact('sliderImages'));
		}
	}

	public function admin_delete($id = null) {
		$this->SliderImage->id = $id;
		if (!$this->SliderImage->exists()) {
			throw new NotFoundException(__('Invalid slider image'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->SliderImage->delete()) {
			$this->Session->setFlash(__('The slider image has been deleted.'));
		} else {
			$this->Session->setFlash(__('The slider image could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
