<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 */
class NewsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $news = $this->News->find('all', [
            'order' => ['News.created' => 'DESC']
        ]);
        $this->set('news', $this->paginate($news));
        $this->set('_serialize', ['news']);
    }
}
