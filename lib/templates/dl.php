<?php

class templates_dl {
	
	public function structure($content){
		
		ob_start();
		
?>

<dl>
	<?=$content?>
</dl>

<?php
		
		return ob_get_clean();
		
	}
	
	public function dt($title) {
		
		ob_start();
		
?>

		<dt><?=$title?></dt>

<?php
		
		return ob_get_clean();

	}
	
	public function dd($field, $type, $table) {
		
		$template = new templates_form();

		ob_start();
		
?>

		<dd><?=$template->input($field, $type, $table)?></dd>

<?php
		
		return ob_get_clean();
		
	}
	
}

?>
