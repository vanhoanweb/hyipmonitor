<?php
namespace App\Model\Table;

use App\Model\Entity\Advertise;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Advertises Model
 *
 */
class AdvertisesTable extends Table
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

        $this->table('advertises');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->add('position', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('position');

        $validator
            ->requirePresence('site_url', 'create')
            ->notEmpty('site_url');

        $validator
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('banner_url', 'create')
            ->notEmpty('banner_url');

        $validator
            ->requirePresence('alt_text', 'create')
            ->notEmpty('alt_text');

        $validator
            ->add('confirmed', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('confirmed');

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
        return $rules;
    }

    /*
     * @vanhoanweb
     */
    public function setPosition(){
        return [1 => 'Top', 2 => 'Inside'];
    }
}
