<?php

include './language/' . $language . '/welcome.php'; //This will set message to $content;

$error = false;
if ( substr( PHP_VERSION, 0, 1 ) < 5 ) {
	$error = true;
}
if ( ! $error ) {
	$wizard->assign( 'welcome', $content );
} else {
	$wizard->assign( 'message', _INSTALL_L168 );
	$wizard->setReload( true );
}

$wizard->render( 'install_start.tpl.php' );
