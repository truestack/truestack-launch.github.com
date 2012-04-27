<?php 
/**
 * Functions: designer-functions.php
 *
 * Functions to format get_option values in different ways
 * e.g. echo, image, Google webfont, color calculation... etc.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
 
// GET OPTIONS FUNCTIONS

// echo, with default value
function le($opname) {
	if(get_option($opname) != '') { 
		echo nl2br(get_option($opname)); 
	}
}

// return
function ler($opname) {
	if(get_option($opname) != '') { 
		return get_option($opname); 
	}
}

// images: checks if the image is disabled, checks if the image is blank
function leimg($opname, $opdisable, $optionspanel_name) {
	if(get_option($optionspanel_name)) {
		$options = get_option($optionspanel_name); 
		if($options[$opname]) {
			if(get_option($opdisable) != true) { 
				return $options[$opname];
			}
		}
 	}
}

// google webfonts for CSS: strips the colon
function legogl($opname, $default) {
	if(get_option($opname) != '') { 
		$str = get_option($opname);
		$pos = strpos($str,':'); 
		if($pos === false) { 	
			echo $str; 
		} else { 
			echo substr($str, 0, strpos($str, ':'));
		}  
	} else { 
		echo ler($default); 
	}
}

// font weight 
function lewt($opname) {
	if(get_option($opname) == 'bold' || get_option($opname) == 'bold italic') {
		echo 'bold';
	} else {
		echo 'normal';
	}
}

// font style 
function lestyle($opname) {
	if(get_option($opname) == 'italic' || get_option($opname) == 'bold italic') {
		echo 'italic';
	} else {
		echo 'normal';
	}
}


// calculates a darker color
function darker($opname) {
	
	$color = ler($opname);

	if(preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts)) {
	
		$array = array();
		
		for($i = 1; $i <= 3; $i++) {
		  $parts[$i] = round(hexdec($parts[$i]) * 0.85);
		  $parts[$i] = dechex($parts[$i]);
  
		  if(($parts[$i]) == '0') {
		  	$parts[$i] = str_pad($parts[$i], 2, "0", STR_PAD_LEFT);
		  }  
		  array_push($array, $parts[$i]);
		}
		
		$newcolor = implode('',$array);
		return $newcolor;
	
	}

}

// calculates a darker color (version 2)
function darker2($opname) {
	
	$color = ler($opname);

	if(preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts)) {
	
		$array = array();
		
		for($i = 1; $i <= 3; $i++) {
		  $parts[$i] = round(hexdec($parts[$i]) * 0.70);
		  $parts[$i] = dechex($parts[$i]);
  
		  if(($parts[$i]) == '0') {
		  	$parts[$i] = str_pad($parts[$i], 2, "0", STR_PAD_LEFT);
		  }  
		  array_push($array, $parts[$i]);
		}
		
		$newcolor = implode('',$array);
		return $newcolor;
	
	}

}

// calculates a lighter color
function lighter($opname) {

	$color = ler($opname);

	if(preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts)) {
	
		$array = array();
		
		for($i = 1; $i <= 3; $i++) {
			$parts[$i] = hexdec($parts[$i]);
			
			if($parts[$i] < 16) {
					$parts[$i] = 70;
				} else {
					$parts[$i] = round($parts[$i]*1.2);
			}
			
			if($parts[$i] > 255) {
				$parts[$i] = 255;
			}

			$parts[$i] = dechex($parts[$i]);
			if(($parts[$i]) == '0') {
				$parts[$i] = str_pad($parts[$i], 2, "9", STR_PAD_LEFT);
			}
			
			array_push($array, $parts[$i]);
		}
		
		$newcolor = implode('',$array);
		return $newcolor;
	
	}
}


// calculates whether something should be black or white depending on the background brightness

function blacknwhite($opname) {

	$color = ler($opname);

	if(preg_match('/^#?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i', $color, $parts)) {
	
		$array = array();
		
		for($i = 1; $i <= 3; $i++) {
		  $parts[$i] = hexdec($parts[$i]);
		  
		  array_push($array, $parts[$i]);
		}
		
		$grayscale = round(($parts[1] + $parts[2] + $parts[3])/3);

		
		if($grayscale < 125) {
			$grayscale = 'FFFFFF';
		} else {
			$grayscale = '222222';
		}

		return $grayscale;
	
	}

}

?>