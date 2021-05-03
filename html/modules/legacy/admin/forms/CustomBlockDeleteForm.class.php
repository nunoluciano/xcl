<?php
/**
 *  CustomBlockDeleteForm.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 */


if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_ActionForm.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/class/Legacy_Validator.class.php';

class Legacy_CustomBlockDeleteForm extends XCube_ActionForm
{
    public function getTokenName()
    {
        return 'module.legacy.CustomBlockDeleteForm.TOKEN' . $this->get('bid');
    }

    public function prepare()
    {
        //
        // Set form properties
        //
        $this->mFormProperties['bid'] =new XCube_IntProperty('bid');

        //
        // Set field properties
        //
        $this->mFieldProperties['bid'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['bid']->setDependsByArray(['required']);
        $this->mFieldProperties['bid']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_BID);
    }

    public function load(&$obj)
    {
        $this->set('bid', $obj->get('bid'));
    }

    public function update(&$obj)
    {
    }
}
