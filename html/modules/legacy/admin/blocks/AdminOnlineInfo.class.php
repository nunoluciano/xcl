<?php

if (!defined('XOOPS_ROOT_PATH')) exit();

class Legacy_AdminOnlineInfo extends Legacy_AbstractBlockProcedure
{
	function getName()
	{
		return "onlineinfo";
	}

	function getTitle()
	{
		return "TEST: AdminOnlineInfo";
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
		$render->setAttribute('legacy_module', 'legacy');
		$render->setTemplateName('legacy_admin_block_onlineinfo.html');
		
		$root =& XCube_Root::getSingleton();
		$root->mLanguageManager->loadBlockMessageCatalog('user');
		require_once XOOPS_ROOT_PATH . "/modules/user/blocks/user_online.php";
		 
		$contents = b_user_online_show();

		$render->setAttribute('contents', $contents);
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