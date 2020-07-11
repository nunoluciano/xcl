<?php
/**
 * *
 *  * Form that will output formatted as a HTML table
 *  *
 *  * No styles and no JavaScript to check for required fields.
 *  *
 *  * @package    kernel
 *  * @subpackage form
 *  * @author     Original Authors: Kazumi Ono (aka onokazu)
 *  * @author     Other Authors : Minahito
 *  * @copyright  2000-2020 The XOOPSCube Project
 *  * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *  * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 *  * @version    Release: @package_230@
 *  * @link       https://github.com/xoopscube/xcl
 * *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/**
 * the base class
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/form.php';


class XoopsTableForm extends XoopsForm
{

    /**
     * create HTML to output the form as a table
     *
     * @return	string
     */
    public function render()
    {
        $root =& XCube_Root::getSingleton();
        $renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);

        $renderTarget =& $renderSystem->createRenderTarget('main');

        $renderTarget->setAttribute('legacy_module', 'legacy');
        $renderTarget->setTemplateName('legacy_xoopsform_tableform.html');
        $renderTarget->setAttribute('form', $this);

        $renderSystem->render($renderTarget);

        return $renderTarget->getResult();
    }
}
