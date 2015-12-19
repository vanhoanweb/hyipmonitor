<?= $this->element('side-nav') ?>

<div class="listings form large-10 medium-8 columns content">
    <?= $this->Form->create($listing) ?>
    <fieldset>
        <legend><?= __('Add Listing') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('thumbnail');
            echo $this->Form->input('url');
            echo $this->Form->input('rank');
            echo $this->Form->input('options', ['options' => $options, 'multiple' => 'checkbox']);
            echo $this->Form->input('plan');
            echo $this->Form->input('status', ['options' => $status, 'default' => 2]);
            echo $this->Form->input('group_id', ['options' => $groups, 'default' => 3]);
            echo $this->Form->input('min_spend');
            echo $this->Form->input('max_spend');
            echo $this->Form->input('referral');
            echo $this->Form->input('withdrawal_type', ['options' => $withdrawal, 'empty' => false]);
            echo $this->Form->input('rating', ['options' => $ratings, 'type' => 'radio']);
            echo $this->Form->input('contact_email');
            echo $this->Form->input('description');
            echo $this->Form->input('pay_systems', ['options' => $payments, 'multiple' => 'checkbox']);
            echo $this->Form->input('support_tg');
            echo $this->Form->input('support_dtm');
            echo $this->Form->input('support_mmg');
            echo $this->Form->input('support_mmgp');
            echo $this->Form->input('review_url');
            echo $this->Form->input('date_started');
            echo $this->Form->input('date_added');
            echo $this->Form->input('date_closed', ['empty' => true]);
            echo $this->Form->input('confirmed', ['type' => 'checkbox', 'default' => 1]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script src="http://cdn.ckeditor.com/4.5.4/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
