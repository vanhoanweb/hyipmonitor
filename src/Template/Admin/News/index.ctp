<?= $this->element('side-nav') ?>

<div class="news index large-10 medium-8 columns content">
    <h3><?= __('News') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($news as $news): ?>
            <tr>
                <td><?= $this->Number->format($news->id) ?></td>
                <td><a href="#<?= $news->id ?>" rel="modal:open"><?= $news->title ?></a></td>
                <td><?= date_format($news->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $news->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $news->id], ['confirm' => __('Are you sure you want to delete # {0}?', $news->id)]) ?>
                </td>
            </tr>
            <div class="modal" id="<?= $news->id ?>" style="display:none;"><?= $news->body ?></div>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination') ?>
</div>
