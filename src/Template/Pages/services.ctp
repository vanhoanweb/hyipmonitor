<?php // Meta for SEO
    $this->assign('title', 'Order services at Monitoring');
    echo $this->Html->meta('description', 'Order services at our HYIP Monitoring. Add HYIP to Exclusive, Prerium or Normal list, order banner advertising.', ['block' => true]);
?>

<h2 class="entry-group">Order services at Monitoring</h2>

<div class="entry-listing">
	<p>For HYIP owners we offer:</p>
	<ul>
		<li type="disc">high quality of services at relatively low cost;</li>
		<li type="disc">regular payment proofs posting at TOP English and Russian HYIP forums;</li>
		<li type="disc">more than <strong>500</strong> real visitors will see your HYIP daily;</li>
		<li type="disc">free lifetime banner;</li>
		<li type="disc">no listing fee.</li>
	</ul>
	<p>Please read our conditions before adding HYIP or banner advertising:</p>
	<ul>
		<li type="square">we do NOT provide services to those HYIP, which offers for investors more than 10% net daily profit (in investment plan with minimum deposit amount);</li>
		<li type="square">only the administrator or owner can add HYIP, referral links not allowed;</li>
		<li type="square">HYIP ratings and statuses based on publicly available information and personal experience of monitoring administration. Cannot be disputed, but any comments and suggestions are welcome;</li>
		<li type="square">we accept bonus deposit, but in this case we can not open threads at the Russian HYIP forums (it is forums rules);</li>
		<li type="square">we NOT accept any special/monitoring plans;</li>
		<li type="square">one free lifetime banner available for Premium (728x90 rotating banner) and Normal (468x60 rotating banner) listings, for Exclusive available both banners;</li>
		<li type="square">if we detect fraud or selective payments, we reserve the right to move HYIP into the blacklist (SCAM) and/or remove all advertisements without any refunds;</li>
		<li type="square">we have the right to reject listing request without explanation. In this case money will be refunded.</li>
	</ul>
	<p>To order listing (monitoring service) <strong>click on List Name:</strong></p>
	<table class="u-full-width">
		<thead>
			<tr>
				<th>Add HYIP to list</th>
				<th>Also Included in Price</th>
				<th>Listing Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= $this->Html->link(__('Exclusive'), ['controller' => 'Listings', 'action' => 'add']) ?></td>
				<td>728x90 + 468x60</td>
				<td>$150</td>
			</tr>
			<tr>
				<td><?= $this->Html->link(__('Premium'), ['controller' => 'Listings', 'action' => 'add']) ?></td>
				<td>728x90 banner</td>
				<td>$50</td>
			</tr>
			<tr>
				<td><?= $this->Html->link(__('Normal'), ['controller' => 'Listings', 'action' => 'add']) ?></td>
				<td>468x60 banner</td>
				<td>$30</td>
			</tr>
		</tbody>
	</table>
	<p>To order banner advertising <strong>click on Banner Name:</strong></p>
	<table class="u-full-width">
		<thead>
			<tr>
				<th>Add Banner</th>
				<th>Location</th>
				<th>Price</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?= $this->Html->link(__('Top 728x90, rotation'), ['controller' => 'Advertises', 'action' => 'add']) ?></td>
				<td>top of all pages</td>
				<td>$10/week</td>
			</tr>
			<tr>
				<td><?= $this->Html->link(__('Inside 468x60, rotation'), ['controller' => 'Advertises', 'action' => 'add']) ?></td>
				<td>between HYIPs in list</td>
				<td>$5/week</td>
			</tr>
		</tbody>
	</table>
</div>