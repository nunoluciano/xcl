<?php

include_once '../mainfile.php';
include_once './class/settingmanager.php';

$sm = new setting_manager();

$sm->readConstant();
$wizard->setContent( $sm->editform() );
$wizard->render();
