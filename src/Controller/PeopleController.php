<?php

namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController
{
    public $paginate = [
        'finder' => 'ByAge',
        'limit' => 5,
        'contain' => ['Messages']
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        // if ($this->request->isPost()) {}
        $data = $this->paginate($this->People); //これで入力フィールドとおなじものが検索されます。
        $this->set('data', $data);
    }

    public function edit()
    {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function update()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data['People']; //
            $entity = $this->People->get($data['id']); //
            $this->People->patchEntity($entity, $data);
            $this->People->save($entity);
        }
        return $this->redirect(['action' => 'index']);
    }

    public function add()
    {
        $msg = 'please your personal data...';
        $entity = $this->People->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            if ($this->People->save($entity)) {
                return $this->redirect(['action' => 'index']);
            }
            $msg = 'Error was occured...';
        }
        $this->set('msg', $msg);
        $this->set('entity', $entity);
    }

    //もう使わない
    // public function create()
    // {
    //     if ($this->request->is('post')) {
    //         $data = $this->request->data['People']; //フォームの値を取り出す。
    //         $entity = $this->People->newEntity($data); //新しいエンティティの作成
    //         $this->People->save($entity);
    //     }
    //     return $this->redirect(['action' => 'index']);
    // }

    public function delete()
    {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function destroy()
    {
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->delete($entity);
        }
        return $this->redirect(['action' => 'index']);
    }
}
