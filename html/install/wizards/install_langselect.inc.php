<?php

if ( ! defined( '_INSTALL_L128' ) ) {
	define( '_INSTALL_L128', 'Select a language for the installation process' );
}

$langarr = getDirList( './language/' );
$php54   = ( version_compare( PHP_VERSION, '5.5.0' ) >= 0 );
foreach ( $langarr as $lang ) {
	if ( $php54 && 'english' !== $lang && '_utf8' !== substr( $lang, - 5 ) ) {
		continue;
	}
	$wizard->addArray( 'languages', $lang );
	if ( strtolower( $lang ) === $language ) {
		$wizard->addArray( 'selected', 'selected="selected"' );
	} else {
		$wizard->addArray( 'selected', '' );
	}
}
$wizard->render( 'install_langselect.tpl.php' );
