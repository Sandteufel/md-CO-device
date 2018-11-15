<?php

$this->device_types['sensor_CO'] = array(
    'TITLE'=>"датчик углекислого газа",
    'PARENT_CLASS'=>'SSensors',
    'CLASS'=>'SCOSensors',
    'METHODS'=>array(
        'valueUpdated'=>array('DESCRIPTION'=>'Value Updated','CALL_PARENT'=>1), 
    ));


@include_once(ROOT.'languages/SCOSensors_'.SETTINGS_SITE_LANGUAGE.'.php');
@include_once(ROOT.'languages/SCOSensors_default'.'.php');
