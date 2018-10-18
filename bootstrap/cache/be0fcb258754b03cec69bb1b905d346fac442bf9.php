<?php $__env->startSection('title', 'Edit User'); ?>
<?php $__env->startSection('data-page-id', 'adminUser'); ?>
<?php $__env->startSection('content'); ?>
<div class="add-User">
	<div clss ="row expanded">
		<div class="column medium-11">
			<h2>Edit <?php echo e($user->fullname); ?></h2> <hr />
		</div>
	</div>

	<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
	<form method="post" action="/admin/users/<?php echo e($user->id); ?>/edit" enctype="multipart/form-data">
		<div class="small-12 medium-11">
			<div class="row expanded">
				<div class="row expanded">
					<div class="small-12 medium-6 column">
						<label>Username:
							<input type="text" name="usename" value="<?php echo e($user->username); ?>" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Fullname:
							<input type="text" name="fullname" value="<?php echo e($user->fullname); ?>" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Email:
							<input type="text" name="email" value="<?php echo e($user->email); ?>" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Address:
							<input type="text" name="address" value="<?php echo e($user->address); ?>" disabled>
						</label>
					</div>
					<div class="small-12 medium-6 column">
						<label>Role:
							
							<select name="role">
								<option selected><?php echo e($user->role); ?></option>
								<?php if($user->role != user): ?>
								<option value="user">user</option>
								<?php else: ?>
								<option value="admin">admin</option>
								<?php endif; ?>
							</select>
						</label>
					</div>
					
					<div class="small-12 column">
						<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
						<input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

						<input class="button warning float-right" type="submit" value="Update User">
					</div>
				</div>
			</div>
		</div>

	</form>
	
</span>


<div class="row expanded">
	<div class="small-12 medium-11">
		<table data-form="deleteForm">
			<tr style ="border: 1px solid #ffffff !important;">
				<td style="border: 1px solid #ffffff !important; ">
					<form method="POST" action="/admin/users/<?php echo e($user->id); ?>/delete" class="delete-item">
						<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
						<button type="submit" class="button alert">Delete User</button>
					</form>
				</td>
			</tr>
		</table>
	</div>
</div>
</div>
<?php echo $__env->make('includes.delete-modal', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>