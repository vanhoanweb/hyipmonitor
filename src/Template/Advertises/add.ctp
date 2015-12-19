<?php // Meta for SEO
    $this->assign('title', 'Add Banner');
    echo $this->Html->meta('description', 'Add Banner to our HYIP Monitoring. Banner will be activated within 24 hours.', ['block' => true]);
?>

<h2 class="entry-group">Add Banner</h2>

<div class="entry-listing add-advertise">
    <?= $this->Form->create($advertise) ?>
    <?php
        echo $this->Form->input('position', ['options' => $position, 'empty' => false]);
        echo $this->Form->input('site_url');
        echo $this->Form->input('email');
        echo $this->Form->input('banner_url');
        echo $this->Form->input('alt_text');
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div>
