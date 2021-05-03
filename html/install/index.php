<?php
/**
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Kilica (Legacy)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

/*------------------------------------------------------------------------*
 |  This file was entirely rewritten by the XOOPS Cube Legacy Project     |
 *------------------------------------------------------------------------*/

ini_set( 'display_errors', 1 );
if ( PHP_VERSION_ID >= 50500 ) {
	error_reporting( error_reporting() ^ E_STRICT );
}
if ( PHP_VERSION_ID >= 60000 ) {
	error_reporting( error_reporting() ^ E_DEPRECATED );
}

include_once './passwd.php';
if ( INSTALL_USER !== '' || INSTALL_PASSWD !== '' ) {
	if ( ! isset( $_SERVER['PHP_AUTH_USER'] ) ) {
		header( 'WWW-Authenticate: Basic realm="XOOPS Cube Installer"' );
		header( 'HTTP/1.0 401 Unauthorized' );
		echo 'You can not access this XOOPS Cube installer.';
		exit;
	} else {
		if ( INSTALL_USER !== '' && INSTALL_USER != $_SERVER['PHP_AUTH_USER'] ) {
			header( 'HTTP/1.0 401 Unauthorized' );
			echo 'You can not access this XOOPS Cube installer.';
			exit;
		}
		if ( INSTALL_PASSWD !== $_SERVER['PHP_AUTH_PW'] ) {
			header( 'HTTP/1.0 401 Unauthorized' );
			echo 'You can not access this XOOPS Cube installer.';
			exit;
		}
	}
}

include_once './class/textsanitizer.php';
$myts = TextSanitizer::getInstance();

if ( isset( $_POST ) ) {
	foreach ( $_POST as $k => $v ) {
		$$k = $myts->stripSlashesGPC( $v );
	}
}

include_once './include/functions.php';

$language = getLanguage();
include_once './language/' . $language . '/install.php';
include_once '../language/' . $language . '/timezone.php';
define( '_OKIMG', '<img src="img/yes.svg" border="0" alt="OK" /> ' );
define( '_NGIMG', '<img src="img/no.svg" border="0" alt="NG" /> ' );

include_once './class/simplewizard.php';
$wizard = new SimpleWizard();
$wizard->setBaseTemplate( './install_tpl.php' );
$wizard->setTemplatePath( './templates' );

$wizardSeq = new SimpleWizardSequence();

$wizardSeq->add( 'langselect', _INSTALL_L0, 'start', _INSTALL_L80 );
$wizardSeq->add( 'start', _INSTALL_L0, 'modcheck', _INSTALL_L81 );
$wizardSeq->add( 'modcheck', _INSTALL_L82, 'dbform', _INSTALL_L89 );
$wizardSeq->add( 'dbform', _INSTALL_L90, 'dbconfirm', _INSTALL_L91 );
$wizardSeq->add( 'dbconfirm', _INSTALL_L53, 'dbsave', _INSTALL_L92, '', _INSTALL_L93 );
$wizardSeq->add( 'dbsave', _INSTALL_L92, 'modcheck_trust', _INSTALL_L166 );
$wizardSeq->add( 'modcheck_trust', _INSTALL_L167, 'mainfile', _INSTALL_L94 );
$wizardSeq->add( 'mainfile', _INSTALL_L94, 'initial', _INSTALL_L102, 'start', _INSTALL_L103, true );
$wizardSeq->add( 'initial', _INSTALL_L102, 'checkDB', _INSTALL_L104, 'start', _INSTALL_L103, true );
$wizardSeq->add( 'checkDB', _INSTALL_L104, 'createDB', _INSTALL_L105, 'start', _INSTALL_L103, true );
$wizardSeq->add( 'createDB', _INSTALL_L105, 'checkDB', _INSTALL_L104 );
$wizardSeq->add( 'createTables', _INSTALL_L40, 'siteInit', _INSTALL_L112 );
$wizardSeq->add( 'siteInit', _INSTALL_L112, 'insertData', _INSTALL_L116 );
$wizardSeq->add( 'insertData', _INSTALL_L116, 'finish', _INSTALL_L117 );
$wizardSeq->add( 'finish', _INSTALL_L32, 'nextStep', _INSTALL_L210 );

if ( file_exists( './custom/custom.inc.php' ) ) {
	include './custom/custom.inc.php';
}

// options for mainfile.php
$xoopsOption['nocommon'] = true;
define( 'XOOPS_INSTALL', 1 );

if ( ! empty( $_POST['op'] ) ) {
	$op = $_POST['op'];
} elseif ( ! empty( $_GET['op'] ) ) {
	$op = $_GET['op'];
} else {
	$op = 'langselect';
}
$wizard->setOp( $op );

$op           = basename( $op );
$fname        = './wizards/install_' . $op . '.inc.php';
$custom_fname = './custom/install_' . $op . '.inc.php';
if ( file_exists( $fname ) ) {
	include $fname;
} elseif ( file_exists( $custom_fname ) ) {
	include $custom_fname;
} else {
	$wizard->render();
}
