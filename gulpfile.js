var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

var gulp = require('gulp');

elixir(function(mix){
	// create app.scss in resouce/assets/css (in here its converted to "app.css")
	mix.sass('resources/assets/sass/app.scss', 'resources/assets/css');

	//combine css file
	mix.styles(
		[
			'css/app.css',
			'bower/vendor/slick-carousel/slick/slick.css'
		],'public/css/all.css', //output dir 
		'resources/assets'); // set base dir to resources/assets for mix.scripts
	var bowerPath = 'bower/vendor';
	mix.scripts(
		[
			//Jquery
			bowerPath +'/jquery/dist/jquery.min.js',

			//foundation js
			bowerPath + 'foundation-sites/dist/js/foundation.min.js',

			//other dependencies
			bowerPath + '/slick-carousel/slick/slick.min.js',
			bowerPath + '/chart.js/dist/Chart.bundle.js',
			bowerPath + '/axios/dist/axios.min.js',

			'js/acme.js',
			'js/admin/*.js',
			'js/pages/*.js',
			'js/init.js'

		],'public/js/all.js', //output dir
		'resources/assets'); // set base dir to resources/assets for mix.scripts


});