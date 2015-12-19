<?= $this->element('side-nav') ?>

<div class="news form large-10 medium-8 columns content">
    <?= $this->Form->create($news) ?>
    <fieldset>
        <legend><?= __('Add News') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('body');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="http://cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body');
</script>
