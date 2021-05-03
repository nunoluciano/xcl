<?php
/**
 * SearchShowallAction.class.php
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

require_once XOOPS_MODULE_PATH . '/legacy/actions/SearchResultsAction.class.php';
require_once XOOPS_MODULE_PATH . '/legacy/forms/SearchShowallForm.class.php';

class Legacy_SearchShowallAction extends Legacy_SearchResultsAction
{
    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_SearchShowallForm($this->mConfig['keyword_min']);
        $this->mActionForm->prepare();
    }

    public function _getTemplateName()
    {
        return 'legacy_search_showall.html';
    }

    public function _getSelectedMids()
    {
        $ret = [];
        $ret[] = $this->mActionForm->get('mid');

        return $ret;
    }

    public function _getMaxHit()
    {
        return LEGACY_SEARCH_SHOWALL_MAXHIT;
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$render)
    {
        parent::executeViewIndex($controller, $xoopsUser, $render);

        $prevStart = $this->mActionForm->get('start') - LEGACY_SEARCH_SHOWALL_MAXHIT;
        if ($prevStart < 0) {
            $prevStart = 0;
        }

        $render->setAttribute('prevStart', $prevStart);
        $render->setAttribute('nextStart', $this->mActionForm->get('start') + LEGACY_SEARCH_SHOWALL_MAXHIT);
    }
}
