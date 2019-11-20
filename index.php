<?php
include('minify.php');
//load version 1.1 css
loadCSS(
	array(
		'assets/css/style.css',
		'assets/css/slider.css',
		'assets/css/gallery.css'
	),'1.1'
);

?>


<h1>This is H1</h1>
<h2>This is H2</h2>
<h3>This is H3</h3>


<?php
loadJS(
	array(
		'assets/js/style.js',
		'assets/js/slider.js',
		'assets/js/gallery.js'
	),'1.1'
);
?>