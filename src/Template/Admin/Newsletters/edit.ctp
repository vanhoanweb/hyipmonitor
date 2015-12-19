<?= $this->element('side-nav') ?>

<div class="newsletters form large-10 medium-8 columns content">
    <?= $this->Form->create($newsletter) ?>
    <fieldset>
        <legend><?= __('Edit Newsletter') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('type', ['options' => $type, 'empty' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
