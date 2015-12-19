<?php // Meta for SEO
    $this->assign('title', $article->title);
    echo $this->Html->meta('description', strip_tags(substr($article->body, 0, 160)), ['block' => true]);
?>

<h3 class="entry-group"><?= $article->category->title ?></h3>

<div class="entry-listing blog">
    <h2 class="entry-title"><?= h($article->title) ?></h2>
    <div class="entry-meta row">
        <div class="one-half column">
            <small>Published <em><?= date_format($article->created, 'M d, Y') ?></em> on <?= $article->has('category') ? $this->Html->link($article->category->title, ['controller' => 'Articles', 'action' => 'category', $article->category->id]) : '' ?></small>
        </div>
        <div class="text-right social-icon">            
            <a class="facebook" target="_window" onclick="return !window.open(this.href, 'Facebook', 'width=640,height=300')" href="http://www.facebook.com/sharer/sharer.php?u=http://sharehyip.com/blog/<?= $article->id ?>/<?= $article->slug ?>/" title="Facebook"></a>
            <a class="twitter" target="_window" onclick="return !window.open(this.href, 'Twitter', 'width=640,height=300')" href="https://twitter.com/home?status=http://sharehyip.com/blog/<?= $article->id ?>/<?= $article->slug ?>/" title="Twitter"></a>
            <a class="google" target="_window" onclick="return !window.open(this.href, 'Google+', 'width=640,height=300')" href="https://plus.google.com/share?url=http://sharehyip.com/blog/<?= $article->id ?>/<?= $article->slug ?>/" title="Google+"></a>            
        </div>        
    </div>
    <div class="entry-body"><?= $article->body ?></div>
</div>
