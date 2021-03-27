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

function d3forum_notify_iteminfo( $mydirname, $category, $item_id ) {
	// $db =& Database::getInstance();
	$db = &XoopsDatabaseFactory::getDatabaseConnection();

	$module_handler =& xoops_gethandler( 'module' );
	$module         =& $module_handler->getByDirname( $mydirname );

	if ( 'global' === $category ) {
		$item['name'] = '';
		$item['url']  = '';

		return $item;
	}

	if ( 'category' === $category ) {

		// Assume we have a valid cat_id
		$sql = 'SELECT cat_title FROM ' . $db->prefix( $mydirname . '_categories' ) . ' WHERE cat_id=' . $item_id;

		$result = $db->query( $sql );

		$result_array = $db->fetchArray( $result );

		$item['name'] = $result_array['cat_title'];

		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar( 'dirname' ) . '/index.php?cat_id=' . $item_id;

		return $item;
	}

	if ( 'forum' === $category ) {

		// Assume we have a valid forum_id
		$sql = 'SELECT forum_title FROM ' . $db->prefix( $mydirname . '_forums' ) . ' WHERE forum_id=' . $item_id;

		$result = $db->query( $sql );

		$result_array = $db->fetchArray( $result );

		$item['name'] = $result_array['forum_title'];

		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar( 'dirname' ) . '/index.php?forum_id=' . $item_id;

		return $item;
	}

	if ( 'topic' === $category ) {

		// Assume we have a valid topid_id
		$sql = 'SELECT topic_title FROM ' . $db->prefix( $mydirname . '_topics' ) . ' WHERE topic_id=' . $item_id;

		$result = $db->query( $sql );

		$result_array = $db->fetchArray( $result );

		$item['name'] = $result_array['topic_title'];

		$item['url'] = XOOPS_URL . '/modules/' . $module->getVar( 'dirname' ) . '/index.php?topic_id=' . $item_id;

		return $item;
	}
}
