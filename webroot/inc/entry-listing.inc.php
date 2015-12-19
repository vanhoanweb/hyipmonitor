<?php
$domain = str_ireplace('www.', '', parse_url($listing->url, PHP_URL_HOST));
/* Datetime */
$date_started   = new DateTime($listing->date_started);
$date_added     = new DateTime($listing->date_added);
$date_closed    = new DateTime($listing->date_closed);
$today          = new DateTime();
$lifetime       = ($listing->date_closed) ? $date_started->diff($date_closed) : $date_started->diff($today);
$monitored      = ($listing->date_closed) ? $date_added->diff($date_closed) : $date_added->diff($today);
// Options
$options    = explode(',', $listing->options);
$ddos       = (in_array('hddos', $options)) ? $this->Html->image('DDOS.gif', ['alt' => 'DDOS', 'title' => 'DDOS']) : '';
$ssl        = (in_array('hssl', $options)) ? $this->Html->image('SSL.gif', ['alt' => 'SSL', 'title' => 'SSL']) : '';
// Payment
$pay_systems = explode(',', $listing->pay_systems);
$payment     = (in_array('bw', $pay_systems)) ? $this->Html->image('bw.png', ['alt' => 'Bank Wire', 'title' => 'Bank Wire']) : '';
$payment    .= (in_array('bit', $pay_systems)) ? $this->Html->image('bit.png', ['alt' => 'Bitcoin', 'title' => 'Bitcoin']) : '';
$payment    .= (in_array('ego', $pay_systems)) ? $this->Html->image('ego.png', ['alt' => 'EgoPay', 'title' => 'EgoPay']) : '';
$payment    .= (in_array('okp', $pay_systems)) ? $this->Html->image('okp.png', ['alt' => 'OKPAY', 'title' => 'OKPAY']) : '';
$payment    .= (in_array('pr', $pay_systems)) ? $this->Html->image('pr.png', ['alt' => 'Payeer', 'title' => 'Payeer']) : '';
$payment    .= (in_array('pza', $pay_systems)) ? $this->Html->image('pza.png', ['alt' => 'Payza', 'title' => 'Payza']) : '';
$payment    .= (in_array('pm', $pay_systems)) ? $this->Html->image('pm.png', ['alt' => 'Perfect Money', 'title' => 'Perfect Money']) : '';
$payment    .= (in_array('stp', $pay_systems)) ? $this->Html->image('stp.png', ['alt' => 'SolidTrust Pay', 'title' => 'SolidTrust Pay']) : '';
$payment    .= (in_array('payp', $pay_systems)) ? $this->Html->image('payp.png', ['alt' => 'PayPal', 'title' => 'PayPal']) : '';
$payment    .= (in_array('qiwi', $pay_systems)) ? $this->Html->image('qiwi.png', ['alt' => 'QIWI', 'title' => 'QIWI']) : '';
$payment    .= (in_array('yandex', $pay_systems)) ? $this->Html->image('yandex.png', ['alt' => 'Yandex.Money', 'title' => 'Yandex.Money']) : '';
$rate   = '';
if ($listing->rating) {
    for ($i=0; $i < ($listing->rating+1); $i++) { $rate .= $this->Html->image('full-star.gif', ['alt' => 'full-star', 'title' => 'full-star']); }
    for ($j=1; $j < (5-$listing->rating); $j++) { $rate .= $this->Html->image('empty-star.gif', ['alt' => 'empty-star', 'title' => 'empty-star']); }
} else {
    for ($i=1; $i < 6; $i++) { $rate .= $this->Html->image('empty-star.gif', ['alt' => 'empty-star', 'title' => 'empty-star']); }
}
// Status
switch ($listing->status) {
    case '1':
        $status 	= $this->Html->image('paying.gif', ['alt' => 'Paying', 'title' => 'Paying']);
        $thumbnail 	= '<img src="http://pokeram.com/images/promo/125g3.gif" alt="pokeram">';
        $bg_rank 	= 'bg-green'; break;
    case '2':
        $status 	= $this->Html->image('waiting.gif', ['alt' => 'Waiting', 'title' => 'Waiting']);
        $thumbnail 	= '<img src="http://pokeram.com/images/promo/125g3.gif" alt="pokeram">';
        $bg_rank 	= 'bg-gray'; break;
    case '3':
        $status 	= $this->Html->image('problem.gif', ['alt' => 'Problem', 'title' => 'Problem']);
        $thumbnail 	= '<img src="http://pokeram.com/images/promo/125g3.gif" alt="pokeram">';
        $bg_rank 	= 'bg-orange'; break;
    case '4':
        $status 	= $this->Html->image('scam.gif', ['alt' => 'Scam', 'title' => 'Scam']);
        $thumbnail 	= $this->Html->image('scam-list.gif', ['alt' => 'Scam', 'title' => 'Scam']);
        $bg_rank 	= 'bg-red'; break;
}
switch ($listing->withdrawal_type) {
    case '1': $withdrawal = 'Instantly'; break;
    case '2': $withdrawal = 'Manual'; break;
    case '3': $withdrawal = 'Automatic'; break;
}
// Statistics
$total_dep = 0;
$total_pay = 0;
$roi       = 0;
$last_paid = 'N/A';
if (!empty($listing->statistics)):    
    foreach ($listing->statistics as $statistics):
        switch ($statistics->type) {
            case '1':
                $total_dep = $total_dep + $statistics->amount;
                break;
            case '2':
                $total_pay = $total_pay + $statistics->amount;
                $last_paid = date_format($statistics->created, 'M d, Y');
                break;
        }
    endforeach;
    $roi       = ($total_pay*100)/$total_dep;
