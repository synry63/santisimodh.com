<?php

$text = sql('SELECT lID,'.$_SESSION['pages-language'].' FROM lang WHERE langID="'.resource::action().'_PAGES" LIMIT 1');

?>

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript"> bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true, externalCSS : 'http://adbelem/css/style.css'}).panelInstance('content'); }); </script>

<textarea name="<?=$_SESSION['pages-language']?>" id="content" style="width:985px; height:400px;" ><?=$text[$_SESSION['pages-language']]?></textarea>

<input type="hidden" name="lID" value="<?=$text['lID']?>">

