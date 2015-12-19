<?= $this->element('side-nav') ?>

<div class="categories index large-10 medium-8 columns content">
    <h3><?= __('Categories') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th class="title"><?= $this->Paginator->sort('title') ?></th>
                <th class="title"><?= $this->Paginator->sort('slug') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= h($category->title) ?></td>
                <td><?= h($category->slug) ?></td>
                <td><?= date_format($category->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
