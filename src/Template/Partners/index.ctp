<?php // Meta for SEO
    $this->assign('title', 'Monitoring Partners');
    echo $this->Html->meta('description', 'Monitoring Partners at ShareHYIP.com. Place our logo at your site and then we will add your logo here.', ['block' => true]);
?>

<h2 class="entry-group">Monitoring Partners</h2>

<div class="entry-listing">
    <p class="text-center"><strong><?= $this->Html->link(__('ADD PARTNER'), ['action' => 'add'], ['class' => 'text-orange']) ?></strong></p>

    <table class="u-full-width">
        <tbody>
            <?php foreach ($partners as $partner): ?>
            <tr>
                <td class="text-left">
                    <p><?= $this->Html->link($partner->title, $partner->url, ['target' => '_blank']) ?></p>
                    <p><?= $partner->description ?></p>
                </td>
                <td><?= $this->Html->image($partner->button_url, ['alt' => $partner->title, 'title' => $partner->title, 'class' => 'partners']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?= $this->element('pagination') ?>
</div><!--entry-listing-->