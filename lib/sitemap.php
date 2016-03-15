<?php

if(resource::controller()=='sitemap') {
	
	$url = sql('SELECT * FROM sitemap WHERE url = "'.$_SERVER['HTTP_HOST'].'" AND language = "'.$_SESSION['language'].'" AND query != "/" AND query != "structure/" ORDER BY query ASC');
	
	header('Content-type: text/xml; charset="iso-8859-1"',true);
	
	echo '<?xml version="1.0" encoding="UTF-8"?>';

?>

  <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
      <loc>http://<?=$_SERVER['HTTP_HOST']?>/</loc>
    </url>
    <? foreach($sitemap as $key => $value) { ?>
    <url>
      <loc>http://<?=$value?>/</loc>
    </url>
    <? } ?>
    <? foreach($url as $key => $value){ ?>
    <url>
      <loc>http://<?=$_SERVER['HTTP_HOST']?>/<?=$value['query']?></loc>
    </url>
    <? } ?>
  </urlset>

<?
	
	die;
}

sitemap::register();

?>