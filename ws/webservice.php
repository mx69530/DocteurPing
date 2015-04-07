<?php
/*
 * ASCII Art Generator (Black and white)
 * Creation Date: May 8th, 2012 
 */

// specify new pixel size, filename, and create the gd source image for parsing 
$pixel_size = 5; 
$filename = "../img/".strtolower($_GET["name"]).".jpg"; 
if(!file_exist($filename)){
	die("Image non trouvée");
}
$source = imagecreatefromjpeg($filename);   
// specify the characters to use 
// store in array so we can easily choose from them (leftmost character is darkest, unless you want it inverted) 
$char_sets = array("#%xo~-. ","#. ","01","abcdefghijklmnopqrstuvwxyz","1234567890"); 
$char_id = 0; 
// the id of char_sets from above to use   
// calculate the steps between character / lightness changes (765 = 255(Red) + 255(Green) + 255(Blue)) 
$step_amount = 765 / strlen($char_sets[$char_id]); 
$steps = array(); 
for($i=0; $i<=strlen($char_sets[$char_id]); $i++) 
{ 
	$steps[$i] = $low+($i*$step_amount); 
}   
// get sizes, so we know how many pixels to parse through 
$source_size = getimagesize($filename); 
$w = $source_size[0]; 
$h = $source_size[1]; 
$im = imagecreatetruecolor($w, $h);   
// loop through x and y coords of the image, and concat the ascii to output 
$ascii_output = ""; 
for($y=0; $y<$h; $y+=$pixel_size) 
{ 
	for($x=0; $x<$w; $x+=$pixel_size) 
	{ 
		// grab the color found at the x-y location 
		$rgb = imagecolorat($source, $x, $y); 
		$colors = imagecolorsforindex($source, $rgb); 
		$color = str_pad(dechex($colors["red"]),2,"0").str_pad(dechex($colors["green"]),2,"0").str_pad(dechex($colors["blue"]),2,"0");   
		// get the total color count, a quick and dirty way to guess the lightness and darkness of a pixel 
		$color_ct = $colors["red"] + $colors["green"] + $colors["blue"];   
		// decide which character to use for color 
		for($i=0; $i<count($steps); $i++) 
		{ 
			if($color_ct <= $steps[$i+1]) 
			{ 
				$char = substr($char_sets[$char_id],$i,1); 
				break; 
			} 
		}   
		// build the html spans - adjust the line-height and letter-spacing to somewhat match the proportions of the original image 
		$ascii_output .= "<span style=\"line-height:10px;letter-spacing:2px;font-weight:bold;font-family:monospace;white-space: pre-wrap;\">".$char."</span>"; 
	}   
	// append a line break at the end of each row 
	$ascii_output .= "<br />"; 
}   
// out the original image and the generated ascii 
echo "<img src=\"$filename\" /><br />"; 
echo $ascii_output;
?>
