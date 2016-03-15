<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
<?
	set_time_limit(3600);
?>
<div style="margin:5px;">
<form action="?<?=$alink?>" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    	<?
					$logo=conf('logo');
			?>
   	<img src="<?=$imagesFolder?><?=$logo?>" width="200px" /><br />
		<div style="color:#F00; width:100%; font-size:16px; margin-left:5px;">
    	www.<?=$_SERVER['HTTP_HOST']?>
    </div>
    <div style="color:#666; width:100%; font-weight:600; margin-left:5px;">
		<?
			echo lang('Newsletter').' '.writeMonth(date("m")).' '.date("Y");
		?>
    </div>
    </td>
    <td align="right">
    <?
    	$sql2='SELECT * FROM images WHERE position="newsletter"';
			$result2=mysql_query($sql2,$link);
			while($row2 = mysql_fetch_array($result2)) {
				$imgNL = $row2['img'];
			}
		if($imgNL=="") { ?>
    <?=lang('Upload image')?> 400x150<?=lang('Recommended')?>
		<input name="IMG" type="file" class="boletin" /><input name="saveIMG" type="submit" class="boletin" value="<?=lang('Upload')?>"/>
		<? } else {
		?>
			<img src="images/<?=$imgNL?>" width="380px" height="135px" />
      <input name="img" type="hidden" value="<?=$imgNL?>" />
      <input name="delIMG" type="submit" class="boletin" value="<?=lang('Delete')?> <?=lang('image')?>" style="position:absolute; right:380px; background-color:#FFF; margin-top:2px;"/>
    <? } ?>
			<br /><?=lang('Title')?> <?=doSimpleForm($newsletterTitle,'title','boletin',35)?>
      <select name="sp" class="boletin">
      <? $sql='SELECT pageLang,pageLangTitle FROM page';
				 $result=mysql_query($sql,$link);
				 while($row = mysql_fetch_array($result)) {
				 if($newsletterSP==$row['pageLang']){ $select='selected="selected"'; } else { $select=''; }
				?>
			  <option value="<?=$row['pageLang']?>" <?=$select?>><?=$row['pageLangTitle']?></option>
      <? } ?>
			</select>
     </td>
  </tr>
</table>
<hr color="#025541" size="4px" />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">
      
      <div style="color:#000;" align="left" >
        <textarea name="content" id="content" cols="74" rows="15" class="boletin"><?=$newsletterContent?></textarea>
      </div><br />
    </td>
  </tr>
  <tr>
    <td align="right" valign="top">
      <input name="by" type="hidden" value="<?=$_SESSION['sessionUser']	?>" />
      <input name="email" type="hidden" value="<?=$_SESSION['sessionUser']?>" />
      <input name="preview" type="submit" class="boletin" value="<?=lang('Preview')?>"/>
      <input name="delNews" type="submit" class="boletin" value="<?=lang('Delete')?>"/>
      <input name="saveNews" type="submit" class="boletin" value="<?=lang('Save')?>"/>
      <input name="sendNews" type="submit" class="boletin" value="<?=lang('Send')?>"/>
    </td>
  </tr>
  </table>
</form>
</div>