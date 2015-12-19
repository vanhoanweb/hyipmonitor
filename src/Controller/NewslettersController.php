<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\NewslettersTable $Newsletters
 */
class NewslettersController extends AppController
{
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The subscribe has been saved.'));
                return $this->redirect(['controller' => 'Listings', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The subscribe could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('newsletter'));
        $this->set('_serialize', ['newsletter']);
    }
}
