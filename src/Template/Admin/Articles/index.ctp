<?= $this->element('side-nav') ?>

<div class="articles index large-10 medium-8 columns content">
    <h3><?= __('Articles') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="date"><?= $this->Paginator->sort('category_id') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $this->Number->format($article->id) ?></td>
                <td><a href="#<?= $article->id ?>" rel="modal:open"><?= h($article->title) ?></a></td>
                <td><?= $this->Html->link($article->category->title, ['controller' => 'Articles', 'action' => 'category', $article->category->id, 'prefix' => false], ['target' => '_blank']) ?></td>
                <td><?= date_format($article->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $article->id, $article->slug, 'prefix' => false], ['target' => '_blank']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $article->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?>
                </td>
            </tr>
            <div class="modal" id="<?= $article->id ?>" style="display:none;"><?= $article->body ?></div>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
