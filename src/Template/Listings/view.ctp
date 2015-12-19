<?php // Meta for SEO
    $domain = str_ireplace('www.', '', parse_url($listing->url, PHP_URL_HOST));
    $this->assign('title', $listing->title.' Details - '.$domain);
    echo $this->Html->meta('description', $listing->title.' investment plans and main investment conditions. Actual payment status, rating, features and other information about '.$domain, ['block' => true]);
?>

<h2 class="entry-group"><?= $listing->title ?> Details</h2>

<?php include(WWW_ROOT.DS.'inc'.DS.'entry-listing.inc.php') ?>

<div class="entry-listing">
    <h3 class="entry-name">Program descrtiption</h3>
    <?= $listing->description ?>
</div>

<div class="entry-listing" id="vote">
    <h3 class="entry-group">Votes</h3>
    <?php if($listing->status == 4): ?>
        <div class="alert-info"><strong><?= $listing->title ?></strong> Voting function is disabled.</div>    
    <?php else: ?>
        <p>Here you can add your vote for HYIP and comment which will be visible to other investors.</p>
        <?= $this->Form->create(null, ['url' => ['controller' => 'Votes', 'action' => 'add']]) ?>
        <?php
            echo $this->Form->hidden('slug', ['value' => $listing->slug]);
            echo $this->Form->hidden('listing_id', ['value' => $listing->id]);
            echo $this->Form->input('vote', ['options' => [1 => 'Good', 0 => 'Bad'], 'type' => 'radio', 'default' => 2, 'label' => false]);
            echo $this->Form->input('email', ['required' => true, 'placeholder' => 'Your email']);
            echo $this->Form->input('comment', ['required' => true, 'placeholder' => 'Your comment']);
        ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
        <?= $this->Form->end() ?>
        <table class="u-full-width">
            <thead>
                <tr>
                    <th>Vote</th>
                    <th>E-Mail</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($listing->votes)): ?>
            <?php foreach ($listing->votes as $votes): $email = explode('@', $votes->email); ?>
                <tr>
                    <td><?= ($votes->vote==1) ? $this->Html->image('good.png', ['alt' => 'good', 'width' => '16px']) : $this->Html->image('bad.png', ['alt' => 'bad', 'width' => '16px']) ?></td>
                    <td><?= substr($email[0], 0, 5) ?>*@<?= $email[1] ?></td>
                    <td><?= date_format($votes->created, 'M d, Y') ?></td>                    
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<div class="entry-listing" id="rcb">
    <h3 class="entry-group">RCB</h3>
    <?php if($listing->status == 4): ?>
        <div class="alert-info"><strong><?= $listing->title ?></strong> not provide referrals commission program.</div>    
    <?php else: ?>
        <div class="alert-info">
            <p>We will <strong>pay back <?= $rcb ?> commission earned from you</strong>. To received commission back, please register and deposit follow our link provided and request paid referral commission back in form below with truth information.</p>
        </div>
        <div class="row">
            <div class="three columns">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Requests', 'action' => 'add']]) ?>
                <?php
                    echo $this->Form->hidden('slug', ['value' => $listing->slug]);
                    echo $this->Form->hidden('listing_id', ['value' => $listing->id]);
                    echo $this->Form->input('email', ['required' => true, 'placeholder' => 'Your email']);
                    echo $this->Form->input('username', ['required' => true, 'placeholder' => 'Username']);
                    echo $this->Form->input('amount', ['required' => true, 'placeholder' => '$0.00']);
                    echo $this->Form->input('pay_system', ['options' => ['pm' => 'Perfect Money', 'pr' => 'Payeer'], 'empty' => false, 'class' => 'u-full-width']);
                    echo $this->Form->input('your_account', ['required' => true, 'placeholder' => 'Your account']);
                ?>
                <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
            <div class="nine columns">
                <table class="u-full-width">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Deposited</th>
                            <th>Commission</th>
                            <th>RCB</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($listing->requests)): ?>
                    <?php foreach ($listing->requests as $requests): ?>
                        <tr>
                            <td><?= date_format($requests->created, 'M d') ?></td>
                            <td><?= substr($requests->username, 0, 5).'*' ?></td>
                            <td>$<?= number_format($requests->amount, 2) ?></td>
                            <td>$<?= number_format($requests->commission, 2) ?></td>
                            <td>$<?= number_format($requests->rcb, 2) ?></td>
                            <?php switch ($requests->status) {
                                case '1': $status_rcb = '<strong class="text-green">Paid</strong>'; break;
                                case '2': $status_rcb = '<strong class="text-orange">Pending</strong>'; break;
                            } ?>
                            <td><?= $status_rcb ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>    
</div>

<div class="entry-listing" id="payout">
    <h3 class="entry-group">Payouts</h3>
    <?php if (!empty($listing->statistics)): ?>
        <table class="u-full-width statistics">
            <tbody>
                <?php foreach ($listing->statistics as $statistics):
                if($statistics->type == 2): ?>
                <tr>
                    <td><?= '<strong class="text-green">+$'.number_format($statistics->amount, 2).'</strong>' ?></td>
                    <td><?= date_format($statistics->created, 'M d, Y') ?></td>
                </tr>                
                <?php endif; endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert-info">
            <p>No payout right now.</p>
        </div>
    <?php endif; ?>
</div>

<div class="entry-listing" id="button">
    <h3 class="entry-group">Button</h3>
    <p class="text-center">Place our button to your site (simply copy and paste this html code to your html).</p>    
    <div class="row">
        <div class="three columns text-center">
            <?= $this->Html->image('http://localhost/projects/sharehyip/image.php?id='.$listing->id, ['alt' => $listing->title]) ?>
        </div>
        <div class="nine columns">
            <textarea readonly style="height:125px;">&lt;!-- Start ShareHYIP.com Monitoring Button --&gt;
&lt;a href="http://sharehyip.com" title="Monitor, Reviews and Rating HYIP" target="_blank"&gt;&lt;img src="http://sharehyip.com/image.php?id=<?= $listing->id ?>" alt="<?= $listing->title ?>" /&gt;&lt;/a&gt;
&lt;!-- End ShareHYIP.com Monitoring Button --&gt;</textarea>
        </div>
    </div>
</div>
