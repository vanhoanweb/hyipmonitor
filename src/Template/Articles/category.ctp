<?php // Meta for SEO
    $this->assign('title', $title.' - Investment Blog - Tips From The Pros');
    echo $this->Html->meta('description', 'Here you will find a wide choice of investment lessons and tips from the pros, HYIP reviews, latest news about the HYIP industry, investment ideas.', ['block' => true]);
?>

<h2 class="entry-group"><?= $title ?></h2>

<?php foreach ($articles as $article): ?>

    <div class="entry-listing">
        <h3 class="entry-name"><?= $this->Html->link($article->title, ['controller' => 'Articles', 'action' => 'view', $article->id, $article->slug]) ?></h3>
        <div class="entry-meta"><small>Published <em><?= date_format($article->created, 'M d, Y') ?></em> on <?= $article->has('category') ? $this->Html->link($article->category->title, ['controller' => 'Articles', 'action' => 'category', $article->category->id]) : '' ?></small></div>
        <div class="entry-body"><p><?= strip_tags(substr($article->body, 0, 450)) ?> <?= $this->Html->link('[Read more]', ['controller' => 'Articles', 'action' => 'view', $article->id, $article->slug]) ?></p></div>        
    </div>

<?php endforeach; ?>

<?= $this->element('pagination') ?>