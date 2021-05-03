<?php
/**
 * Form that will output as a simple HTML form with minimum formatting
 * @package    kernel
 * @subpackage form
 * @author     Kazumi Ono (aka onokazu)
 * @author     Minahito
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @version    2.3.0 @Gigamaster 2020 XCL PHP7
 * @link       https://github.com/xoopscube/xcl
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/**
 * base class
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/form.php';


class XoopsSimpleForm extends XoopsForm
{
    /**
     * create HTML to output the form with minimal formatting
     *
     * @return	string
     */
    public function render()
    {
        $root =& XCube_Root::getSingleton();
        $renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);

        $renderTarget =& $renderSystem->createRenderTarget('main');

        $renderTarget->setAttribute('legacy_module', 'legacy');
        $renderTarget->setTemplateName('legacy_xoopsform_simpleform.html');
        $renderTarget->setAttribute('form', $this);

        $renderSystem->render($renderTarget);

        return $renderTarget->getResult();
    }
}
