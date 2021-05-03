<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package XCL
 * @subpackage Pico
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once XOOPS_TRUST_PATH . '/modules/pico/include/main_functions.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoPermission.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoModelCategory.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoModelContent.class.php';

eval( 'function ' . $mydirname . '_notify_iteminfo( $category, $item_id ){ return pico_notify_base( \'' . $mydirname . '\' , $category , $item_id ) ;}' );

if ( ! function_exists( 'pico_notify_base' ) ) {

	function pico_notify_base( $mydirname, $category, $item_id ) {
		include_once __DIR__ . '/include/common_functions.php';

		$db = XoopsDatabaseFactory::getDatabaseConnection();

		$module_handler = &xoops_gethandler( 'module' );

		$module = $module_handler->getByDirname( $mydirname );

		$picoPermission = &PicoPermission::getInstance();

		$permissions = $picoPermission->getPermissions( $mydirname );

		// global
		if ( 'global' == $category ) {
			$item['name'] = '';
			$item['url']  = '';
		}

		// category
		if ( 'category' == $category ) {
			// Assume we have a valid cat_id
			$cat_id = (int) $item_id;

			$currentCategoryObj = new PicoCategory( $mydirname, (int) $cat_id, $permissions );

			$cat_data = $currentCategoryObj->getData();

			if ( ! $cat_data['can_read'] ) {
				return false;
			}

			$category4assign = $currentCategoryObj->getData4html();

			// $item should be assigned HTML escaped data
			$item['name'] = $category4assign['cat_title'];

			$item['url'] = XOOPS_URL . '/modules/' . $module->getVar( 'dirname' ) . '/' . $category4assign['link'];
		}

		// content
		if ( 'content' == $category ) {
			// Assume we have a valid content_id
			$content_id = (int) $item_id;

			$cat_id = pico_common_get_cat_id_from_content_id( $mydirname, $content_id );

			$currentCategoryObj = new PicoCategory( $mydirname, (int) $cat_id, $permissions );

			$cat_data = $currentCategoryObj->getData();

			if ( ! $cat_data['can_read'] ) {
				return false;
			}

			$contentObj = new PicoContent( $mydirname, $content_id, $currentCategoryObj );

			$content4assign = $contentObj->getData4html();

			if ( ! $content4assign['can_read'] ) {
				return false;
			}

			// $item should be assigned HTML escaped data
			$item['name'] = $content4assign['subject'];

			$item['url'] = XOOPS_URL . '/modules/' . $module->getVar( 'dirname' ) . '/' . $content4assign['link'];
		}

		return $item;
	}
}
