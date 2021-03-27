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

require_once dirname(__DIR__) . '/include/main_functions.php';
require_once dirname(__DIR__) . '/include/common_functions.php';
require_once dirname(__DIR__) . '/class/PicoTextSanitizer.class.php';
require_once dirname(__DIR__) . '/class/PicoUriMapper.class.php';
require_once dirname(__DIR__) . '/class/PicoPermission.class.php';
require_once dirname(__DIR__) . '/class/PicoModelCategory.class.php';
require_once dirname(__DIR__) . '/class/PicoModelContent.class.php';

require_once XOOPS_TRUST_PATH . '/libs/altsys/class/AltsysBreadcrumbs.class.php';

// breadcrumbs
$breadcrumbsObj = AltsysBreadcrumbs::getInstance();

$breadcrumbsObj->appendPath(XOOPS_URL . '/modules/' . $mydirname . '/index.php', $xoopsModule->getVar('name'));

// permissions
$picoPermission = &PicoPermission::getInstance();

$permissions = $picoPermission->getPermissions($mydirname);

// current category object (this "current" means "targeted")
$currentCategoryObj = new PicoCategory($mydirname, (int)@$_REQUEST['cat_id'], $permissions);

if ($currentCategoryObj->isError()) {
    redirect_header(XOOPS_URL . "/modules/$mydirname/index.php", 2, _MD_PICO_ERR_READCATEGORY);
    exit;
}

// override $xoopsModuleConfig
$xoopsModuleConfig = $currentCategoryObj->getOverriddenModConfig();

// append paths from each categories into breadcrumbs
$breadcrumbsObj->appendPath($currentCategoryObj->getBreadcrumbs());

// request
$picoRequest = [];
$picoRequest['cat_id'] = (int)@$_REQUEST['cat_id'];

if (!empty($_POST['categoryman_post'])) {
    $controller_class = 'PicoControllerUpdateCategory';
} else if (!empty($_POST['categoryman_delete'])) {
    $controller_class = 'PicoControllerDeleteCategory';
} else {
    $controller_class = 'PicoControllerEditCategory';
}

require_once dirname(__DIR__) . '/class/' . $controller_class . '.class.php';

$controller = new $controller_class($currentCategoryObj);

$controller->execute($picoRequest);

// render
if ($controller->isNeedHeaderFooter()) {

    $xoopsOption['template_main'] = $controller->getTemplateName();

    include XOOPS_ROOT_PATH . '/header.php';

    $xoopsTpl->assign($controller->getAssign());

    $xoopsTpl->assign('xoops_module_header', pico_main_render_moduleheader($mydirname, $xoopsModuleConfig, $controller->getHtmlHeader()) . $xoopsTpl->get_template_vars('xoops_module_header'));

    include XOOPS_ROOT_PATH . '/footer.php';

} else {
    $controller->render();
}
exit;
