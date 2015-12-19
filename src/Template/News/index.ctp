<?php // Meta for SEO
    $this->assign('title', 'Monitoring Last News');
    echo $this->Html->meta('description', 'HYIP Monitoring News. Information about newest updates and changes at our HYIP Monitoring.', ['block' => true]);
?>

<h2 class="entry-group">Monitoring Last News</h2>

<?php foreach ($news as $news): ?>
    <div class="entry-listing news" id="<?= $news->id ?>">
        <h3 class="text-center entry-name"><?= $news->title ?></h3>
        <div><?= $news->body ?></div>
        <p class="text-right"><em><?= date_format($news->created, 'M d, Y') ?></em></p>
    </div><!--entry-listing-->            
<?php endforeach; ?>

<?= $this->element('pagination') ?>
