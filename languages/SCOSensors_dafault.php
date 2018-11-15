<?php

$dictionary=array(
   'DEVICES_LINK_SENSOR_PASS_CO' => 'Sensor data pass from CO',
   'DEVICES_LINK_SENSOR_PASS_CO_DESCRIPTION' => 'Pass sensor\'s value to another device and to HomeKit',
   'DEVICES_LINK_SENSOR_CO' => 'CO sensor',
);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>
