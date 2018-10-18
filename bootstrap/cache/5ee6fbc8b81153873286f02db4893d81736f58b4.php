<?php $__env->startSection('title', 'Categories'); ?>
<?php $__env->startSection('data-page-id', 'groupby'); ?>

<?php $__env->startSection('content'); ?>

<div class="home">

	<section>
		<div class="display-products" data-token="<?php echo e($token); ?>" id="root">
			<h2>All Categories</h2>

			<div class="grid-x grid-margin-x medium-up-2 large-up-4" data-equalizer data-equalize-on="medium" id="test-eq">
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="cell medium-4 small-12 large-3">
					<div class="card" data-equalizer-watch>
						<div class="card-section">
							<h2><?php echo e($category->name); ?></h2>
						</div>
						<div class="card-section">
							<?php $__currentLoopData = $subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($subCategory['category_id'] == $category->id): ?>
							
							<a href="/subcategory/<?php echo e($subCategory->id); ?>"><?php echo e($subCategory->name); ?></a>
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>