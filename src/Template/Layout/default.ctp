<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\ORM\TableRegistry;
$listings   = TableRegistry::get('Listings');
$news       = TableRegistry::get('Articles');
$statistics = TableRegistry::get('Statistics');
$advertises = TableRegistry::get('Advertises');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?> - ShareHYIP</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('http://fonts.googleapis.com/css?family=Raleway:400,300,600') ?>
    <?= $this->Html->css(['normalize.css', 'skeleton.css', 'style.css']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<body>
    <div class="container">
        <div class="row header">
            <a href="/" title="ShareHYIP">
                <?= $this->Html->image('logo.png', ['alt' => 'ShareHYIP', 'title' => 'ShareHYIP']) ?>
                <h1>Monitor, Reviews and Rating HYIP</h1>
            </a>
        </div><!--header-->

        <div class="row menu">
            <ul>
                <li><?= $this->Html->link(__('Home'), ['controller' => 'Listings', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('News'), ['controller' => 'News', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Services'), ['controller' => 'Pages', 'action' => 'display', 'services']) ?></li>
                <li><?= $this->Html->link(__('Partners'), ['controller' => 'Partners', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Blog'), ['controller' => 'Articles', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Contact'), ['controller' => 'Pages', 'action' => 'display', 'contact']) ?></li>
            </ul>
        </div>

        <?= $this->Flash->render() ?>

        <div class="row wrapper">
            <div class="three columns">
                <div class="widget widget-listings">
                    <span></span><h4 class="widget-title">Listings</h4>
                    <div class="widget-content">
                        <ul class="side-menu">
                            <li><?= $this->Html->link(__('New'), ['controller' => 'Listings', 'action' => 'new']) ?></li>
                            <li><?= $this->Html->link(__('Exclusive'), ['controller' => 'Listings', 'action' => 'group', 1]) ?></li>
                            <li><?= $this->Html->link(__('Premium'), ['controller' => 'Listings', 'action' => 'group', 2]) ?></li>
                            <li><?= $this->Html->link(__('Normal'), ['controller' => 'Listings', 'action' => 'group', 3]) ?></li>
                            <li><?= $this->Html->link(__('Trial'), ['controller' => 'Listings', 'action' => 'group', 4]) ?></li>
                            <li><?= $this->Html->link(__('Scam'), ['controller' => 'Listings', 'action' => 'group', 5]) ?></li>
                        </ul>
                    </div>
                </div><!--widget-->

                <div class="widget">
                    <span></span><h4 class="widget-title">Subscribe</h4>
                    <div class="widget-content">
                        <?= $this->Form->create(null, ['url' => ['controller' => 'Newsletters', 'action' => 'add']]) ?>
                        <?php
                            echo $this->Form->input('email', ['required' => true, 'placeholder' => 'Your email']);
                            echo $this->Form->input('type', ['options' => [1 => 'Subscribe', 0 => 'Unsubscribe'], 'type' => 'radio', 'default' => 1, 'label' => false]);
                        ?>
                        <?= $this->Form->button(__('Subscribe'), ['class' => 'button-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div><!--widget-->

                <div class="widget">
                    <span></span><h4 class="widget-title">Latest News</h4>
                    <div class="widget-content">
                        <ul>
                            <?php $news = $news->find('all', [
                                'order' => ['Articles.created' => 'DESC'],
                                'limit' => 3 ]);
                            foreach ($news as $article) : ?>
                                <li>
                                    <p><strong><?= $article->title ?></strong></p>
                                    <p><?= strip_tags(substr($article->body, 0, 80)) ?> [..]</p>
                                    <p class="text-right"><em><?= date_format($article->created, 'M d, Y') ?></em></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="text-center"><?= $this->Html->link(__('All Latest News'), ['controller' => 'Articles', 'action' => 'category', 1]) ?></p>
                    </div>
                </div><!--widget-->

                <div class="widget">
                    <span></span><h4 class="widget-title">New Listings</h4>
                    <div class="widget-content">
                        <ul>
                            <?php $added = $listings->find('all', [
                                'conditions' => ['Listings.confirmed' => 1],
                                'order' => ['Listings.date_added' => 'DESC'],
                                'limit' => 7 ]);
                            foreach ($added as $new):
                                switch ($new->status) {
                                    case '1': $status = '<p class="text-green"><strong>Paying</strong></p>'; break;
                                    case '2': $status = '<p class="text-gray"><strong>Waiting</strong></p>'; break;
                                    case '3': $status = '<p class="text-orange"><strong>Problem</strong></p>'; break;
                                    case '4': $status = '<p class="text-red"><strong>Not Paid</strong></p>'; break;
                                } ?>
                                <li>
                                    <p>Date: <strong><?= date_format($new->date_added, 'M d, Y') ?></strong></p>
                                    <p><?= $this->Html->link('<strong>'.$new->title.'</strong>', ['controller' => 'Listings', 'action' => 'view', $new->id, $new->slug], ['escape' => false]) ?></p>
                                    <?= $status ?>
                                    <p><?= substr($new->plan, 0, 50) ?> [..]</p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!--widget-->

                <div class="widget">
                    <span></span><h4 class="widget-title">Latest Payouts</h4>
                    <div class="widget-content">
                        <ul>
                            <?php $payouts = $statistics->find('all', [
                                'conditions' => ['Statistics.type' => 2],
                                'order' => ['Statistics.created' => 'DESC'],
                                'contain' => ['Listings'],
                                'limit' => 10 ]);
                            foreach ($payouts as $payout) : ?>
                                <li>
                                    <p>Date: <strong><?= date_format($payout->created, 'M d, Y') ?></strong></p>
                                    <p><strong>
                                        <?= $this->Html->link($payout->listing->title, ['controller' => 'Listings', 'action' => 'view', $payout->listing_id, $payout->listing->slug], ['class' => 'u-pull-left']) ?>
                                        <span class="u-pull-right text-green">+$<?= number_format($payout->amount, 2) ?></span>
                                    </strong></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!--widget-->

                <div class="widget">
                    <span></span><h4 class="widget-title">Latest Scam</h4>
                    <div class="widget-content">
                        <ul>
                            <?php $scams = $listings->find('all', [
                                'conditions' => ['Listings.status' => 4],
                                'order' => ['Listings.date_closed' => 'DESC'],
                                'limit' => 10 ]);
                            foreach ($scams as $scam) : ?>
                                <li>
                                    <p><?= $this->Html->link('<strong>'.$scam->title.'</strong>', ['controller' => 'Listings', 'action' => 'view', $scam->id, $scam->slug], ['escape' => false, 'class' => 'text-red']) ?></p>
                                    <p>Date: <strong><?= date_format($scam->date_closed, 'M d, Y') ?></strong></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div><!--widget-->
            </div><!--three columns-->

            <div class="nine columns">
                <div class="text-center special">
                    <?php $banners = $advertises->find('all', [
                        'conditions' => ['Advertises.confirmed' => 1, 'Advertises.position' => 1],
                        'order' => 'RAND()',
                        'limit' => 1 ]);
                    foreach ($banners as $advertise) : ?>
                        <?= $this->Html->link($this->Html->image($advertise->banner_url, ['alt' => $advertise->alt_text]), $advertise->site_url, ['target' => '_blank', 'escape' => false]) ?>
                    <?php endforeach; ?>
                </div>

                <?= $this->fetch('content') ?>
            </div><!--nine columns-->
        </div><!--wrapper-->

        <div class="row footer">
            <p class="text-justify"><strong>DISCLAIMER.</strong> We do not promote or own any programs. We can not be held responsible for any losses that may occur. All investments are made at your own risk. We do not give any investment advice. Use your own strategy. Don't spend more than you can afford to lose!</p>
            <div class="row copyright">
                <div class="two-thirds column text-right">
                    <strong>Copyright © 2012-2015 ShareHYIP</strong>. More than just HYIP monitoring!
                </div>
                <div class="one-third column social-icon">
                    <a href="http://facebook.com/ShareHYIP" class="facebook" title="Facebook" target="_blank"></a>
                    <a href="http://twitter.com/ShareHYIP" class="twitter" title="Twitter" target="_blank"></a>
                    <a href="https://plus.google.com/116017237111144194343/posts" class="google" title="Google+" target="_blank"></a>
                    <a href="mailto:sharehyip@gmail.com" class="email" title="Mail"></a>
                </div>
                </div>
            </div>
        </div><!--footer-->
    </div><!--container-->

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); ?>
    <?= $this->Html->script('main.js'); ?>
    <?= $this->fetch('script') ?>
</body>
</html>
