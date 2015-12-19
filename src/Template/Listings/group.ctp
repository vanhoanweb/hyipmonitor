<?php // Meta for SEO
    $this->assign('title', $name.' HYIPs at Monitoring');
    echo $this->Html->meta('description', $name.' HYIPs at our HYIP Monitoring. In this list placed '.$info, ['block' => true]);
?>

<h2 class="entry-group"><?= $name ?> HYIPs at Monitoring</h2>

<div class="entry-listing">
	<p><strong class="text-orange">Information:</strong> in this list placed <?= $info ?></p>	
</div>

<?php $sh = 1; ?>
<?php foreach ($listings as $listing): ?>

    <?php include(WWW_ROOT.DS.'inc'.DS.'entry-listing.inc.php') ?>

    <?php if($sh%5 == 0): ?>
		<div class="entry-listing">
			
		</div>
	<?php endif; $sh++; ?>

<?php endforeach; ?>

<?= $this->element('pagination') ?>