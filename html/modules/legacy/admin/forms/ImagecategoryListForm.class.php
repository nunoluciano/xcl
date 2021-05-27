<?php
/**
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 * @license   https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_ActionForm.class.php';

/**
 * This class is generated by makeActionForm tool.
 * @auchor makeActionForm
 */
class Legacy_ImagecategoryListForm extends XCube_ActionForm
{
    /**
     * If the request is GET, never return token name.
     * By this logic, a action can have three page in one action.
     */
    public function getTokenName()
    {
        //
        //
        if ('POST' == xoops_getenv('REQUEST_METHOD')) {
            return 'module.legacy.ImagecategorySettingsForm.TOKEN';
        } else {
            return null;
        }
    }
    
    /**
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
        $this->mFormProperties['name'] =new XCube_StringArrayProperty('name');
        $this->mFormProperties['maxsize'] =new XCube_IntArrayProperty('maxsize');
        $this->mFormProperties['maxwidth'] =new XCube_IntArrayProperty('maxwidth');
        $this->mFormProperties['maxheight'] =new XCube_IntArrayProperty('maxheight');
        $this->mFormProperties['display'] =new XCube_BoolArrayProperty('display');
        $this->mFormProperties['weight'] =new XCube_IntArrayProperty('weight');
        $this->mFormProperties['delete']=new XCube_BoolArrayProperty('delete');
        //to display error-msg at confirm-page
        $this->mFormProperties['confirm'] =new XCube_BoolProperty('confirm');
        // set fields
        $this->mFieldProperties['name'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['name']->setDependsByArray(['required', 'maxlength']);
        $this->mFieldProperties['name']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_NAME, '100');
        $this->mFieldProperties['name']->addMessage('maxlength', _MD_LEGACY_ERROR_MAXLENGTH, _AD_LEGACY_LANG_IMGCAT_NAME, '100');
        $this->mFieldProperties['name']->addVar('maxlength', '100');
    
        $this->mFieldProperties['maxsize'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['maxsize']->setDependsByArray(['required']);
        $this->mFieldProperties['maxsize']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_MAXSIZE);
    
        $this->mFieldProperties['maxwidth'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['maxwidth']->setDependsByArray(['required']);
        $this->mFieldProperties['maxwidth']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_MAXWIDTH);
    
        $this->mFieldProperties['maxheight'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['maxheight']->setDependsByArray(['required']);
        $this->mFieldProperties['maxheight']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_MAXHEIGHT);
    
        $this->mFieldProperties['weight'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['weight']->setDependsByArray(['required']);
        $this->mFieldProperties['weight']->addMessage('required', _MD_LEGACY_ERROR_REQUIRED, _AD_LEGACY_LANG_IMGCAT_WEIGHT);
    }
}
