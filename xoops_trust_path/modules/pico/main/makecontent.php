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

define( 'PICO_URI_MAPPER_ALLOW_CAT_ID_OVERWRITING', true );

// common prepend
require dirname( __DIR__ ) . '/include/common_prepend.inc.php';
// global $breadcrumbsObj, $picoRequest, $permissions, $currenCategoryObj
// global $xoopsModuleConfig(overridden)


// redirecting for wraps mode and restoring after redirection
if ( $xoopsModuleConfig['use_wraps_mode'] ) {
	$uriMapper->redirect4WrapsPreview();
}

// request
$picoRequest['makecontent'] = true;

// deciding controller
if ( ! empty( $_POST['contentman_preview'] ) ) {
	$controller_class = 'PicoControllerPreviewContent';
} else if ( ! empty( $_POST['contentman_post'] ) ) {
	$controller_class = 'PicoControllerInsertContent';
} else {
	$controller_class = 'PicoControllerEditContent';
}

require_once dirname( __DIR__ ) . '/class/' . $controller_class . '.class.php';

$controller = new $controller_class( $currentCategoryObj );

$controller->execute( $picoRequest );

// render
if ( $controller->isNeedHeaderFooter() ) {

	$xoopsOption['template_main'] = $controller->getTemplateName();

	include XOOPS_ROOT_PATH . '/header.php';

	$xoopsTpl->assign( $controller->getAssign() );

	$xoopsTpl->assign( 'xoops_module_header', pico_main_render_moduleheader( $mydirname, $xoopsModuleConfig, $controller->getHtmlHeader() ) . $xoopsTpl->get_template_vars( 'xoops_module_header' ) );

	include XOOPS_ROOT_PATH . '/footer.php';

} else {
	$controller->render();
}
exit;
