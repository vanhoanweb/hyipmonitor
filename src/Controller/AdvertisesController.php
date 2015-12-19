<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Advertises Controller
 *
 * @property \App\Model\Table\AdvertisesTable $Advertises
 */
class AdvertisesController extends AppController
{

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advertise = $this->Advertises->newEntity();
        if ($this->request->is('post')) {
            $advertise->confirmed = 0;
            $advertise = $this->Advertises->patchEntity($advertise, $this->request->data);
            if ($this->Advertises->save($advertise)) {
                $this->Flash->success(__('The banner has been saved.'));
                return $this->redirect(['controller' => 'Listings', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The banner could not be saved. Please, try again.'));
            }
        }
        $position = $this->Advertises->setPosition();
        $this->set(compact('advertise', 'position'));
        $this->set('_serialize', ['advertise']);
    }
}
