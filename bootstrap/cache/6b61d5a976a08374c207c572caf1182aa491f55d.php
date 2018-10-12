<?php $__env->startSection('body'); ?>





	<div clas="site_wrapper">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
<?php echo $__env->yieldContent('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>