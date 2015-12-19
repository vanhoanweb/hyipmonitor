<?= $this->element('side-nav') ?>

<div class="partners index large-10 medium-8 columns content">
    <h3><?= __('Partners') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('confirmed', 'ID') ?></th>
                <th class="title"><?= $this->Paginator->sort('title') ?></th>
                <th class="title"><?= $this->Paginator->sort('email') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($partners as $partner): ?>
            <tr>
                <td><?= ($partner->confirmed == 0) ? '<span class="bg-gray">'.$this->Number->format($partner->id).'</span>' : $this->Number->format($partner->id) ?></td>
                <td><?= $this->Html->link($partner->title, $partner->back_link, ['target' => '_blank']) ?></td>
                <td><?= h($partner->email) ?></td>
                <td><?= date_format($partner->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $partner->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $partner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partner->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
