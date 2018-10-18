<?php $__env->startSection('title', 'Create User'); ?>
<?php $__env->startSection('data-page-id', 'adminUser'); ?>

<?php $__env->startSection('content'); ?>

<div class="auth"  id="auth" >
	<section class="register_form">
		<div class="grid-x align-center">
			<div class="small-12 medium-7 medium-centered">
				<h2 class="text-center">Create Account</h2>
				<?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

				<form action="/admin/users/create" method="post">

					<input type="text" name="fullname" placeholder="Fullname"
					value="<?php echo e(\App\Classes\Request::old('post', 'fullname')); ?>">

					<input type="text" name="email" placeholder="Email Address"
					value="<?php echo e(\App\Classes\Request::old('post', 'email')); ?>">

					<input type="text" name="username" placeholder="Username"
					value="<?php echo e(\App\Classes\Request::old('post', 'username')); ?>">

					<input type="text" name="password" placeholder="Password"
					value="<?php echo e(\App\Classes\Request::old('post', 'password')); ?>">

					<div class="small-12 medium-6 cell">
						<label>Role:
							<select name="role">
								<option value="" selected>You haven't selected</option>
								<option value="user">user</option>
								<option value="admin">admin</option>
							</select>
						</label>
					</div>

					<textarea name="address" placeholder="Your Address"><?php echo e(\App\Classes\Request::old('post', 'address')); ?></textarea>
					<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
					<button class="button float-center">Register User</button>
				</form>

			</div>
		</div>
	</section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>