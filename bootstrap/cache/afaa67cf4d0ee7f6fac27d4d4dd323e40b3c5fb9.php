<?php $categories = \App\Models\Category::with('subCategories')->get()?>

<header class="navigation ">

	<div class="hide-for-medium fixed">	
		<div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
			<button class="menu-icon float-right" type="button" data-toggle="main-menu"></button>
			<a href="/" class="float-left small-logo">Nesvio Product</a>
		</div>

		<div class="top-bar" id="main-menu">
			
			<div class="menu medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown" data-disable-hover="false">

				
				<div class="top-bar-title show-for-medium">
					<a href="/" class="logo">Nesvio Store</a>	
				</div>

				<div class="top-bar-left">
					<ul class="dropdown menu vertical medium-horizontal">
						<li><a href="#">Nesvio Products</a></li>
							<?php if(count($categories)): ?>
								<li>
									<a href="/categories">Categories</a>
									<ul class='menu vertical sub dropdown' style="list-style: none;">
										<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li>
												<a href="#"><?php echo e($category->name); ?></a>
												<?php if(count($category->subCategories)): ?>
													<ul class="menu sub vertical" style="list-style: none;">
														<?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<li>
																
																
																	<a href="/subcategory/<?php echo e($subCategory->id); ?>"></a>
																	<?php echo e($subCategory->name); ?>

																</a>
															</li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												<?php endif; ?>
											</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</li>
							<?php endif; ?>
							
					</ul>
				</div>
				<div class="top-bar-right">
					<ul class="dropdown menu vertical medium-horizontal">
						<?php if(isAuthenticated()): ?>
							<li><a href="#"><?php echo e(user()->username); ?></a></li>
							<li>
								<a href="/cart">
									Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</a>
							<li>
							<li><a href="#">Orders</a></li>
							<li><a href="/logout">Logout</a><li>
						<?php else: ?>
							<li><a href="/login">Sign In</a></li>
							<li><a href="/register">Register</a><li>
							<li>
								<a href="/cart">
									Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</a>
							<li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="show-for-medium fixed">
		<div class="top-bar" id="example-menu">
		
		<div class="menu medium-horizontal expanded medium-text-center" data-responsive-menu="drilldown medium-dropdown" data-disable-hover="false">

			
			<div class="top-bar-title show-for-medium">
				<a href="/" class="logo">Ei-Shop</a>
			</div>

			<div class="top-bar-left">
				<ul class="dropdown menu vertical medium-horizontal">
					<li>Products</li>
					<?php if(count($categories)): ?>
						<li>
							<a href="/categories">Categories</a>
							<ul class='menu vertical sub dropdown' style="list-style: none;">
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<a href="/category/<?php echo e($category->id); ?>"><?php echo e($category->name); ?></a>
										<?php if(count($category->subCategories)): ?>
											<ul class="menu sub vertical" style="list-style: none;">
												<?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li>
														<a href="/subcategory/<?php echo e($subCategory->id); ?>">
															<?php echo e($subCategory->name); ?>

														</a>
													</li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										<?php endif; ?>
									</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
					<?php endif; ?>
				</ul>
			</div>
			<div class="top-bar-right">
				<ul class="dropdown menu vertical medium-horizontal">
					<?php if(isAuthenticated()): ?>
						<li><a href="#"><?php echo e(user()->username); ?></a></li>
						<li>
							<a href="/cart">
								Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						<li>
						<li><a href="#">Orders</a></li>
						<li><a href="/logout">Logout</a><li>
					<?php else: ?>
						<li><a href="/login">Sign In</a></li>
						<li><a href="/register">Register</a><li>
						<li>
							<a href="/cart">
								Cart &nbsp; <i class="fa fa-shopping-cart" aria-hidden="true"></i>
							</a>
						<li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	</div>
</header>