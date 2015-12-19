<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Advertises Controller
 *
 * @property \App\Model\Table\AdvertisesTable $Advertises
 */
class AdvertisesController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('advertises', $this->paginate($this->Advertises));
        $this->set('_serialize', ['advertises']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertise = $this->Advertises->newEntity();
        if ($this->request->is('post')) {
            $advertise = $this->Advertises->patchEntity($advertise, $this->request->data);
            if ($this->Advertises->save($advertise)) {
                $this->Flash->success(__('The advertise has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertise could not be saved. Please, try again.'));
            }
        }
        $position = $this->Advertises->setPosition();
        $this->set(compact('advertise', 'position'));
        $this->set('_serialize', ['advertise']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Advertise id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advertise = $this->Advertises->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advertise = $this->Advertises->patchEntity($advertise, $this->request->data);
            if ($this->Advertises->save($advertise)) {
                $this->Flash->success(__('The advertise has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The advertise could not be saved. Please, try again.'));
            }
        }
        $position = $this->Advertises->setPosition();
        $this->set(compact('advertise', 'position'));
        $this->set('_serialize', ['advertise']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Advertise id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advertise = $this->Advertises->get($id);
        if ($this->Advertises->delete($advertise)) {
            $this->Flash->success(__('The advertise has been deleted.'));
        } else {
            $this->Flash->error(__('The advertise could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
