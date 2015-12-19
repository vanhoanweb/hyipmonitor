<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Listings']
        ];
        $this->set('requests', $this->paginate($this->Requests));
        $this->set('_serialize', ['requests']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->data);
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));
            }
        }
        $listings = $this->Requests->Listings->find('list', ['limit' => 200]);        
        $payment  = $this->Requests->setPayment();
        $status   = $this->Requests->setStatus();
        $this->set(compact('request', 'listings', 'payment', 'status'));
        $this->set('_serialize', ['request']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->data);
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));
            }
        }
        $listings = $this->Requests->Listings->find('list', ['limit' => 200]);
        $payment  = $this->Requests->setPayment();
        $status   = $this->Requests->setStatus();
        $this->set(compact('request', 'listings', 'payment', 'status'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
