<?php
namespace App\Model\Table;

use App\Model\Entity\Request;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Listings
 */
class RequestsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('requests');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Listings', [
            'foreignKey' => 'listing_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->add('amount', 'valid', ['rule' => 'numeric'])
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->add('commission', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('commission');

        $validator
            ->add('rcb', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rcb');

        $validator
            ->requirePresence('pay_system', 'create')
            ->notEmpty('pay_system');

        $validator
            ->requirePresence('your_account', 'create')
            ->notEmpty('your_account');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->isUnique(['email']));
        // $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['listing_id'], 'Listings'));
        return $rules;
    }

    /*
     * By @vanhoanweb
     */
    public function setPayment(){
        return ['pm' => 'Perfect Money', 'pr' => 'Payeer'];
    }
    public function setStatus(){
        return [1 => 'Paid', 2 => 'Pending'];
    }    
}
