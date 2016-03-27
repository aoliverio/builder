<?php

namespace Builder\Controller;

use Builder\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Tasks Controller
 *
 * @property \Builder\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController {

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->Tasks = TableRegistry::get('Builder.Tasks');
        $query = $this->Tasks->find('all');
        $query->where($this->filteredWhereConditions());        
        $query->limit(1000);
        $this->set('data', $query->toArray());
        $this->set('_serialize', ['data']);
    }
    
    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $task = $this->Tasks->get($id, [
            'contain' => ['Roles']
        ]);
        $this->set('task', $task);
        $this->set('_serialize', ['task']);
    }
    
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $task = $this->Tasks->newEntity();
        if ($this->request->is('post')) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('task'));
        $this->set('_serialize', ['task']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $task = $this->Tasks->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The task could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('task'));
        $this->set('_serialize', ['task']);
        $this->filteredSelectOptions();
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $task = $this->Tasks->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($this->Tasks->delete($task)) {
                $this->Flash->success(__('The task has been deleted.'));
            } else {
                $this->Flash->error(__('The task could not be deleted. Please, try again.'));
            }
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('task'));
    }
    
    /**
     * Filter method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function filter($action = 'set') {
        $task = $this->Tasks->newEntity();
        if ($this->request->session()->check('Tasks')) {
            $session = $this->request->session()->read('Tasks');
            $task = $this->Tasks->patchEntity($task,  $session);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            if ($action == 'unset') {
                $this->request->session()->delete('Tasks');
            } else {
                $this->request->session()->write('Tasks', $this->request->data);
            }
            $this->Flash->success(__('The task has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('task'));
        $this->set('_serialize', ['task']);
    }

    /**
     * This function is used to filter where conditions
     * 
     * @return type
     */
    public function filteredWhereConditions() {
        $filter = [];
        return $filter;
    }

    /**
     * This function is used to filter select options
     */
    public function filteredSelectOptions() {
        $roles = $this->Tasks->Roles->find('list', ['limit' => 200]);
        $this->set(compact('roles'));
    }
    
}