<?php
/**
 * SearchAction.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_MODULE_PATH . '/legacy/actions/SearchResultsAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/forms/SearchResultsForm.class.php';

class Legacy_SearchAction extends Legacy_SearchResultsAction
{
    public function getDefaultView(&$controller, &$xoopsUser)
    {
        $root =& $controller->mRoot;
        $service =& $root->mServiceManager->getService('LegacySearch');

        if (is_object($service)) {
            $client =& $root->mServiceManager->createClient($service);
            $this->mModules = $client->call('getActiveModules', []);
        }

        return LEGACY_FRAME_VIEW_INDEX;
    }

    public function _getSelectedMids()
    {
        $ret = [];
        foreach (array_keys($this->mModules) as $key) {
            $ret[] = $this->mModules[$key]['mid'];
        }

        return $ret;
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('legacy_search_form.html');

        $render->setAttribute('actionForm', $this->mActionForm);

        $render->setAttribute('moduleArr', $this->mModules);

        //
        // If the request include $mids, setAttribute it. If it don't include,
        // setAttribute $mid or $this->mModules.
        //
        $render->setAttribute('selectedMidArr', $this->_getSelectedMids());
        $render->setAttribute('searchRuleMessage', @sprintf(_SR_KEYTOOSHORT, $this->mConfig['keyword_min']));
    }
}
