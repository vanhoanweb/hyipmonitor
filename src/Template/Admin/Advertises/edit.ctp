<?= $this->element('side-nav') ?>

<div class="advertises form large-10 medium-8 columns content">
    <?= $this->Form->create($advertise) ?>
    <fieldset>
        <legend><?= __('Edit Advertise') ?></legend>
        <?php
            echo $this->Form->input('position', ['options' => $position, 'empty' => false]);
            echo $this->Form->input('site_url');
            echo $this->Form->input('email');
            echo $this->Form->input('banner_url');
            echo $this->Form->input('alt_text');
            echo $this->Form->input('confirmed', ['type' => 'checkbox', 'default' => 1]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
