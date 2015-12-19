<?php // Meta for SEO
    $this->assign('title', 'HYIP Monitoring, Reviews, Latest News and Rating HYIP');
    echo $this->Html->meta('description', 'Good HYIP Monitoring with high RCB. Detailed information about HYIPs. Search of New HYIPs. Monitoring HYIP without listing fee.', ['block' => true]);
?>

<h2 class="entry-group">All HYIPs at Monitoring</h2>

<?php foreach ($listings as $listing): ?>

    <?php include(WWW_ROOT.DS.'inc'.DS.'entry-listing.inc.php') ?>

<?php endforeach; ?>

<?= $this->element('pagination') ?>
