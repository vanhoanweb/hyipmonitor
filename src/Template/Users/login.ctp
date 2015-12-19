<h2 class="entry-group">Login</h2>

<div class="entry-listing">
	<?= $this->Form->create() ?>
	<?= $this->Form->input('username', ['required' => true]) ?>
	<?= $this->Form->input('password', ['required' => true]) ?>
	<?= $this->Form->button('Login', ['class' => 'button-primary']) ?>
	<?= $this->Form->end() ?>
</div>