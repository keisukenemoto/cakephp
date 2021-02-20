<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MassagesTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setDisplayField('message'); //レコードを特定の項目だけ取り出す機能。
        $this->belongsTo('People');
    }

    public function validationDefault(Validator $validator)
    {
        $validator->allowEmpty('id', 'create');
        $validator->integer('person_id', 'person_idは整数で入力してください。')->notEmpty('person_id', 'person_idは必ず入力してください。');
        $validator->scalar('message', 'テキストで入力してください。')->requirePresence('message', 'create')->notEmpty('message', 'メッセージは必ず入力してください。');
        return $validator;
    }
}