endif;
?>
<div class="entry-listing">
    <div class="row">
        <div class="four columns">
            <h3 class="entry-name">
            	<?php if($listing->status == 4): ?>
            		<span class="entry-rank <?= $bg_rank ?>">X</span>
            		<?= $this->Html->link($listing->title, ['controller' => 'Listings', 'action' => 'view', $listing->id, $listing->slug]) ?>
        		<?php else: ?>
        			<span class="entry-rank <?= $bg_rank ?>">1</span>
            		<?= $this->Html->link($listing->title, $listing->url, ['target' => '_blank']) ?>
    			<?php endif; ?>
        	</h3>
        </div>
        <div class="four columns">
        	<?= $status ?>
        	<?= ($date_added->diff($today)->days < 7) ? '<span class="entry-new">new</span>' : '' ?>
    	</div>
        <div class="four columns text-right">
            <?= $this->Html->link(__('Details'), ['controller' => 'Listings', 'action' => 'view', $listing->id, $listing->slug], ['class' => 'details-link']) ?>
            <?php if($listing->status !== 4): ?>
                <?= $this->Html->link(__('Payout'), ['controller' => 'Listings', 'action' => 'view', $listing->id, $listing->slug, '#' => 'payout'], ['class' => 'payout-link']) ?>
                <?= $this->Html->link(__('Vote'), ['controller' => 'Listings', 'action' => 'view', $listing->id, $listing->slug, '#' => 'vote'], ['class' => 'vote-link']) ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="three columns entry-thumbnail"><?= $thumbnail ?></div>
        <div class="three columns">
            <p>Our Rating: <?= $rate ?></p>
            <p>Minimum: <strong>$<?= $this->Number->format($listing->min_spend) ?></strong></p>
            <p>Maximum: <strong><?= ($listing->max_spend) ? '$'.$this->Number->format($listing->max_spend) : 'Unlimited' ?></strong></p>
            <p>Referral: <strong><?= ($listing->referral) ? $listing->referral : 'N/A' ?></strong></p>
            <p>Withdrawal: <strong><?= $withdrawal ?></strong></p>
            <p>Ref. Back: <strong><?= ($listing->status == 4) ? 'N/A' : $this->Html->link('80%', ['controller' => 'Listings', 'action' => 'view', $listing->id, $listing->slug, '#' => 'rcb'], ['class' => 'text-orange']) ?></strong></p>
        </div>
        <div class="three columns">
            <p>Added: <strong><?= date_format($listing->date_added, 'M d, Y') ?></strong></p>
            <p>Lifetime: <strong><?= $lifetime->format('%a days') ?></strong></p>
            <p>Monitored: <strong><?= $monitored->format('%a days') ?></strong></p>
            <p>Last Paid: <strong><?= $last_paid ?></strong></p>               
            <p>Payout Ratio: <strong><?= number_format($roi, 2) ?>%</strong></p>
            <div class="progress">
              	<div class="progress-bar" style="max-width: <?= $roi ?>%;"></div>
            </div>
        </div>
        <div class="three columns">
            <p>
                <a href="http://www.allhyipmonitors.com/search/?keyword=<?= $domain ?>&amp;status=<?= $listing->status ?>&amp;lid=<?= $listing->id ?>&amp;ref=sharehyip.com" title="allhyipmonitors.com" target="_blank"><?= $this->Html->image('ahm-com.gif', ['alt' => 'allhyipmonitors.com', 'title' => 'allhyipmonitors.com']) ?></a>
                <a href="http://allmonitors.net/hyip/<?= $domain ?>" title="allmonitors.net" target="_blank"><?= $this->Html->image('ahm-net.gif', ['alt' => 'allmonitors.net', 'title' => 'allmonitors.net']) ?></a>
                <a href="http://allhyipmon.ru/monitor/<?= $domain ?>" title="allhyipmon.ru" target="_blank"><?= $this->Html->image('ahm-ru.gif', ['alt' => 'allhyipmon.ru', 'title' => 'allhyipmon.ru']) ?></a>
                <a href="http://www.allmon.biz/?key=<?= $domain ?>&amp;lid=<?= $listing->id ?>&amp;ref=sharehyip.com" title="allmon.biz" target="_blank"><?= $this->Html->image('ahm-biz.gif', ['alt' => 'allmon.biz', 'title' => 'allmon.biz']) ?></a>
                <a href="http://hyipmonitors.org/domain/<?= $domain ?>" title="hyipmonitors.org" target="_blank"><?= $this->Html->image('ahm-org.gif', ['alt' => 'hyipmonitors.org', 'title' => 'hyipmonitors.org']) ?></a>
            </p>
            <p class="payments"><?= $payment ?></p>
            <p><?= $ssl ?> <?= $ddos ?></p>
        </div>
    </div>

    <p class="entry-plan">Investment Plans: <strong><?= $listing->plan ?></strong></p>
</div><!--entry-listing-->