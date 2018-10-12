<!DOCTYPE html>
<html>
<head>
	<title>Nesvio Store - @yield('title')</title>
	<!-- root directory is at ecommerce/public-->
	<link rel ="stylesheet" href ="/css/all.css">
	{{-- add below link to remove the GET http://localhost/favicon.ico 500 (Internal Server Error) --}}
	{{-- the link below should only be used in development environment. it must be removed in the production environment --}}
	<link rel="shortcut icon" href="#" />

	{{-- developement version --}}
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

	<script src="https://use.fontawesome.com/8145f993ac.js"></script>
	{{-- production version --}}
	{{-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
</head>
{{-- javascript edit code is added acoording to data-page-id  --}}
<body data-page-id="@yield('data-page-id')">

	
	@yield('body')


	<!-- javascript -->

	<script src="/js/all.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.0-rc.3/dist/js/foundation.min.js" integrity="sha256-l1HhyJ0nfWQPdwsVJLNq8HfZNb3i1R9M82YrqVPzoJ4= sha384-NH8utV74bU+noXiJDlEMZuBe34Bw/X66sw22frHkgIs8R1QKWc8ckxYB4DheLjH4 sha512-JMs3Y+JjY+DhwVOPeJhkLM/0FeK9ANxvuYiHGpGp7Q2kMlmNEN/2v6TkrXdirxqB3DHxPlQ8iMxvb/eSPCF5CA==" crossorigin="anonymous"></script>
	<script>
		$(document).foundation();
	</script>

	@yield('stripe-checkout')
	
</body>
</html>