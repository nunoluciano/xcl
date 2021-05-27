<?php
/**
 *
 * @package Legacy
 * @version $Id: index.php,v 1.3 2008/09/25 14:31:43 kilica Exp $
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 *
 */

require_once '../../mainfile.php';
require_once XOOPS_ROOT_PATH . '/header.php';
require_once XOOPS_MODULE_PATH . '/legacy/class/ActionFrame.class.php';

$root =& XCube_Root::getSingleton();

$actionName = isset($_GET['action']) ? trim($_GET['action']) : 'Default';

$moduleRunner =new Legacy_ActionFrame(false);
$moduleRunner->setActionName($actionName);

$root->mController->mExecute->add([&$moduleRunner, 'execute']);

$root->mController->execute();

require_once XOOPS_ROOT_PATH . '/footer.php';
