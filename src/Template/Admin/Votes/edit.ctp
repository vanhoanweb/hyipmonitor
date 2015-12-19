<?= $this->element('side-nav') ?>

<div class="votes form large-10 medium-8 columns content">
    <?= $this->Form->create($vote) ?>
    <fieldset>
        <legend><?= __('Edit Vote') ?></legend>
        <?php
            echo $this->Form->input('listing_id', ['options' => $listings]);
            echo $this->Form->input('vote', ['options' => $type, 'type' => 'radio', 'default' => 1, 'label' => false]);
            echo $this->Form->input('email');
            echo $this->Form->input('comment');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
