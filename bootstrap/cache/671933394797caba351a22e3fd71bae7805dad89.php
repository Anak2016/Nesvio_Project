<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('data-page-id', 'adminUsers'); ?>
<?php $__env->startSection('content'); ?>
<div class="product">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Users Information</h2> <hr />
		</div>
	</div>

	<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	
		<div class="column medium-11 float-left">	
			<a href="/admin/products/create" class="button float-right">
				<i class="fa fa-plus"></i> Add New Users
			</a>
		</div>

		<div class="row expanded">
			<div class="small-12 medium-11 ">
				<?php if(count($users)): ?>
				<table class="hover unstriped" data-form="deleteForm">
					<thead> 
						<tr><th>Username</th><th>Full name</th><th>Email</th>
							<th>Password</th><th>address</th><th>role</th>
							<th>Date Created</th><th width="70">Action</th>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($user['username']); ?></td>
								<td><?php echo e($user['fullname']); ?></td>
								<td><?php echo e($user['email']); ?></td>
								<td><?php echo e($user['password']); ?></td>
								<td><?php echo e($user['address']); ?></td>
								<td><?php echo e($user['role']); ?></td>
								
								<td><?php echo e($user['added']); ?></td>

								<td width="70" class="text-right">

									
									<span data-tooltip aria-haspopup="true" class="has-tip top"
									data-disable-hover="false" tabindex="1"
									title="Edit Product">Edit
									<a href="/admin/products/<?php echo e($user['id']); ?>/edit"><i class="fa fa-edit"></i></a>
								</span>

								
								<span style="display: inline-block"
								data-tooltip aria-haspopup="true" class="has-tip top"
								data-disable-hover="false" tabindex="1"
								title="Delete Category">
								<form method="POST" action="/admin/product/categories/<?php echo e($user['id']); ?>/delete" class="delete-item">
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
				<h2>No users have registered.</h2>
				<?php endif; ?>
			</div>
		</div> 
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>