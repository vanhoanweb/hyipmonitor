<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Statistics Controller
 *
 * @property \App\Model\Table\StatisticsTable $Statistics
 */
class StatisticsController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Listings'],
            'order' => ['Statistics.created' => 'DESC'],
            'limit' => 60
        ];
        $this->set('statistics', $this->paginate($this->Statistics));
        $this->set('_serialize', ['statistics']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $statistic = $this->Statistics->newEntity();
        if ($this->request->is('post')) {
            $statistic = $this->Statistics->patchEntity($statistic, $this->request->data);
            if ($this->Statistics->save($statistic)) {
                $this->Flash->success(__('The statistic has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The statistic could not be saved. Please, try again.'));
            }
        }
        $listings = $this->Statistics->Listings->find('list', ['limit' => 200]);
        $type     = $this->Statistics->setType();
        $this->set(compact('statistic', 'listings', 'type'));
        $this->set('_serialize', ['statistic']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Statistic id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $statistic = $this->Statistics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $statistic = $this->Statistics->patchEntity($statistic, $this->request->data);
            if ($this->Statistics->save($statistic)) {
                $this->Flash->success(__('The statistic has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The statistic could not be saved. Please, try again.'));
            }
        }
        $listings = $this->Statistics->Listings->find('list', ['limit' => 200]);
        $type     = $this->Statistics->setType();
        $this->set(compact('statistic', 'listings', 'type'));
        $this->set('_serialize', ['statistic']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Statistic id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $statistic = $this->Statistics->get($id);
        if ($this->Statistics->delete($statistic)) {
            $this->Flash->success(__('The statistic has been deleted.'));
        } else {
            $this->Flash->error(__('The statistic could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
