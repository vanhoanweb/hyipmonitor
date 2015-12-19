<?= $this->element('side-nav') ?>

<div class="requests form large-10 medium-8 columns content">
    <?= $this->Form->create($request) ?>
    <fieldset>
        <legend><?= __('Edit Request') ?></legend>
        <?php
            echo $this->Form->input('listing_id', ['options' => $listings]);
            echo $this->Form->input('email');
            echo $this->Form->input('username');
            echo $this->Form->input('amount');
            echo $this->Form->input('commission');
            echo $this->Form->input('rcb');
            echo $this->Form->input('pay_system', ['options' => $payment]);
            echo $this->Form->input('your_account');
            echo $this->Form->input('status', ['options' => $status]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script>
    $('#commission').keyup(function() {
        var commission = $(this).val();
        var rcb = commission*0.8;
        $('#rcb').val(rcb);
    });
</script>
