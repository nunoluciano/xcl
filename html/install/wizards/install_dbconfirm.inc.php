<?php

include_once './class/settingmanager.php';

$sm = new setting_manager( true );

$content = $sm->checkData();
if ( ! empty( $content ) ) {
	$wizard->setTitle( _INSTALL_L93 );
	$wizard->setContent( $content . $sm->editform() );
	$wizard->setNext( [ 'dbconfirm', _INSTALL_L91 ] );
} else {
	$wizard->setContent( $sm->confirmForm() );
}
$wizard->render();
