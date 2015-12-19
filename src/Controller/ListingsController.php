<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Listings Controller
 *
 * @property \App\Model\Table\ListingsTable $Listings
 */
class ListingsController extends AppController
{

    // public function beforeFilter(Event $event)
    // {
    //     parent::beforeFilter($event);
    //     $this->Auth->allow(['latest', 'withdrawal', 'group', 'status', 'search']);
    // }

    public $paginate = [
        'contain'       => ['Statistics'],
        'conditions'    => ['Listings.confirmed' => 1]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $listings = $this->Listings->find('all', [
            'conditions' => ['NOT' => ['Listings.status' => 4]],
            'order' => ['Listings.group_id' => 'ASC', 'Listings.status' => 'ASC', 'Listings.rank' => 'ASC', 'Listings.date_added' => 'ASC']
        ]);
        $this->set('listings', $this->paginate($listings));
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
            $listing->status    = 2;
            $listing->confirmed = 0;
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
        $withdrawal = $this->Listings->setWithdrawal();
        $payments   = $this->Listings->setPayments();
        $this->set(compact('listing', 'groups', 'options', 'withdrawal', 'payments'));
        $this->set('_serialize', ['listing']);
    }

    /*
     * Programs added for the last 7 days
     */
    public function latest()
    {
        $listings = $this->Listings->find('all', [
            'conditions' => ['Listings.date_added >' => new \DateTime('-7 days')],
            'order' => ['Listings.date_added' => 'DESC'],
        ]);
        $this->set('listings', $this->paginate($listings));
        $this->set('_serialize', ['listings']);
    }

    /*
     * Group Listings
     */
    public function group($id = null)
    {
        switch ($id) {
            case '1': $name = 'Exclusive'; $info = 'HYIPs with $150 deposit or more.'; break;
            case '2': $name = 'Premium'; $info = 'HYIPs with $50 - $150 deposit.'; break;
            case '3': $name = 'Normal'; $info = 'HYIPs with $30 - $50 deposit.'; break;
            case '4': $name = 'Trial'; $info = 'HYIPs for trial.'; break;
            case '5': $name = 'Scam'; $info = 'NOT PAYING and SCAM HYIPs.'; break;
        }
        if($id == 5){ // Scam Listings
            $listings = $this->Listings->find('all', [
                'conditions' => ['Listings.status' => 4],
                'order' => ['Listings.date_closed' => 'DESC']
            ]);
        }else{
            $listings = $this->Listings->find('all', [
                'conditions' => ['Listings.group_id' => $id],
                'order' => ['Listings.status' => 'ASC', 'Listings.rank' => 'ASC', 'Listings.date_added' => 'ASC']
            ]);
        }
        $this->set(compact('listings', 'name', 'info', 'banners'), $this->paginate($listings));
        $this->set('_serialize', ['listings']);
    }
}
