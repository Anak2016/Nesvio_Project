<!DOCTYPE html>
<html>
<head>
	<title>Nesvio Store - <?php echo $__env->yieldContent('title'); ?></title>
	<!-- root directory is at ecommerce/public-->
	<link rel ="stylesheet" href ="/css/all.css">
	
	
	<link rel="shortcut icon" href="#" />

	
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

	<script src="https://use.fontawesome.com/8145f993ac.js"></script>
	
	
</head>

<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">

	
	<?php echo $__env->yieldContent('body'); ?>


	<!-- javascript -->

	<script src="/js/all.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.0-rc.3/dist/js/foundation.min.js" integrity="sha256-l1HhyJ0nfWQPdwsVJLNq8HfZNb3i1R9M82YrqVPzoJ4= sha384-NH8utV74bU+noXiJDlEMZuBe34Bw/X66sw22frHkgIs8R1QKWc8ckxYB4DheLjH4 sha512-JMs3Y+JjY+DhwVOPeJhkLM/0FeK9ANxvuYiHGpGp7Q2kMlmNEN/2v6TkrXdirxqB3DHxPlQ8iMxvb/eSPCF5CA==" crossorigin="anonymous"></script>
	<script>
		$(document).foundation();
	</script>

	<?php echo $__env->yieldContent('stripe-checkout'); ?>
	
</body>
</html>