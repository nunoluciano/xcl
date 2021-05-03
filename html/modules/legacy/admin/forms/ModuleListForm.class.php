<?php
/**
 * ModuleListForm.class.php
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

class Legacy_ModuleListForm extends XCube_ActionForm
{
    /***
     * If the request is GET, never return token name.
     * By this logic, a action can have three page in one action.
     */
    public function getTokenName()
    {
        //
        //
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            return 'module.legacy.ModuleSettingsForm.TOKEN';
        } else {
            return null;
        }
    }

    /***
     * For displaying the confirm-page, don't show CSRF error.
     * Always return null.
     */
    public function getTokenErrorMessage()
    {
        return null;
    }

    public function prepare()
    {
        // set properties
        $this->mFormProperties['name']=new XCube_StringArrayProperty('name');
        $this->mFormProperties['weight']=new XCube_IntArrayProperty('weight');
        $this->mFormProperties['isactive']=new XCube_BoolArrayProperty('isactive');

        // set fields
        $this->mFieldProperties['name']=new XCube_FieldProperty($this);
        $this->mFieldProperties['name']->setDependsByArray(['required', 'maxlength']);
        $this->mFieldProperties['name']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_NAME, '140');
        $this->mFieldProperties['name']->addMessage('maxlength', _MD_LEGACY_ERROR_MAXLENGTH, _AD_LEGACY_LANG_NAME, '140');
        $this->mFieldProperties['name']->addVar('maxlength', 140);

        $this->mFieldProperties['weight']=new XCube_FieldProperty($this);
        $this->mFieldProperties['weight']->setDependsByArray(['required', 'min']);
        $this->mFieldProperties['weight']->addMessage('min', _AD_LEGACY_ERROR_MIN, _AD_LEGACY_LANG_WEIGHT, '0');
        $this->mFieldProperties['weight']->addVar('min', 0);
    }
}
