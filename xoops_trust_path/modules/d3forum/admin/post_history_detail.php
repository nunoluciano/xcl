<?php
/**
 * D3Forum module for XCL
 *
 * @package XCL
 * @subpackage D3Forum
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

//!Fix deprecated $db =& Database::getInstance();
$db = &XoopsDatabaseFactory::getDatabaseConnection();
//
// form stage
//
$history_id = (int) @$_GET['history_id'];

[ $data_serialized ] = $db->fetchRow( $db->query( 'SELECT data FROM ' . $db->prefix( $mydirname . '_post_histories' ) . " WHERE history_id=$history_id" ) );

$data = @unserialize( $data_serialized );

if ( empty( $data ) ) {
	exit;
}

$sql = 'INSERT INTO ' . $db->prefix( $mydirname . '_posts' ) . ' SET ' . "\n";

foreach ( $data as $key => $val ) {
	$sql .= "`$key`=" . $db->quoteString( $val ) . ",\n";
}
$sql = substr( $sql, 0, - 2 ) . ';';

//
// display stage
//

xoops_cp_header();

include __DIR__ . '/mymenu.php';

echo nl2br( htmlspecialchars( $sql, ENT_QUOTES ) );

xoops_cp_footer();
