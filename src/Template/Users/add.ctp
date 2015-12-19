<h2 class="entry-group">Add User</h2>

<div class="entry-listing">
    <?= $this->Form->create($user) ?>
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div>
