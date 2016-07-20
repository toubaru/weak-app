<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {

	public function beforeFilter() {
		//
	}
	public function isAuthorized($user) {
	    if ($this->action === 'add' || $this->action === 'index') {
	        return true;
	    }

	    if (in_array($this->action, array('edit', 'delete'))) {
	        $postId = (int) $this->request->params['pass'][0];
	        if ($this->Post->isOwnedBy($postId, $user['id'])) {
	            return true;
	        }
	    }

	    return parent::isAuthorized($user);
	}
	
/**
 * インデックス method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * 一覧表示 method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('Post', $this->Post->read(null, $id));
	}

/**
 * 登録
 *
 * @return void
 */
	public function add() {
	    if ($this->request->is('post')) {
	        //Added this line
	        $this->request->data['Post']['user_id'] = $this->Auth->user('id');
	        if ($this->Post->save($this->request->data)) {
	            $this->Flash->success(__('Your post has been saved.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	    }
	}

/**
 * 編集
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->set(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->set(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
		}
	}

/**
 * 削除
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->Flash->set(__('post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Flash->set(__('post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
