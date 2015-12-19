<?= $this->element('side-nav') ?>

<div class="articles form large-10 medium-8 columns content">
    <?= $this->Form->create($article) ?>
    <fieldset>
        <legend><?= __('Edit Article') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('category_id', ['options' => $categories, 'empty' => false]);
            echo $this->Form->input('body');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="http://cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body',{ height: 500 });
</script>
