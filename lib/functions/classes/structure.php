<?php

class structure {

	function create_ini(){
		if(!file_exists('.htaccess')){
			
$content.= '
RewriteEngine on

RewriteRule ^(.*)/(.*)/(.*)/(.*)/(.*)/(.*)/(.*)/$ /?page=$1&sector=$2&section=$3&$4=$5&$6=$7 [L]
RewriteRule ^(.*)/(.*)/(.*)/(.*)/(.*)/$ /?page=$1&sector=$2&section=$3&$4=$5 [L]
RewriteRule ^(.*)/(.*)/(.*)/$ /?page=$1&sector=$2&section=$3 [L]
RewriteRule ^(.*)/(.*)/$ /?page=$1&sector=$2 [QSA,L]
RewriteRule ^(.*)/$ /?page=$1 [L]
		
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_URI} !(\.[a-zA-Z0-9]{1,5}|/)$

RewriteRule (.*)$ /$1/ [R=301,L]';
			
			$file = fopen('.htaccess', 'w');
			fwrite($file, $content);
			fclose($file);
			
		}
		//echo 'dammit!';
	}
	
	function create_robots(){
		
		if(!file_exists('robots.txt')){
			
			$content.= 'Sitemap: http://'.$_SERVER['HTTP_HOST'].'/sitemap/';
			
			$file = fopen('robots.txt', 'w');
			fwrite($file, $content);
			fclose($file);
			
		}
		//echo 'dammit!';
	}
	
	function create_sitemap(){
		
		if(!file_exists('sitemap.xml')){
			
			$content.= '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
		<loc>http://'.$_SERVER['HTTP_HOST'].'/</loc>
	</url>
</urlset>
';
			
			$file = fopen('sitemap.xml', 'w');
			fwrite($file, $content);
			fclose($file);
			
		}
		//echo 'dammit!';
	}

}

?>