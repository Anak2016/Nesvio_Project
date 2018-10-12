<!DOCTYPE html>
<html land="eng">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
</head>
<body>
	<div style="width: 600; padding: 15px; margin: 0 auto;">
		<!-- add logo images in here-->
		<img src="images/logo.png" width="80" height="80" />
	</div>
	<h2 style="color: #d23600;">Hello <?= user()->fullname ?>,</h2>
	<p>Your order confirmation details: 
		<span style="color: #0b97c4;">
			#<?= $data['order_no']?>		
		<span>
	</p>

	<table cellspacing="5" cellpadding="5" border="0" width="600" style="border: 1px solid #0a0a0a;">
		<tr style="background-color: #000000; color: #ffffff;">
			<th style="text-align: left;">Product Name</th><th>Unit Price</th><th>Quantity</th>
			<th>Total</th>
		</tr>
		<?php foreach($data['product'] as $item): ?>
			<tr>
				<td width="450">$<?= $item['name'] ?></td>
				<td width="100">$<?= $item['price'] ?></td>
				<td width="50">$<?= $item['quantity'] ?></td>
				<td width="50">$<?= $item['total'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>

		<h4>Total Amount: $<?= $data['total']?></h4>
	<p>We hope to see you again.</p>
	<h2>Ei-Shop</h2>
</body>
</html>