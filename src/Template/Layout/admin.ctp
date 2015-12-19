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

$cakeDescription = 'ShareHYIP';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <!-- CSS -->
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('jquery.modal.css') ?>
    <?= $this->Html->css('admin.css') ?>
    <!-- Jquery -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'); ?>
    <?= $this->Html->script('jquery.modal.min.js'); ?>
    <?= $this->Html->script('admin.js'); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-4 columns">
            <li class="name">
                <h1><?= $this->Html->link(__('ShareHYIP Admin'), ['controller' => 'Listings', 'action' => 'index', 'prefix' => false], ['target' => '_blank']) ?></h1>
            </li>
        </ul>
        <section class="top-bar-section">
            <?php if($user['role'] == 1): ?>
            <ul class="right">
                <li><?= $this->Html->link(__('List News'), ['controller' => 'News', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('<strong>Logout</strong>'), ['controller' => 'Users', 'action' => 'logout'], ['escape' => false]) ?></li>
            </ul>
            <?php endif; ?>
        </section>
    </nav>

    <?= $this->Flash->render() ?>

    <section class="container clearfix">        
        <?= $this->fetch('content') ?>
    </section>

    <footer>
    </footer>
</body>
</html>
