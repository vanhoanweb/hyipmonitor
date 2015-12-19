<?= $this->element('side-nav') ?>

<div class="advertises index large-10 medium-8 columns content">
    <h3><?= __('Advertises') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('confirmed', 'ID') ?></th>
                <th class="five"><?= $this->Paginator->sort('position') ?></th>
                <th class="title"><?= $this->Paginator->sort('email') ?></th>
                <th class="title"><?= __('Banner') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($advertises as $advertise): ?>
            <tr>
                <td><?= ($advertise->confirmed == 1) ? $this->Number->format($advertise->id) : '<span class="bg-gray">'.$this->Number->format($advertise->id).'</span>'; ?></td>
                <td><?= ($advertise->position == 1) ? 'Top' : 'Inside'; ?></td>
                <td><?= h($advertise->email) ?></td>
                <td><?= $this->Html->link($this->Html->image($advertise->banner_url, ['alt' => $advertise->alt_text]), $advertise->site_url, ['target' => '_blank', 'escape' => false]) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advertise->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advertise->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertise->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
