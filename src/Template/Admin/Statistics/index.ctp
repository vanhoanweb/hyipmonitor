<?= $this->element('side-nav') ?>

<div class="statistics index large-10 medium-8 columns content">
    <h3><?= __('Statistics') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('listing_id') ?></th>
                <th><?= $this->Paginator->sort('type', 'Amount') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($statistics as $statistic): ?>
            <tr>
                <td><?= $this->Number->format($statistic->id) ?></td>
                <td><?= $statistic->has('listing') ? $this->Html->link($statistic->listing->title, ['controller' => 'Listings', 'action' => 'view', $statistic->listing->id, $statistic->listing->slug, 'prefix' => false], ['target' => '_blank', 'class' => 'name-listing']) : '' ?></td>
                <td>
                    <?= ($statistic->type ==1) ? '<strong class="text-red">-$'.number_format($statistic->amount,2).'</strong>' : '<strong class="text-green">+$'.number_format($statistic->amount,2).'</strong>' ?> 
                </td>
                <td><?= date_format($statistic->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $statistic->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $statistic->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statistic->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
