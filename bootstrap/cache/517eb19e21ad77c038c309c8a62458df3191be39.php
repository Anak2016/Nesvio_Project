<?php $__env->startSection('title', 'ProductPayment'); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>
<?php $__env->startSection('content'); ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Order Payment</h2> <hr />
		</div>
	</div>
		<div class="row expanded">
			<div class="small-12 medium-11 ">
				<?php if(isset($payments) && count($payments) >0): ?>
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th><th>total</th><th>status</th>
							<th>Date Created</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($payment['order_no']); ?></td>
								<td><?php echo e($payment['user_id']); ?></td>
								<td><?php echo e($payment['amount']); ?></td>
								<td><?php echo e($payment['status']); ?></td>
								<td><?php echo e($payment['added']); ?></td>
							</td>

						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php echo $links; ?>

				<?php else: ?>
				<h2>No payment have been processed</h2>
				<?php endif; ?>
			</div>
		</div> 
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>