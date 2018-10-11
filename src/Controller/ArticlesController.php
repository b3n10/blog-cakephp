<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 *
 * @method \App\Model\Entity\Article[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ArticlesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash'); // to include the Flash component
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }

    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();

        if ($this->request->is('POST')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Successfully saved article!'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Unable to save article!'));
        }

        $this->set(compact('article'));
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);

        if ($this->request->is(['POST', 'PUT'])) {
            $this->Articles->patchEntity($article, $this->request->getData());

            if ($this->Articles->save($article)) {
                $this->Flash->success(__('Successfully edited article!'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to edit article!'));
        }

        $this->set(compact('article'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['POST', 'DELETE']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('Successfully deleted: "{0}"!', h($article->title)));
            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('Unable to delete article!'));
    }
}
