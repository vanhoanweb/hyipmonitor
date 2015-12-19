<?php
namespace App\Model\Table;

use App\Model\Entity\Listing;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Listings Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Groups
 * @property \Cake\ORM\Association\HasMany $Requests
 * @property \Cake\ORM\Association\HasMany $Votes
 * @property \Cake\ORM\Association\HasMany $Statistics
 */
class ListingsTable extends Table
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

        $this->table('listings');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Sluggable');

        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Requests', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('Votes', [
            'foreignKey' => 'listing_id'
        ]);
        $this->hasMany('Statistics', [
            'foreignKey' => 'listing_id'
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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->allowEmpty('slug');

        $validator
            ->allowEmpty('thumbnail');

        $validator
            ->requirePresence('url', 'create')
            ->notEmpty('url');

        $validator
            ->add('rank', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rank');

        $validator
            ->allowEmpty('options');

        $validator
            ->allowEmpty('plan');

        $validator
            ->add('status', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('status');

        $validator
            ->add('min_spend', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('min_spend');

        $validator
            ->add('max_spend', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('max_spend');

        $validator
            ->allowEmpty('referral');

        $validator
            ->add('withdrawal_type', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('withdrawal_type');

        $validator
            ->add('rating', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('rating');

        $validator
            ->requirePresence('contact_email', 'create')
            ->notEmpty('contact_email');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('pay_systems');

        $validator
            ->allowEmpty('support_tg');

        $validator
            ->allowEmpty('support_dtm');

        $validator
            ->allowEmpty('support_mmg');

        $validator
            ->allowEmpty('support_mmgp');

        $validator
            ->allowEmpty('review_url');

        $validator
            ->add('date_started', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('date_started');

        $validator
            ->add('date_added', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('date_added');

        $validator
            ->add('date_closed', 'valid', ['rule' => 'datetime'])
            ->allowEmpty('date_closed');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        return $rules;
    }

    /*
     * By @vanhoanweb
     */
    public function setOptions(){
        return ['hddos' => 'DDOS', 'hssl' => 'SSL'];
    }
    public function setStatus(){
        return ['1' => 'Paying', '2' => 'Waiting', '3' => 'Problem', '4' => 'Not Paid'];
    }
    public function setWithdrawal(){
        return ['1' => 'Instantly', '2' => 'Manual', '3' => 'Automatic'];
    }
    public function setRatings(){
        return ['1', '2', '3', '4', '5'];
    }
    public function setPayments(){
        return ['bw' => 'Bank Wire', 'bit' => 'Bitcoin', 'ego' => 'EgoPay', 'okp' => 'OKPAY', 'pr' => 'Payeer',
            'pza' => 'Payza (AlertPay)', 'pm' => 'Perfect Money', 'stp' => 'SolidTrust Pay', 'payp' => 'PayPal',
            'qiwi' => 'QIWI', 'yandex' => 'Yandex.Money'];
    }
}
