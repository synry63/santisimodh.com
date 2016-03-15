<?
$at = array('@'=>'[at]');


if(isset($_POST['submitBook'])){
	
	$form = TRUE;
	
	if($_POST['name']==''){
		$form = FALSE;
		echo '<div class="info">'.lang('You forgot to write your name').'</div>';
	}
	if(($_POST['showed']=='1' or $_POST['allow']=='1') and $_POST['email']=='') {
		$form = FALSE;
		echo '<div class="info">'.lang('You forgot to write email').'</div>';
	}
	
	if($_POST['text']==''){
		$form = FALSE;
		echo '<div class="info">'.lang('You forgot to write something').'</div>';
	}
	

	if($form==TRUE){
		$_POST['sp'] = $_SESSION['language'];
		sql_insert('guestBook');
		echo '<div class="info">'.lang('Thanks for signing our guestbook').'</div>';
	}
}

global $guestBookShowDate;



include('guestBookForm.php');

$sql='SELECT *, DATE_FORMAT(date, "%d/%m/%Y") as dat FROM guestBook WHERE status="1" AND sp="'.$_SESSION['language'].'" ORDER BY date DESC';
$result=mysql_query($sql,$link);
while($row = mysql_fetch_array($result)){
	$email = ($row['showed']==1) ? '('.strtr($row['email'],$at).')' : '';
?>
<hr />
<div>
	<div>
 		<strong><?=$row['name']?></strong> <?=$email?>
  </div>
  <div>
  	<?=nl2br($row['text'])?><br />
    <?=$row['dat']?>
  </div>
</div>
<?
}
?>