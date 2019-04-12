<?php

if (!defined('XOOPS_ROOT_PATH')) exit();

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
	function getName()
	{
		return "waiting";
	}

	function getTitle()
	{
		return "TEST: AdminWaiting";
	}

	function getEntryIndex()
	{
		return 0;
	}

	function isEnableCache()
	{
		return false;
	}

	function execute()
	{


		$render =& $this->getRenderTarget();

		// Load theme template ie fallback
		//$render->setAttribute('legacy_module', 'legacy');
		$render->setTemplateName('legacy_admin_block_waiting.html');

//
		//$root->mLanguageManager->loadBlockMessageCatalog('legacy');
		
		$modules = array();
		XCube_DelegateUtils::call('Legacyblock.Wating.Show', new XCube_Ref($modules));
		//$root =& XCube_Root::getSingleton();
		$render->setAttribute('modules', $modules);
		$render->setAttribute('blockid', $this->getName());
		$renderSystem =& $root->getRenderSystem($this->getRenderSystemName());
		$renderSystem->renderBlock($render);
	}

	function hasResult()
	{
		return true;
	}

	function &getResult()
	{
		$dmy = "dummy";
		return $dmy;
	}

	function getRenderSystemName()
	{
		return 'Legacy_AdminRenderSystem';
	}
}

?>