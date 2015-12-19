<?= $this->element('side-nav') ?>

<div class="newsletters index large-10 medium-8 columns content">
    <h3><?= __('Newsletters') ?></h3>
    <?php //$this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('type', 'ID') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($newsletters as $newsletter): ?>
            <tr>
                <td><?= ($newsletter->type == 0) ? '<span class="bg-gray">'.$this->Number->format($newsletter->id).'</span>' : $this->Number->format($newsletter->id) ?></td>
                <td><?= h($newsletter->email) ?></td>
                <td><?= date_format($newsletter->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('Edit'), ['action' => 'edit', $newsletter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $newsletter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $newsletter->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
