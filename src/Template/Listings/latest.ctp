<?php // Meta for SEO
    $this->assign('title', 'New HYIPs at Monitoring');
    echo $this->Html->meta('description', 'New HYIPs at our HYIP Monitoring. In this list placed HYIPs that were added to listing in last 7 days.', ['block' => true]);
?>

<h2 class="entry-group">New HYIPs at Monitoring</h2>

<div class="entry-listing">
	<p><strong class="text-orange">Information:</strong> in this list placed HYIPs that were added to listing in last 7 days.</p>	
</div>

<?php foreach ($listings as $listing): ?>

    <?php include(WWW_ROOT.DS.'inc'.DS.'entry-listing.inc.php') ?>

<?php endforeach; ?>

<?= $this->element('pagination') ?>