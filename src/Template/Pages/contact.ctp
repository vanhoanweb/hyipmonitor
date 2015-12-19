<?php // Meta for SEO
    $this->assign('title', 'Contact Us');
    echo $this->Html->meta('description', 'Our Contacts Page. Leave message via support form or send message via email.', ['block' => true]);
?>

<h2 class="entry-group">Contact Us</h2>

<div class="entry-listing">
	<p>If you have business inquiries or other questions. Please, use e-mail <a href="mailto:sharehyip@gmail.com">sharehyip@gmail.com</a> for support requests.</p>

	<?= $this->Form->create(null, ['url' => ['controller' => 'Pages', 'action' => 'display']]) ?>
    <?php
        echo $this->Form->input('name', ['class' => 'u-full-width', 'required' => true, 'placeholder' => 'Your name']);
        echo $this->Form->input('email', ['class' => 'u-full-width', 'required' => true, 'placeholder' => 'Your email']);
        echo $this->Form->input('subject', ['class' => 'u-full-width', 'required' => true, 'placeholder' => 'Subject']);
        echo $this->Form->input('body', ['class' => 'u-full-width', 'required' => true, 'placeholder' => 'Body', 'type' => 'textarea']);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div>