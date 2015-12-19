<?= $this->element('side-nav') ?>

<div class="partners form large-10 medium-8 columns content">
    <?= $this->Form->create($partner) ?>
    <fieldset>
        <legend><?= __('Add Partner') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('description');
            echo $this->Form->input('url');
            echo $this->Form->input('button_url');
            echo $this->Form->input('back_link');
            echo $this->Form->input('email');
            echo $this->Form->input('confirmed', ['type' => 'checkbox', 'default' => 1]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
