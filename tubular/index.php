<?php
	$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 'BiKQ4lKT22E';
	$control = isset($_REQUEST['control']) ? $_REQUEST['control'] : 'true';
	$caption = isset($_REQUEST['caption']) ? $_REQUEST['caption'] : 'true';
	$pattern = isset($_REQUEST['pattern']) ? $_REQUEST['pattern'] : 1;
	$text	 = isset($_REQUEST['text']) ? $_REQUEST['text'] : '';
	$intro 	 = isset($_REQUEST['intro']) ? $_REQUEST['intro'] : 'false';
	$close 	 = isset($_REQUEST['close']) ? $_REQUEST['close'] : 'true';
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>T-Mobile Video</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link href="../skin/fullbox.css" rel="stylesheet" type="text/css" /> 

	<script type="text/javascript" src="../core/jquery-1.11.1.min.js"></script>

	<script type="text/javascript" charset="utf-8" src="../core/jquery.tubular.1.0.js"></script>
    <script type="text/javascript" charset="utf-8" src="../core/tubular.js"></script>

</head>
<body>
<div id="wrapper" class="clearfix" data-id="<?=$id;?>" data-control="<?=$control;?>" data-caption="<?=$caption;?>" data-pattern="<?=$pattern;?>"  data-intro="<?=$intro;?>" data-close="<?=$close;?>">
	<div id="main">
		 
		
	 <!--<a href="#" class="btn-close closefullbox"><img class="close" src="../skin/int/fullbox/btn_close.png" alt=""></a> -->
		
	 <p class='control'>
		 <a href="#" class="tubular-play"><img class="btn-pause" src="../skin/int/fullbox/btn_video_play.png" alt=""></a> 
		 
	     <a href="#" class="tubular-pause"><img class="btn-pause" src="../skin/int/fullbox/btn_video_pause.png" alt=""></a> 
	 </p>
	 <p class="sound" style="display:none">
	 	<a href="#" class="tubular-replay"></a> 
	     <a href="#" class="tubular-mute"><img class="btn-snd-on" src="../skin/int/fullbox/icon_sound-off.png" alt="">
	     <img class="btn-snd-off" src="../skin/int/icon_sound-on.png" alt=""></a>
	 </p>
	 <div class="pattern"></div>

	 <div class="box">
		<p><?=$text;?></p>
	</div>
		
	 
	</div>
</div><!-- #wrapper -->
<script>
	function muteVid() {
		$('.tubular-mute').trigger('click');
	}
	function replayVid() {
		$('.tubular-replay').trigger('click');
	}
</script>

</body>
</html>