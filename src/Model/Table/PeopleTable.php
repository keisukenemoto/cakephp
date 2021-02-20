<?php

namespace App\Model\Table; //これは必ずこの名前空間にする。

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PeopleTable extends Table
{ //PeopleTableというのは、PeopleはDBのテーブル名
    public function initialize(array $config)
    {
        parent::initialize($config);
        // $this->setTable('people'); //これで、名前の異なるDBテーブルにアクセスできるようになる。
        $this->setDisplayField('name'); //レコードを特定の項目だけ取り出す機能。
        $this->hasMany('Messages');
    }

    public function findMe(Query $query, array $options) //Queryやarrayと書かないといけないの？じゃないとクエリにならない？
    { //処理
        $me = $options['me'];
        //return　クエリ
        return $query->where(['name like' => '%' . $me . '%'])
            ->orWhere(['mail like' => '%' . $me . '%'])
            ->order(['age' => 'asc']);
    }

    public function findByAge(Query $query, array $options)
    {
        return $query->order(['age' => 'asc'])->order(['name' => 'asc']);
    }
    public function validationDefault(Validator $validator)
    {
        $validator->integer('id', 'idは整数で入力してください。')->allowEmpty('id', 'create');
        $validator->scalar('name', 'テキストを入力してください。')->requirePresence('name', 'create')->notEmpty('name', '名前は必ず入力してください。');
        $validator->scalar('mail', 'テキストで入力してください。')->allowEmpty('mail')->email('mail', false, 'メールアドレスを入力してください。');
        $validator->integer('age', '整数で入力してください。')->requirePresence('age', 'create', '必ず値を入力してください。')->notEmpty('age', 'ゼロ以上を入力してください')->greaterThan('age', -1);
        return $validator;
    }
}
