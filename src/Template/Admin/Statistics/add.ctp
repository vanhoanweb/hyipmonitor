<?= $this->element('side-nav') ?>

<div class="statistics form large-10 medium-8 columns content">
    <?= $this->Form->create($statistic) ?>
    <fieldset>
        <legend><?= __('Add Statistic') ?></legend>
        <?php
            echo $this->Form->input('listing_id', ['options' => $listings]);
            echo $this->Form->input('type', ['options' => $type, 'empty' => false]);
            echo $this->Form->input('amount');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
