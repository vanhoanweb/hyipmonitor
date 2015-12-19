<?php // Meta for SEO
    $this->assign('title', 'Add Monitoring Partner');
    echo $this->Html->meta('description', 'Add Monitoring Partner at ShareHYIP.com. Place our logo at your site and then we will add your logo here.', ['block' => true]);
?>

<h2 class="entry-group">Add Partner</h2>

<div class="entry-listing">
    <p class="text-center"><strong><?= $this->Html->link(__('LIST PARTNERS'), ['action' => 'index'], ['class' => 'text-orange']) ?></strong></p>
    <p class="text-center">Place our logo to your site (simply copy and paste this html code to your html).</p>    
    <div class="row">
        <div class="three columns text-center">
            <?= $this->Html->image('logo-125.png', ['alt' => 'ShareHYIP.com']) ?>
        </div>
        <div class="nine columns">
            <textarea readonly style="height:125px;">&lt;!-- Start ShareHYIP.com Partner Button --&gt;
&lt;a href="http://sharehyip.com" title="Monitor, Reviews and Rating HYIP" target="_blank"&gt;&lt;img src="http://sharehyip.com/img/logo-125.png" alt="ShareHYIP.com" /&gt;&lt;/a&gt;
&lt;!-- End ShareHYIP.com Partner Button --&gt;</textarea>
        </div>
    </div>
</div>

<div class="entry-listing">
    <p class="text-center">Submit form when you have placed our logo. Then we will add your logo here. Thank you.</p>

    <?= $this->Form->create($partner) ?>    
    <?php
        echo $this->Form->input('title', ['class' => 'u-full-width']);
        echo $this->Form->input('description', ['class' => 'u-full-width']);
        echo $this->Form->input('url', ['class' => 'u-full-width']);
        echo $this->Form->input('button_url', ['class' => 'u-full-width']);
        echo $this->Form->input('back_link', ['class' => 'u-full-width']);
        echo $this->Form->input('email', ['class' => 'u-full-width']);
    ?>
    <?= $this->Form->button(__('Submit'), ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div><!--entry-listing-->