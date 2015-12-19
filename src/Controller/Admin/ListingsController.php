<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 */
class ListingsController extends AdminController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups'],
            'order' => ['Listings.status' => 'ASC', 'Listings.group_id' => 'ASC'],
            'limit' => 60
        ];
        $this->set('listings', $this->paginate($this->Listings));
        $this->set('_serialize', ['listings']);
    }

    /**
     * View method
     *
     * @param string|null $id Listing id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => ['Groups', 'Requests', 'Votes', 'Statistics']
        ]);
        $this->set('listing', $listing);
        $this->set('_serialize', ['listing']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $listing = $this->Listings->newEntity();
        if ($this->request->is('post')) {
            $listing = $this->Listings->patchEntity($listing, $this->request->data);

            //Array
            (!empty($this->request->data['options'])) ? $listing->options = implode(',', $this->request->data['options']) : $listing->options = '';
            (!empty($this->request->data['pay_systems'])) ? $listing->pay_systems = implode(',', $this->request->data['pay_systems']) : $listing->pay_systems = '';

            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The listing could not be saved. Please, try again.'));
            }
        }        
        $groups     = $this->Listings->Groups->find('list', ['limit' => 200]);
        $options    = $this->Listings->setOptions();
        $status     = $this->Listings->setStatus();
        $withdrawal = $this->Listings->setWithdrawal();
        $ratings    = $this->Listings->setRatings();
        $payments   = $this->Listings->setPayments();
        $this->set(compact('listing', 'groups', 'options', 'status', 'withdrawal', 'ratings', 'payments'));
        $this->set('_serialize', ['listing']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Listing id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $listing = $this->Listings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $listing = $this->Listings->patchEntity($listing, $this->request->data);

            //Array
            (!empty($this->request->data['options'])) ? $listing->options = implode(',', $this->request->data['options']) : $listing->options = '';
            (!empty($this->request->data['pay_systems'])) ? $listing->pay_systems = implode(',', $this->request->data['pay_systems']) : $listing->pay_systems = '';

            if ($this->Listings->save($listing)) {
                $this->Flash->success(__('The listing has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The listing could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Listings->Groups->find('list', ['limit' => 200]);
        $options    = $this->Listings->setOptions();
        $status     = $this->Listings->setStatus();
        $withdrawal = $this->Listings->setWithdrawal();
        $ratings    = $this->Listings->setRatings();
        $payments   = $this->Listings->setPayments();

        $options_data   = explode(',', $listing->options);
        $payments_data  = explode(',', $listing->pay_systems);
        $this->set(compact('listing', 'groups', 'options', 'status', 'withdrawal', 'ratings', 'payments', 'options_data', 'payments_data'));
        $this->set('_serialize', ['listing']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Listing id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $listing = $this->Listings->get($id);
        if ($this->Listings->delete($listing)) {
            $this->Flash->success(__('The listing has been deleted.'));
        } else {
            $this->Flash->error(__('The listing could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
