<?php

$dictionary=array(
   'DEVICES_LINK_SENSOR_PASS_CO' => 'Пересылка данных о CO',
   'DEVICES_LINK_SENSOR_PASS_CO_DESCRIPTION' => 'Выставляет свойства в связанном объекте и посылает данные в HomeKit',
   'DEVISES_LINK_SENSOR_CO' => 'Датчик углекислого газа',
);

foreach ($dictionary as $k=>$v) {
 if (!defined('LANG_'.$k)) {
  define('LANG_'.$k, $v);
 }
}

?>
