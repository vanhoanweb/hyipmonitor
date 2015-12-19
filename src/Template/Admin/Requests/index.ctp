<?= $this->element('side-nav') ?>

<div class="requests index large-10 medium-8 columns content">
    <h3><?= __('Requests') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th class="title"><?= $this->Paginator->sort('listing_id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th class="eight"><?= $this->Paginator->sort('amount', 'Dep') ?></th>
                <th class="eight"><?= $this->Paginator->sort('commission', 'Ref') ?></th>
                <th class="eight"><?= $this->Paginator->sort('rcb') ?></th>
                <th><?= $this->Paginator->sort('status', 'Account') ?></th>                
                <th class="date"><?= $this->Paginator->sort('created') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($requests as $request): ?>
            <tr>
                <?php
                switch ($request->status) {
                    case '1':
                        $amount     = '<strong class="text-green">$'.number_format($request->amount, 2).'</strong>';
                        $commission = '<strong class="text-green">$'.number_format($request->commission, 2).'</strong>';
                        $rcb        = '<strong class="text-green">$'.number_format($request->rcb, 2).'</strong>';
                        break;
                    case '2':
                        $amount     = '<strong class="text-orange">$'.number_format($request->amount, 2).'</strong>';
                        $commission = '<strong class="text-orange">$'.number_format($request->commission, 2).'</strong>';
                        $rcb        = '<strong class="text-orange">$'.number_format($request->rcb, 2).'</strong>';
                        break;
                }
                ?>
                <td><?= $this->Number->format($request->id) ?></td>
                <td><?= $request->has('listing') ? $this->Html->link($request->listing->title, ['controller' => 'Listings', 'action' => 'view', $request->listing->id, $request->listing->slug, 'prefix' => false], ['target' => '_blank', 'class' => 'name-listing']) : '' ?></td>
                <td><?= $this->Html->link($request->username, 'mailto:'.$request->email) ?></td>
                <td><?= $amount ?></td>
                <td><?= $commission ?></td>
                <td><?= $rcb ?></td>
                <td><?= $this->Html->image($request->pay_system.'.gif', ['alt' => $request->pay_system, 'title' => $request->pay_system]) ?> <?= h($request->your_account) ?></td>
                <td><?= date_format($request->created, 'M d, Y') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $request->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $request->id], ['confirm' => __('Are you sure you want to delete # {0}?', $request->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <?= $this->element('pagination') ?>
</div>
