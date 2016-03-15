<?php

class templates_table {
	
	static public $number = 1;
	
	static function structure($th, $td, $trans, $total){
		
?>

<table>
	
	<? if ($th) {?>
	<tr>
		<? foreach ($th as $value) {
				
				$title = ($trans[$value]) ? $trans[$value] : $value ;
				
				if ($value == 'number'){
					
					if ($title != 'number') {
					
						$title = $total . ' ' . $title;
					
					} else {
						
						$title = $total;
						
					}
					
				}
		
		?>
		<th><a href="<?=resource::url(array('orderBy'=>$value))?>"><?=$title?></a></th>
		<? } ?>
	</tr>
	<? } ?>
	
	<? if ($td) {?>
	<? foreach ($td as $value) { ?>
	<tr>
		<? foreach ($th as $v) { ?>
		<td><?=self::td($value, $v)?></td>
		<? } ?>
	</tr>
	<? } ?>
	<? } ?>
	
</table>

<?php
		
	}
	
	static function td($value, $type) {
		
		$return = $value[$type];
		
		if ($type == 'edit'){
			
			$return = '<a href="?edit=' . $value['ID'] . '" class="button" >' . lang('Edit') . '</a>';
			
		}
		
		if ($type == 'number'){
			
			$return = self::$number++;
			
		}
		
		if ($type == 'language'){
			
			$return = lang::get($value[$type]);
			
		}
		
		if ($type == 'delete'){
			
			$return = '<a href="' . resource::url(array('delete'=>$value['ID'])) . '" class="button delete" data-alert="' . lang('Delete') . ': ' . $value['short'] . '?">' . lang('Delete') . '</a>';
			
		}
		
		if ($type == 'autor' or $type == 'code'){
			
			$return = users::get($return);
			$return = $return['name'] . ' ' . $return['last-name'];
			
		}
		
		if ($type == 'position'){
			
?>

<input name="position[<?=$value['position']?>]" value="<?=$value['ID']?>" type="hidden">
<a class="up"><img src="/images/bullet_arrow_up.png"></a>
<a class="down"><img src="/images/bullet_arrow_down.png"></a>

<?		
		}
		
		return $return;
		
	}
	
	public function search() {
		
		$form = new form();
		$dl = new templates_dl();
		
		echo $form->start(resource::url(), 'get');
		
			$content = $dl->dt('Search');
			$content.= $dl->dd($_GET['search'], 'search');
			
		echo $dl->structure($content);
		
		echo $form->input('submit-search', 'submit');
		
		echo $form->finish();
		
		
	}
	
}

?>