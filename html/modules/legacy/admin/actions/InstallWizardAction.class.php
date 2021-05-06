<?php
/**
 * InstallWizardAction.class.php
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

require_once XOOPS_LEGACY_PATH . '/admin/actions/AbstractModuleInstallAction.class.php';
require_once XOOPS_LEGACY_PATH . '/admin/class/ModuleInstaller.class.php';
require_once XOOPS_LEGACY_PATH . '/admin/forms/InstallWizardForm.class.php';

/***
 * @internal
 * @public
 * Install module
 */
class Legacy_InstallWizardAction extends Legacy_AbstractModuleInstallAction
{
    public $mLicence;
    public $mLicenceText;

    public function &_getInstaller($dirname)
    {
        $installer =new Legacy_ModuleInstaller($dirname);
        return $installer;
    }

    public function _setupActionForm()
    {
        $this->mActionForm =new Legacy_InstallWizardForm();
        $this->mActionForm->prepare();
    }

    public function _loadAgreement()
    {
        $root =& XCube_Root::getSingleton();

        $this->mLicence = $this->mModuleObject->modinfo['installer']['licence']['title'];

        $file = $this->mModuleObject->modinfo['installer']['licence']['file'];
        $language = $root->mContext->getXoopsConfig('language');

        //
        // TODO Replace with language manager.
        //
        $path = XOOPS_MODULE_PATH . '/' . $this->mModuleObject->get('dirname') . '/language/' . $language . '/' . $file;
        if (!file_exists($path)) {
            $path = XOOPS_MODULE_PATH . '/' . $this->mModuleObject->get('dirname') . '/language/english/' . $file;
            if (!file_exists($path)) {
                return;
            }
        }

        $this->mLicenceText = file_get_contents($path);
    }

    public function executeViewSuccess(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('module_install_success.html');
        $render->setAttribute('log', $this->mLog->mMessages);
    }

    public function executeViewIndex(&$controller, &$xoopsUser, &$render)
    {
        $render->setAttribute('module', $this->mModuleObject);
        $render->setAttribute('actionForm', $this->mActionForm);

        if (isset($this->mModuleObject->modinfo['installer'])) {
            $render->setAttribute('image', $this->mModuleObject->modinfo['installer']['image']);
            $render->setAttribute('description', $this->mModuleObject->modinfo['installer']['description']);
            $render->setTemplateName('install_wizard.html');
        } else {
            $controller->executeForward('index.php?action=ModuleInstall&dirname=' . $this->mModuleObject->get('dirname'));
        }
    }

    public function executeViewInput(&$controller, &$xoopsUser, &$render)
    {
        $render->setTemplateName('install_wizard_licence.html');
        $render->setAttribute('module', $this->mModuleObject);
        $render->setAttribute('actionForm', $this->mActionForm);
        $render->setAttribute('licence', $this->mLicence);
        $render->setAttribute('licenceText', $this->mLicenceText);
    }
}
