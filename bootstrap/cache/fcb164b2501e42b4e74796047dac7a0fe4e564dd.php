<?php $__env->startSection('title', 'ProductsOrderDetail'); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>
<?php $__env->startSection('content'); ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>OrdersDetail</h2> <hr />
		</div>
	</div>

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				<?php if(isset($orderDetail) && count($orderDetail) >0): ?>
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th><th>Product_id</th>
							<th>Unit_price</th><th>quantity</th><th>total</th><th>status</th>
							<th>Date Created</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $orderDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($order['order_no']); ?></td>
								<td><?php echo e($order['user_id']); ?></td>
								<td><?php echo e($order['product_id']); ?></td>
								<td><?php echo e($order['unit_price']); ?></td>
								<td><?php echo e($order['quantity']); ?></td>
								<td><?php echo e($order['total']); ?></td>
								<td><?php echo e($order['status']); ?></td>
								<td><?php echo e($order['added']); ?></td>
							</td>

						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php echo $links; ?>

				<?php else: ?>
				<h2>this order does not exist.</h2>
				<?php endif; ?>
			</div>
		</div> 
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>