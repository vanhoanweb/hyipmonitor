<?= $this->element('side-nav') ?>

<div class="votes index large-10 medium-8 columns content">
    <h3><?= __('Votes') ?></h3>
    <?php //$this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th class="five"><?= $this->Paginator->sort('vote') ?></th>
                <th class="title"><?= $this->Paginator->sort('listing_id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th class="actions"><?= __('Comment') ?></th>
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($votes as $vote): ?>
            <tr>
                <td><?= $vote->id ?></td>
                <td><?= ($vote->vote==1) ? $this->Html->image('good.png', ['alt' => 'good', 'width' => '24px']) : $this->Html->image('bad.png', ['alt' => 'bad', 'width' => '24px']) ?></td>
                <td><?= $vote->has('listing') ? $this->Html->link($vote->listing->title, ['controller' => 'Listings', 'action' => 'view', $vote->listing->id, $vote->listing->slug], ['target' => '_blank', 'class' => 'name-listing']) : '' ?></td>
                <td><?= h($vote->email) ?></td>
                <td><a href="#<?= $vote->id ?>" rel="modal:open">View</a></td>
                <td><?= date_format($vote->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?php //$this->Html->link(__('Edit'), ['action' => 'edit', $vote->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vote->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vote->id)]) ?>
                </td>
            </tr>
            <div class="modal" id="<?= $vote->id ?>" style="display:none;"><?= $vote->comment ?></div>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
