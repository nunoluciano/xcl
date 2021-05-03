<?php
/**
 * ImagecategoryAdminNewForm.class.php
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
require_once XOOPS_MODULE_PATH . '/legacy/admin/forms/ImagecategoryAdminEditForm.class.php';

class Legacy_ImagecategoryAdminNewForm extends Legacy_ImagecategoryAdminEditForm
{
    public function getTokenName()
    {
        return 'module.legacy.ImagecategoryAdminNewForm.TOKEN';
    }

    public function prepare()
    {
        parent::prepare();

        //
        // Set form properties
        //
        $this->mFormProperties['imgcat_storetype'] =new XCube_StringProperty('imgcat_storetype');

        //
        // Set field properties
        //
        $this->mFieldProperties['imgcat_storetype'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['imgcat_storetype']->setDependsByArray(['required', 'mask']);
        $this->mFieldProperties['imgcat_storetype']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_STORETYPE);
        $this->mFieldProperties['imgcat_storetype']->addMessage('mask', _MD_LEGACY_ERROR_MASK, _AD_LEGACY_LANG_IMGCAT_STORETYPE);
        $this->mFieldProperties['imgcat_storetype']->addVar('mask', '/^(file|db)$/');
    }

    public function load(&$obj)
    {
        parent::load($obj);
        $this->set('imgcat_storetype', $obj->get('imgcat_storetype'));
    }

    public function update(&$obj)
    {
        parent::update($obj);
        $obj->set('imgcat_storetype', $this->get('imgcat_storetype'));
    }
}
