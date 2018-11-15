<?php
if (!isset($params['NEW_VALUE'])) {
    $new_value=(float)$this->getProperty('value');
} else {
    $new_value=(float)$params['NEW_VALUE'];
}

if ($new_value < 2500){
    if ($new_value < 1000) {
	$col_R = $new_value*0.255;
	$col_G = 255;
	$col_R = round($col_R);
    } else {
	$CO_B = 2500 - $new_value;
	$col_G = $new_value * 0.17;
	$col_G = round($col_G);
	$col_R = 255;
    } 
} else {
 $col_R = 255;
 $col_G = 0;
}

$this-> setProperty('color',"$col_R, $col_G, 0");
