<?php
/**
 *
 * @package Legacy
 * @version $Id: Legacy_Validator.class.php,v 1.3 2008/09/25 15:11:28 kilica Exp $
 * @copyright Copyright 2005-2020 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_Validator.class.php';

class XCube_ObjectExistValidator extends XCube_Validator
{
    public function isValid(&$form, $vars)
    {
        if ($form->isNull()) {
            return true;
        } else {
            $handleName = $vars['handler'];
            $moduleName = isset($vars['module']) ? $vars['module'] : null;

            if (null == $moduleName) {
                $handler =& xoops_gethandler($handleName);
            } else {
                $handler =& xoops_getmodulehandler($handleName, $moduleName);
            }
            $obj =& $handler->get($form->getValue());

            return is_object($obj);
        }
    }
}
