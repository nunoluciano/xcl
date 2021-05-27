<?php
/**
 * @package    profile
 * @version    2.3.1
 * @author     Nuno Luciano (aka gigamaster), 2020, XCL PHP7
 * @author     Kilica
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @link       https://github.com/xoopscube/
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/core/XCube_ActionForm.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/class/Legacy_Validator.class.php';

class Profile_DataDeleteForm extends XCube_ActionForm
{
    /**
     * @public
     */
    public function getTokenName()
    {
        return 'module.profile.DataDeleteForm.TOKEN';
    }

    /**
     * @public
     */
    public function prepare()
    {
        //
        // Set form properties
        //
        $this->mFormProperties['uid'] =new XCube_IntProperty('uid');
    
        //
        // Set field properties
        //
        $this->mFieldProperties['uid'] =new XCube_FieldProperty($this);
        $this->mFieldProperties['uid']->setDependsByArray(['required']);
        $this->mFieldProperties['uid']->addMessage('required', _MD_PROFILE_ERROR_REQUIRED, _MD_PROFILE_LANG_UID);
    }

    /**
     * @public
     * @param $obj
     */
    public function load(&$obj)
    {
        $this->set('uid', $obj->get('uid'));
    }

    /**
     * @public
     * @param $obj
     */
    public function update(&$obj)
    {
        $obj->set('uid', $this->get('uid'));
    }
}
