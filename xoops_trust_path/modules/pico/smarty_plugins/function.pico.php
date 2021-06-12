<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package    Pico
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPSCube Project 
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

require_once XOOPS_TRUST_PATH . '/modules/pico/include/common_functions.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoTextSanitizer.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoUriMapper.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoPermission.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoModelCategory.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoModelContent.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/blocks/content.php';

function smarty_function_pico( $params, &$smarty ) {
	$mydirname  = @$params['dir'] . @$params['dirname'];
	$content_id = @$params['id'] + @$params['content_id'];
	$template   = @$params['template'];
	$var_name   = @$params['item'] . @$params['assign'];

	if ( empty( $content_id ) ) {
		echo 'error ' . __FUNCTION__ . ' [specify id]';

		return;
	}

	if ( empty( $mydirname ) ) {
		$mydirname = $smarty->get_template_vars( 'mydirname' );
	}
	if ( empty( $mydirname ) ) {
		echo 'error ' . __FUNCTION__ . ' [specify dirname]';

		return;
	}

	//require_once XOOPS_ROOT_PATH.'/modules/'.$mydirname.'/blocks/blocks.php' ;

	if ( $var_name ) {
		// just assign
		$assigns = b_pico_content_show( [ $mydirname, $content_id, $template, 'disable_renderer' => true ] );
		$smarty->assign( $var_name, $assigns );
	} else {
		// display
		$block = b_pico_content_show( [ $mydirname, $content_id, $template ] );
		echo @$block['content'];
	}
}
