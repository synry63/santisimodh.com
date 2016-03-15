<?
if(isset($_GET['rss']) or resource::controller()=='rss') {
	
	$_SESSION['language'] = (isset($_GET['sp'])) ? $_GET['sp'] : $_SESSION['language'];
	
	header('Content-type: text/xml; charset="iso-8859-1"',true);
	
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	
	echo '<rss version="2.0">';
	
	echo '<channel>';

	include('pages/rss.php');
	
	echo "</channel>";

	echo "</rss>";  
	
	die;
}
?>