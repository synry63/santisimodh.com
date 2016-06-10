<?php

class categories {
	
	function get($ID){
		
		$category[1] = 'Jovenes - Nacimiento  entre los años 1998 y 1997';
		$category[2] = 'Sub 23 - Nacimiento entre los años 1991 a 1994';
		$category[3] = 'Elite Doble - Nacimiento entre  los años  1984 a 1990';
		$category[4] = 'Master - Nacimiento entre 1983 y años anteriores';
		$category[5] = 'Damas - Open Infantil (12 a 14) previa aceptación de la organización';
		$category[6] = 'Rigidas - Requsito : Bicicleta sin suspensión trasera';
		$category[7] = 'Semi Pro - Nacimiento entre los años  1994 a 1983';
		$category[8] = 'Infantiles /Nacimiento desde 1999 en adelante con curriculum';
		$category[9] = 'Junior - Nacimiento entre los años 1995 y 1996';
		
		$c = $category[$ID];
		
		if($ID) $category = $c;
		
		return $category;
		
	}
	
}

?>