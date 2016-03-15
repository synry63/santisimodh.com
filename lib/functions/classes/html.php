<?php
class html{
	
	function catalog_selector_chain($category){
		
		//print_r($category);
		//echo $category['category'];
	
		if($category!=''){
		
			$chain 	= sql('SELECT * FROM catalog_category WHERE ID="'.$category.'" LIMIT 1');
			$chain 	= sql('SELECT * FROM catalog_category WHERE ID="'.$chain['category'].'" LIMIT 1');
			echo $this->catalog_selector_chain($chain['category']);
			echo '<option class="out" value="/?resourse=catalog_selecter&sector='.$chain['ID'].'">'.$chain['name'].'</option>';
		}
	
	}
	
	function catalog_selector($position=FALSE){
		echo $position;
		$position = ($position and $position==='') ? TRUE : $position;
		$position = ($position) ? $position : resource::action();
		$categories = sql('SELECT * FROM catalog_category WHERE category="'.$position.'"');
		$category = sql('SELECT * FROM catalog_category WHERE ID="'.$position.'" LIMIT 1');
		$none = ($category['name']=='') ? lang('Main Category') : $category['name'];
		
		//echo $category['ID'];	
		?>
		<span id="select">
		<select name="category"
				onChange="getPage(this.value,'select');
        					document.getElementById('category').innerHTML=this.title">
      <? //$this->catalog_selector_chain($category['ID']); ?>
      <option value="/?resourse=catalog_selecter">Catalog</option>
      <option selected="selected" value="<?=$category['ID']?>"><?=$none?></option>
  		<optgroup>
		<? foreach($categories as $key=>$value){ ?>
       <option value="/?resourse=catalog_selecter&sector=<?=$value['ID']?>"
               title="<?=$value['name']?>"
       >
        <?=$value['name']?>
       </option>
		<? } ?>
			</optgroup>
		</select>
		</span>
<?
	}
	
	static public function paginator($total, $number='10', $get = 'page', $show=FALSE){
		
		if($_POST){
			$_SESSION['paginator'] = $_POST;
		}
		if($_SESSION['paginator']){
			$return['post'] = $_SESSION['paginator'];
		}
		
		if($total>$number){
		
			if(!isset($_GET[$get])){ $_GET[$get] = 1; }
			
			$max = floor($total/$number);
			$max = ($max == 1) ? 2 : $max ;
			
			$li = range(1,$max);
			
			$m1 = $_GET[$get]-(floor($show/2));
			$m1 = ($m1<1) ? 1 : $m1 ;
			$m2 = $_GET[$get]-(floor($show/2))+$show;
			$m2 = ($m2>$max) ? $max : $m2 ;
			
			$li = ($show) ? range($m1,$m2) : $li ;
			
			$sql['max'] = $_GET[$get]*$number;
			$sql['min'] = ($_GET[$get]*$number)-$number;
			
			$html.= '<ul class="paginator">';
			
			//$html.= '<li>'.$_GET[$get].' -> '.$max.'</li>';
			if (resource::check($get)) {
				
				// FOR RELATION WITH /g1/g2/
			
				$html.= ($_GET[$get] == 1) ? '' : '<li><a href="/'. resource::controller(). '/1/" >I<</a></li>' ;

				$html.= ($_GET[$get] == 1 or $_GET[$get] == 2) ? '' : '<li><a href="/'.resource::controller().'/'.($_GET[$get]-1).'/" ><</a></li>';

				foreach($li as $key){

					$active = ($key == $_GET[$get]) ? ' class = "active" ' : FALSE ;
					$html.= '<li'.$active.'><a href="/'.resource::controller().'/'.$key.'/" >'.$key.'</a></li>';

				}

				$html.= ($_GET[$get] == $max or $_GET[$get] == $max-1) ? '' : '<li><a href="/'.resource::controller().'/'. ($_GET[$get]+1) .'/" >></a></li>';

				$html.= ($_GET[$get] == $max) ? '' : '<li><a href="/' . resource::controller() . '/'.$max.'/" >>I</a></li>';

			} else {
				
				$html.= ($_GET[$get] == 1) ? '' : '<li><a href="' . resource::url(array($get=>1)) . '=1" >I<</a></li>' ;

				$html.= ($_GET[$get] == 1 or $_GET[$get] == 2) ? '' : '<li><a href="' . resource::url(array($get=>$_GET[$get]-1)) . '" ><</a></li>';

				foreach($li as $key){

					$active = ($key == $_GET[$get]) ? ' class = "active" ' : FALSE ;
					$html.= '<li'.$active.'><a href="' . resource::url(array($get=>$key)) . '" >'.$key.'</a></li>';

				}

				$html.= ($_GET[$get] == $max or $_GET[$get] == $max-1) ? '' : '<li><a href="' . resource::url(array($get=>$_GET[$get]+1)) .'" >></a></li>';

				$html.= ($_GET[$get] == $max) ? '' : '<li><a href="' . resource::url(array($get=>$max)) . '" >>I</a></li>';
				
			}

			$html.= '</ul>';
		
			$return['html'] = $html;
			$return['sql']	= 'LIMIT 0' . $sql['min'] . ',0' . $number;
			
			return $return;
		
		}
		
	}
}
?>