<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Newsletters Controller
 *
 * @property \App\Model\Table\NewslettersTable $Newsletters
 */
class NewslettersController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('newsletters', $this->paginate($this->Newsletters));
        $this->set('_serialize', ['newsletters']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    /*public function add()
    {
        $newsletter = $this->Newsletters->newEntity();
        if ($this->request->is('post')) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $type    = $this->Newsletters->setType();
        $this->set(compact('newsletter', 'type'));
        $this->set('_serialize', ['newsletter']);
    }*/

    /**
     * Edit method
     *
     * @param string|null $id Newsletter id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $newsletter = $this->Newsletters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsletter = $this->Newsletters->patchEntity($newsletter, $this->request->data);
            if ($this->Newsletters->save($newsletter)) {
                $this->Flash->success(__('The newsletter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $type    = $this->Newsletters->setType();
        $this->set(compact('newsletter', 'type'));
        $this->set('_serialize', ['newsletter']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Newsletter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsletter = $this->Newsletters->get($id);
        if ($this->Newsletters->delete($newsletter)) {
            $this->Flash->success(__('The newsletter has been deleted.'));
        } else {
            $this->Flash->error(__('The newsletter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
