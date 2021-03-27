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

function b_waiting_d3forum( $mydirname ) {
	//$db =& Database::getInstance();
	$db = &XoopsDatabaseFactory::getDatabaseConnection();

	$ret = [];

	$sql = 'SELECT COUNT(*),MIN(post_id) FROM ' . $db->prefix( $mydirname . '_posts' ) . ' WHERE approval=0';

	if ( $result = $db->query( $sql ) ) {
		[ $waiting_count, $post_id ] = $db->fetchRow( $result );
		$ret = [
			'adminlink'     => XOOPS_URL . '/modules/' . $mydirname . '/index.php?post_id=' . (int) $post_id,
			'pendingnum'    => (int) $waiting_count,
			'lang_linkname' => _PI_WAITING_WAITINGS,
		];
	}

	return $ret;
}
