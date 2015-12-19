<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Listing'), ['action' => 'edit', $listing->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Listing'), ['action' => 'delete', $listing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listing->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Listings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['controller' => 'Articles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['controller' => 'Articles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reports'), ['controller' => 'Reports', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Report'), ['controller' => 'Reports', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statistics'), ['controller' => 'Statistics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Statistic'), ['controller' => 'Statistics', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listings view large-9 medium-8 columns content">
    <h3><?= h($listing->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($listing->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($listing->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumbnail') ?></th>
            <td><?= h($listing->thumbnail) ?></td>
        </tr>
        <tr>
            <th><?= __('Url') ?></th>
            <td><?= h($listing->url) ?></td>
        </tr>
        <tr>
            <th><?= __('Options') ?></th>
            <td><?= h($listing->options) ?></td>
        </tr>
        <tr>
            <th><?= __('Plan') ?></th>
            <td><?= h($listing->plan) ?></td>
        </tr>
        <tr>
            <th><?= __('Group') ?></th>
            <td><?= $listing->has('group') ? $this->Html->link($listing->group->title, ['controller' => 'Groups', 'action' => 'view', $listing->group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Referral') ?></th>
            <td><?= h($listing->referral) ?></td>
        </tr>
        <tr>
            <th><?= __('Support Email') ?></th>
            <td><?= h($listing->support_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Systems') ?></th>
            <td><?= h($listing->pay_systems) ?></td>
        </tr>
        <tr>
            <th><?= __('Support Tg') ?></th>
            <td><?= h($listing->support_tg) ?></td>
        </tr>
        <tr>
            <th><?= __('Support Dtm') ?></th>
            <td><?= h($listing->support_dtm) ?></td>
        </tr>
        <tr>
            <th><?= __('Support Mmg') ?></th>
            <td><?= h($listing->support_mmg) ?></td>
        </tr>
        <tr>
            <th><?= __('Support Mmgp') ?></th>
            <td><?= h($listing->support_mmgp) ?></td>
        </tr>
        <tr>
            <th><?= __('Review Url') ?></th>
            <td><?= h($listing->review_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($listing->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Ordering') ?></th>
            <td><?= $this->Number->format($listing->ordering) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($listing->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Min Spend') ?></th>
            <td><?= $this->Number->format($listing->min_spend) ?></td>
        </tr>
        <tr>
            <th><?= __('Max Spend') ?></th>
            <td><?= $this->Number->format($listing->max_spend) ?></td>
        </tr>
        <tr>
            <th><?= __('Withdrawal Type') ?></th>
            <td><?= $this->Number->format($listing->withdrawal_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Rating') ?></th>
            <td><?= $this->Number->format($listing->rating) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Started') ?></th>
            <td><?= h($listing->date_started) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Added') ?></th>
            <td><?= h($listing->date_added) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Closed') ?></th>
            <td><?= h($listing->date_closed) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($listing->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Articles') ?></h4>
        <?php if (!empty($listing->articles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th><?= __('Thumbnail') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Listing Id') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Meta Description') ?></th>
                <th><?= __('Meta Keyword') ?></th>
                <th><?= __('Meta Title') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->articles as $articles): ?>
            <tr>
                <td><?= h($articles->id) ?></td>
                <td><?= h($articles->name) ?></td>
                <td><?= h($articles->slug) ?></td>
                <td><?= h($articles->thumbnail) ?></td>
                <td><?= h($articles->category_id) ?></td>
                <td><?= h($articles->listing_id) ?></td>
                <td><?= h($articles->body) ?></td>
                <td><?= h($articles->meta_description) ?></td>
                <td><?= h($articles->meta_keyword) ?></td>
                <td><?= h($articles->meta_title) ?></td>
                <td><?= h($articles->created) ?></td>
                <td><?= h($articles->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Articles', 'action' => 'view', $articles->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Articles', 'action' => 'edit', $articles->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Articles', 'action' => 'delete', $articles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articles->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Reports') ?></h4>
        <?php if (!empty($listing->reports)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Listing Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Report') ?></th>
                <th><?= __('Ip') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->reports as $reports): ?>
            <tr>
                <td><?= h($reports->id) ?></td>
                <td><?= h($reports->listing_id) ?></td>
                <td><?= h($reports->email) ?></td>
                <td><?= h($reports->report) ?></td>
                <td><?= h($reports->ip) ?></td>
                <td><?= h($reports->created) ?></td>
                <td><?= h($reports->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reports', 'action' => 'view', $reports->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reports', 'action' => 'edit', $reports->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reports', 'action' => 'delete', $reports->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reports->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Statistics') ?></h4>
        <?php if (!empty($listing->statistics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Listing Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Amount') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listing->statistics as $statistics): ?>
            <tr>
                <td><?= h($statistics->id) ?></td>
                <td><?= h($statistics->listing_id) ?></td>
                <td><?= h($statistics->type) ?></td>
                <td><?= h($statistics->amount) ?></td>
                <td><?= h($statistics->created) ?></td>
                <td><?= h($statistics->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Statistics', 'action' => 'view', $statistics->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Statistics', 'action' => 'edit', $statistics->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Statistics', 'action' => 'delete', $statistics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $statistics->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
