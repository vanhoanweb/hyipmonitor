<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 */
class RequestsController extends AppController
{
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request->status = 2;
            $request = $this->Requests->patchEntity($request, $this->request->data);
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));
                return $this->redirect(['controller' => 'Listings', 'action' => 'view', $this->request->data['listing_id'], $this->request->data['slug']]);
            } else {
                $this->Flash->error(__('The request could not be saved. Please, try again.'));
            }
        }
        $listings = $this->Requests->Listings->find('list', ['limit' => 200]);
        $this->set(compact('request', 'listings'));
        $this->set('_serialize', ['request']);
    }
}
