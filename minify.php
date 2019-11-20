<?php
/**
 * Library Name:       JCSS Meger and Minifier
 * Library URI:        https://reeteshghimire.com.np
 * Description:       Minify and Merge JavaScript and CSS Files
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ritesh Ghimire
 * Author URI:        https://reeteshghimire.com.np
 */

define('ENVIRONMENT','development'); //development or production
define('CSS_SAVE_PATH','assets/css/');
define('JS_SAVE_PATH','assets/js/');
define('CSS_DOMAIN','http://test.butterfly.worxpro/ritesh/minify/');
define('JS_DOMAIN','http://test.butterfly.worxpro/ritesh/minify/');



function minify($content) {
	$output = preg_replace(
			array(
		'/ {2,}/',
		'/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s'
			), array(
		' ',
		''
			), $content
	);
	return $output;
}

function loadCSS($files,$version,$filename="merged"){
	$content = '';
	foreach($files as $file){
		$content .= minify(file_get_contents($file));
	}
	if(ENVIRONMENT=='development'){
		file_put_contents(CSS_SAVE_PATH.$filename.$version.'.css', $content);
	}
	echo "<link rel='stylesheet' href='".CSS_DOMAIN."assets/css/".$filename.$version.".css'/>";
}

function loadJS($files,$version,$filename="merged"){
	$content = '';
	foreach($files as $file){
		$content .= minify(file_get_contents($file));
	}
	if(ENVIRONMENT=='development'){
		file_put_contents(JS_SAVE_PATH.$filename.$version.'.js', $content);
	}
	$src = JS_DOMAIN.'assets/js/'.$filename.$version.'.js';
	echo '<script type="text/javascript" src="'.$src.'"></script>';
}