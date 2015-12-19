<div class="users login large-12 medium-12 columns content">
	<h3>Login</h3>
	<?= $this->Form->create() ?>
	<?= $this->Form->input('username', ['required' => true]) ?>
	<?= $this->Form->input('password', ['required' => true]) ?>
	<?= $this->Form->button('Login') ?>
	<?= $this->Form->end() ?>
</div>