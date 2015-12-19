<?php // Meta for SEO
    $this->assign('title', 'Add Listing');
    echo $this->Html->meta('description', 'Add Listing to our HYIP Monitoring. Your program will be added manually within 24 hours.', ['block' => true]);
?>

<h2 class="entry-group">Add Listing</h2>

<div class="entry-listing add-listing">
    <?= $this->Form->create($listing) ?>
    <?php
        echo $this->Form->input('title');
        echo $this->Form->input('url');
        echo $this->Form->input('contact_email');
        echo $this->Form->input('options', ['options' => $options, 'multiple' => 'checkbox']);
        echo $this->Form->input('plan');
        echo $this->Form->input('group_id', ['options' => $groups, 'default' => 3]);
        echo $this->Form->input('min_spend');
        echo $this->Form->input('max_spend');
        echo $this->Form->input('referral');
        echo $this->Form->input('withdrawal_type', ['options' => $withdrawal, 'empty' => false]);        
        echo $this->Form->input('description');
        echo $this->Form->input('pay_systems', ['options' => $payments, 'multiple' => 'checkbox']);
        echo $this->Form->input('date_started');
        echo $this->Form->input('date_added');
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div>