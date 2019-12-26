<?php

$db =& Database::getInstance() ;

// beggining of Output
xoops_cp_header();
include dirname(__FILE__).'/mymenu.php' ;

// open table for ADVISORY
echo "<div class='ui-card-main'>\n" ;

// calculate the relative path between XOOPS_ROOT_PATH and XOOPS_TRUST_PATH
$root_paths = explode('/', XOOPS_ROOT_PATH) ;
$trust_paths = explode('/', XOOPS_TRUST_PATH) ;
foreach ($root_paths as $i => $rpath) {
    if ($rpath != $trust_paths[ $i ]) {
        break ;
    }
}
$relative_path = str_repeat('../', count($root_paths) - $i) . implode('/', array_slice($trust_paths, $i)) ;

// the path of XOOPS_TRUST_PATH accessible check
echo '<h3>XOOPS_TRUST_PATH</h3>';
echo "<p>Public check [ image ] : <img src='".XOOPS_URL.'/'.htmlspecialchars($relative_path)."/modules/protector/public_check.png' width='40' height='20' alt='' style='border:1px solid black;'></p>" ;
echo "<p>Public check [ link ] : <a href='".XOOPS_URL.'/'.htmlspecialchars($relative_path)."/modules/protector/public_check.php'>"._AM_ADV_TRUSTPATHPUBLICLINK."</a></p>\n" ;
echo '<p>' . _AM_ADV_TRUSTPATHPUBLIC . '</p>';

// register_globals
echo '<h3>register_globals</h3>';
$safe = ! ini_get('register_globals') ;
if ($safe) {
    echo "<p>[ off ] &nbsp; <span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
} else {
    echo "<p>[ on ]  &nbsp; <span style='color:red;font-weight:bold;'>"._AM_ADV_NOTSECURE."</span></p>\n" ;
    echo '<p>' . _AM_ADV_REGISTERGLOBALS . '</p>
		  <p>' . XOOPS_ROOT_PATH . '/.htaccess</p>
		  <p><b>php_flag &nbsp; register_globals &nbsp; off</b></p>';
}



// allow_url_fopen
echo '<h3>allow_url_fopen</h3>';
$safe = ! ini_get('allow_url_fopen') ;
if ($safe) {
    echo "<p>[ off ] &nbsp; <span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
} else {
    echo "<p>[ on ] &nbsp; <span style='color:red;font-weight:bold;'>"._AM_ADV_NOTSECURE."</span></p>\n" ;
    echo '<p>' . _AM_ADV_ALLOWURLFOPEN . '</p>';
}



// session.use_trans_sid
echo '<h3>session.use_trans_sid</h3>';
$safe = ! ini_get('session.use_trans_sid') ;
if ($safe) {
    echo "<p>[ off ] &nbsp; <span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
} else {
    echo "<p>[ on ] &nbsp; <span style='color:red;font-weight:bold;'>"._AM_ADV_NOTSECURE."</span></p>\n" ;
    echo '<p>' . _AM_ADV_USETRANSSID . '</p>';
}



// XOOPS_DB_PREFIX
echo '<h3>XOOPS_DB_PREFIX</h3>';
$safe = 'xoops' != strtolower(XOOPS_DB_PREFIX);
if ($safe) {
    echo '<p>[ ' . XOOPS_DB_PREFIX . " ] &nbsp; <span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
} else {
    echo '<p>[ ' . XOOPS_DB_PREFIX . " ] &nbsp; <span style='color:red;font-weight:bold;'>" . _AM_ADV_NOTSECURE . "</span></p>\n" ;
    echo '<p>' . _AM_ADV_DBPREFIX . "</p>\n" ;
}
echo "<p><a href='index.php?page=prefix_manager'>"._AM_ADV_LINK_TO_PREFIXMAN."</a></p>\n" ;


// patch to mainfile.php
echo '<h3>mainfile.php</h3>';
if (! defined('PROTECTOR_PRECHECK_INCLUDED')) {
    echo "<p>missing precheck &nbsp; <span style='color:red;font-weight:bold;'>"._AM_ADV_NOTSECURE."</span></p>\n" ;
    echo '<p>' . _AM_ADV_MAINUNPATCHED . '</p>';
} elseif (! defined('PROTECTOR_POSTCHECK_INCLUDED')) {
    echo "<p>missing postcheck &nbsp; <span style='color:red;font-weight:bold;'>"._AM_ADV_NOTSECURE."</span></p>\n" ;
    echo '<p>' . _AM_ADV_MAINUNPATCHED . '</p>';
} else {
    echo "<p>patched &nbsp; <span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
}


// patch to databasefactory.php
echo '<h3>databasefactory.php</h3>';
$db =& Database::getInstance() ;
if ('protectormysqldatabase' != strtolower(get_class($db))) {
    echo "<p><span style='color:red;font-weight:bold;'>"._AM_ADV_DBFACTORYUNPATCHED."</span></p>\n" ;
} else {
    echo _AM_ADV_DBFACTORYPATCHED."<p><span style='color:green;font-weight:bold;'>ok</span></p>\n" ;
}


// PROTECTION CHECK

echo '<h3>' . _AM_ADV_SUBTITLECHECK . "</h3>\n" ;
// Check contaminations
$uri_contami = XOOPS_URL . '/index.php?xoopsConfig%5Bnocommon%5D=1';
echo '<p>' . _AM_ADV_CHECKCONTAMI . ":</p>\n" ;
echo "<p><a href='$uri_contami' target='_blank'>$uri_contami</a></p>" ;

// Check isolated comments
$uri_isocom = XOOPS_URL . '/index.php?cid=' . urlencode(',password /*') ;
echo '<p>' . _AM_ADV_CHECKISOCOM . ":</p>\n" ;
echo "<p><a href='$uri_isocom' target='_blank'>$uri_isocom</a></p>" ;

// close div 'ui-card-main'
echo "</div>\n" ;

xoops_cp_footer();
