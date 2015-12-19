<?= $this->element('side-nav') ?>

<div class="listings index large-10 medium-8 columns content">
    <h3><?= __('Listings') ?></h3>
    <?= $this->Html->link(__('Add'), ['action' => 'add'], ['class' => 'button']) ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="five"><?= $this->Paginator->sort('id') ?></th>
                <th class="five"><?= $this->Paginator->sort('rank', 'No') ?></th>
                <th class="title"><?= $this->Paginator->sort('title') ?></th>
                <th class="eight"><?= $this->Paginator->sort('group_id') ?></th>
                <th class="actions"><?= $this->Paginator->sort('status') ?></th>
                <th class="eight"><?= __('HYIP.biz') ?></th>
                <!--<th class="forums"><?= __('Forums') ?></th>
                <th class="eight"><?= __('A/Whois') ?></th>-->
                <th><?= $this->Paginator->sort('confirmed', 'Statistics') ?></th>
                <th class="date"><?= $this->Paginator->sort('date_added') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listings as $listing): ?>
            <?php
                $domain = str_ireplace('www.', '', parse_url($listing->url, PHP_URL_HOST));
                switch ($listing->status) {
                    case '1': $status = $this->Html->image('paying.gif', ['alt' => 'Paying', 'title' => 'Paying']); break;
                    case '2': $status = $this->Html->image('waiting.gif', ['alt' => 'Waiting', 'title' => 'Waiting']); break;
                    case '3': $status = $this->Html->image('problem.gif', ['alt' => 'Problem', 'title' => 'Problem']); break;
                    case '4': $status = $this->Html->image('scam.gif', ['alt' => 'Scam', 'title' => 'Scam']); break;
                }
            ?>
            <tr>
                <td><?= $this->Number->format($listing->id) ?></td>
                <td><?= ($listing->confirmed == 0) ? '<span class="bg-gray">'.$this->Number->format($listing->rank).'</span>' : $this->Number->format($listing->rank) ?></span></td>
                <td>
                    <?= $this->Html->link($listing->title, ['action' => 'view', $listing->id, $listing->slug, 'prefix' => false], ['target' => '_blank', 'class' => 'name-listing']) ?>
                    <?php $date_added = new DateTime($listing->date_added); $today = new DateTime(); ?>
                    <?= ($date_added->diff($today)->days < 7) ? '<span class="new-program">new</span>' : '' ?>
                </td>
                <td><?= $listing->has('group') ? $listing->group->title : '' ?></td>
                <td><?= $status ?></td>
                <td><a href="http://www.hyip.biz/details/<?= $domain ?>" target="_blank"><?= $this->Html->image('http://www.hyip.biz/informer/'.$domain, ['alt' => 'HYIP.biz', 'title' => 'HYIP.biz'], ['escape' => false]) ?></a></td>
                <!--<td>
                    <?= ($listing->support_tg) ? '<a href="'.$listing->support_tg.'" target="_blank">'.$this->Html->image('tg.png', ['alt' => 'TG', 'title' => 'TG', 'style' => 'height:25px']).'</a>' : $this->Html->image('tg.png', ['alt' => 'TG', 'title' => 'TG', 'style' => 'height:25px']) ?>
                    <?= ($listing->support_dtm) ? '<a href="'.$listing->support_dtm.'" target="_blank">'.$this->Html->image('dtm.png', ['alt' => 'DTM', 'title' => 'DTM', 'style' => 'height:25px']).'</a>' : $this->Html->image('dtm.png', ['alt' => 'DTM', 'title' => 'DTM', 'style' => 'height:25px']) ?>
                    <?= ($listing->support_mmg) ? '<a href="'.$listing->support_mmg.'" target="_blank">'.$this->Html->image('mmg.png', ['alt' => 'MMG', 'title' => 'MMG', 'style' => 'height:25px']).'</a>' : $this->Html->image('mmg.png', ['alt' => 'MMG', 'title' => 'MMG', 'style' => 'height:25px']) ?>
                    <?= ($listing->support_mmgp) ? '<a href="'.$listing->support_mmgp.'" target="_blank">'.$this->Html->image('mmgp.png', ['alt' => 'MMGP', 'title' => 'MMGP', 'style' => 'height:25px']).'</a>' : $this->Html->image('mmgp.png', ['alt' => 'MMGP', 'title' => 'MMGP', 'style' => 'height:25px']) ?>
                </td>
                <td>
                    <a href="http://www.alexa.com/siteinfo/<?= $domain ?>" target="_blank"><?= $this->Html->image('alexa.png', ['alt' => 'alexa', 'title' => 'alexa']) ?></a>
                    <a href="http://www.who.is/whois/<?= $domain ?>" target="_blank"><?= $this->Html->image('whois.png', ['alt' => 'whois', 'title' => 'whois']) ?></a>
                </td>-->
                <td><a href="#<?= $listing->id ?>" rel="modal:open"><?= $this->Html->image('payout-link.gif') ?>Payout</a> <a href="mailto:<?= $listing->contact_email ?>"><?= $this->Html->image('email.gif') ?>Contact</a></td>
                <td><?= date_format($listing->date_added, 'M d, Y') ?></td>
                <td class="actions">                    
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $listing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $listing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listing->id)]) ?>
                </td>
            </tr>
            <div class="modal" id="<?= $listing->id ?>" style="display:none;">
                <?= $this->Form->create(null, ['url' => ['controller' => 'Statistics', 'action' => 'add']]) ?>
                <fieldset>
                    <legend><?= __('Add Statistic') ?></legend>
                    <?php
                        echo $this->Form->hidden('listing_id', ['value' => $listing->id]);
                        echo $this->Form->input('type', ['options' => [1 => 'Deposit', 2 => 'Payout'], 'empty' => false]);
                        echo $this->Form->input('amount');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination') ?>
</div>
