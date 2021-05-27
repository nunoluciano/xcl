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

/**
 * This is test menu block for control panel of legacy module.
 *
 * [ASSIGN]
 *  No
 *
 * @package legacy
 */
class Legacy_AdminWaiting extends Legacy_AbstractBlockProcedure
{
    public function getName()
    {
        return 'waiting';
    }

    public function getTitle()
    {
        return 'TEST: AdminWaiting';
    }

    public function getEntryIndex()
    {
        return 0;
    }

    public function isEnableCache()
    {
        return false;
    }

    public function execute()
    {
        $root =& XCube_Root::getSingleton();

        $render =& $this->getRenderTarget();

        // Load theme template ie fallback
        //$render->setAttribute('legacy_module', 'legacy');
        $render->setTemplateName('legacy_admin_block_waiting.html');

        //
        //$root->mLanguageManager->loadBlockMessageCatalog('legacy');

        $modules = [];
        XCube_DelegateUtils::call('Legacyblock.Wating.Show', new XCube_Ref($modules));

        $render->setAttribute('modules', $modules);
        $render->setAttribute('blockid', $this->getName());
        $renderSystem =& $root->getRenderSystem($this->getRenderSystemName());
        $renderSystem->renderBlock($render);
    }

    public function hasResult()
    {
        return true;
    }

    public function &getResult()
    {
        $dmy = 'dummy';
        return $dmy;
    }

    public function getRenderSystemName()
    {
        return 'Legacy_AdminRenderSystem';
    }
}


