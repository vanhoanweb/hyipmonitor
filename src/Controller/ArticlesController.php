<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $articles = $this->Articles->find('all', [
            'order' => ['Articles.created' => 'DESC'],
            'contain' => ['Categories']
        ]);
        $this->set('articles', $this->paginate($articles));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => ['Categories']
        ]);
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /*
     * Category
     */
    public function category($id = null)
    {
        $articles = $this->Articles->find('all', [
            'conditions' => ['Articles.category_id' => $id],
            'order' => ['Articles.created' => 'DESC'],
            'contain' => ['Categories']
        ]);
        switch ($id) {
            case '1': $title = 'HYIP News'; break;
            case '2': $title = 'HYIP Blog'; break;
            case '3': $title = 'HYIP Reviews'; break;
        }
        $this->set(compact('articles', 'title'), $this->paginate($articles));
        $this->set('_serialize', ['articles']);
    }
}
