<?php
/**
 * SmilesAdminDeleteForm.class.php
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

class Legacy_SmilesAdminDeleteForm extends XCube_ActionForm
{
    public function getTokenName()
    {
        return 'module.legacy.SmilesAdminDeleteForm.TOKEN' . $this->get('id');
    }

    public function prepare()
    {
        //
        // Set form properties
        //
        $this->mFormProperties['id'] =new XCube_IntProperty('id');

        //
        // Set field properties
        //
        $this->mFieldProperties['id'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['id']->setDependsByArray(['required']);
        $this->mFieldProperties['id']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_ID);
    }

    public function load(&$obj)
    {
        $this->set('id', $obj->get('id'));
    }

    public function update(&$obj)
    {
        $obj->set('id', $this->get('id'));
    }
}
