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
	$new_value = 2500 - $new_value;
	$col_G = $new_value * 0.17;
	$col_G = round($col_G);
	$col_R = 255;
    }
} else {
 $col_R = 255;
 $col_G = 0;
}

$this-> setProperty('color',"$col_R, $col_G, 0");

$ot=$this->object_title;
 $description = $this->description;
 if (!$description) {
  $description = $ot;
 }

$value=(float)$this->getProperty('value');
$minValue=(float)$this->getProperty('minValue');
$maxValue=(float)$this->getProperty('maxValue');
$is_normal=(int)$this->getProperty('normalValue');
$directionTimeout=(int)$this->getProperty('directionTimeout');
if (!$directionTimeout) {
 $directionTimeout=1*60*60;
}

if ($maxValue==0 && $minValue==0 && !$is_normal) {
 $this->setProperty('normalValue', 1);
} elseif (($value>$maxValue || $value<$minValue) && $is_normal) {
 $this->setProperty('normalValue', 0);
 if ($this->getProperty('notify')) {
  //out of range notify
  say(LANG_DEVICES_NOTIFY_OUTOFRANGE. ' ('.$description.' '.$value.')', 2);
 }
} elseif (($value<=$maxValue && $value>=$minValue) && !$is_normal) {
 $this->setProperty('normalValue', 1);
 if ($this->getProperty('notify')) {
  //back to normal notify
  say(LANG_DEVICES_NOTIFY_BACKTONORMAL. ' ('.$description.' '.$value.')', 2);
 }
}

$data1 = getHistoryValue($this->object_title.".value", time()-$directionTimeout);
 $direction = 0;
 if ($data1>$value) {
  $direction=-1;
 } elseif ($data1<$value) {
  $direction=1;
 }
 $currentDirection = $this->getProperty('direction');
 if ($currentDirection != $direction) {
  $this->setProperty('direction',$direction);
 }
