<?php
/**
 * ActionSearchForm.class.php
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

class Legacy_ActionSearchForm extends XCube_ActionForm
{
    public $mState = null;

    public function prepare()
    {
        $this->mFormProperties['keywords']=new XCube_StringProperty('keywords');

        // set fields
        $this->mFieldProperties['keywords']=new XCube_FieldProperty($this);
        $this->mFieldProperties['keywords']->setDependsByArray(['required']);
        $this->mFieldProperties['keywords']->addMessage('required', _AD_LEGACY_ERROR_SEARCH_REQUIRED);
    }

    public function fetch()
    {
        parent::fetch();
        $this->set('keywords', trim($this->get('keywords')));
    }
}
