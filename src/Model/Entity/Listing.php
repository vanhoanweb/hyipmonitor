<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Listing Entity.
 *
 * @property int $id 
 * @property string $title
 * @property string $slug
 * @property string $thumbnail
 * @property string $url
 * @property int $rank
 * @property string $options
 * @property string $plan
 * @property int $status
 * @property int $group_id
 * @property \App\Model\Entity\Group $group
 * @property int $min_spend
 * @property int $max_spend
 * @property string $referral
 * @property int $withdrawal_type
 * @property int $rating
 * @property string $contact_email
 * @property string $description
 * @property string $pay_systems
 * @property string $support_tg
 * @property string $support_dtm
 * @property string $support_mmg
 * @property string $support_mmgp
 * @property string $review_url
 * @property \Cake\I18n\Time $date_started
 * @property \Cake\I18n\Time $date_added
 * @property \Cake\I18n\Time $date_closed
 * @property int $confirmed
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\Report[] $reports
 * @property \App\Model\Entity\Statistic[] $statistics
 * @property \App\Model\Entity\Vote[] $votes
 */
class Listing extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
