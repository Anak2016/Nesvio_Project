<?php $__env->startSection('title', 'ProductsOrder'); ?>
<?php $__env->startSection('data-page-id', 'product'); ?>
<?php $__env->startSection('content'); ?>

<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Orders Information</h2> <hr />
		</div>
	</div>

	<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				<?php if(isset($orders)): ?>
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Order_no</th><th>User_id</th>
							<th>Date Created</th><th width="70">Action</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($order['order_no']); ?></td>
								<td><?php echo e($order['user_id']); ?></td>
								<td><?php echo e($order['added']); ?></td>

								<td width="70" class="text-right">

									
									<span data-tooltip aria-haspopup="true" class="has-tip top"
									data-disable-hover="false" tabindex="1"
									title="order details">Edit
									<a href="/admin/orders/<?php echo e($order['order_no']); ?>"><i class="fa fa-edit"></i></a>
								</span>

								
								<span style="display: inline-block"
								data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Delete Order">
								<form method="POST" action="/admin/orders/<?php echo e($order['id']); ?>/delete" class="delete-item" >
									<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
									<button type="submit"><i class="fa fa-times delete"></i></button>
								</form>
							</td>

						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				<?php echo $links; ?>

				<?php else: ?>
				<h2>Users have not ordered.</h2>
				<?php endif; ?>
			</div>
		</div> 
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>