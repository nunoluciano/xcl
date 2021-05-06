<?php
/**
 * XPress module for XCL
 * @package    XPress
 * @version    5.7 @package_231@
 * @author     Nuno Luciano (aka gigamaster), 2020, XCL PHP7
 * @author     original: Toemon <http://ja.xpressme.info>
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

function xoops_module_update_ckeditor4()
{
	$module_handler = xoops_gethandler('module');
	$Module = $module_handler->getByDirname('ckeditor4');
	$config_handler = xoops_gethandler('config');
	$mid = $Module->mid();
	$ModuleConfig = $config_handler->getConfigsByCat(0, $mid);

	if (substr($ModuleConfig['toolbar_user'], -4) === '""]]') {
		//fix typo '""]]' to '"]]' for version <= 0.37
		$criteria = new CriteriaCompo(new Criteria('conf_modid', $mid));
		$criteria->add(new Criteria('conf_catid', 0));
		$criteria->add(new Criteria('conf_name', 'toolbar_user'));

		if ($configs = $config_handler->_cHandler->getObjects($criteria)) {
			$val = str_replace('""]]', '"]]', $ModuleConfig['toolbar_user']);
			$configs[0]->setVar('conf_value', $val, true);
			$config_handler->insertConfig($configs[0]);
		}
	}

	if (preg_match('/^head\s*$/m', $ModuleConfig['contentsCss'])) {
		//fix typo 'head' to '<head>' for version <= 0.38
		$criteria = new CriteriaCompo(new Criteria('conf_modid', $mid));
		$criteria->add(new Criteria('conf_catid', 0));
		$criteria->add(new Criteria('conf_name', 'contentsCss'));

		if ($configs = $config_handler->_cHandler->getObjects($criteria)) {
			$val = preg_replace('/^head(\s*)$/m', '<head>$1', $ModuleConfig['contentsCss']);
			$configs[0]->setVar('conf_value', $val, true);
			$config_handler->insertConfig($configs[0]);
		}
	}
	return true;
}
