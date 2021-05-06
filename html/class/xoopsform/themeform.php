<?php
/**
 * Form that will output as a theme-enabled HTML table
 * Also adds JavaScript to validate required fields
 * @package    kernel
 * @subpackage form
 * @author     Kazumi Ono (aka onokazu)
 * @author     Minahito
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @version    2.3.0 @Gigamaster 2020 XCL PHP7
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/**
 * base class
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/form.php';


class XoopsThemeForm extends XoopsForm
{
    /**
     * Insert an empty row in the table to serve as a seperator.
     *
     * @param	string  $extra  HTML to be displayed in the empty row.
     * @param	string	$class	CSS class name for <td> tag
     */
    public function insertBreak($extra = '', $class= '')
    {
        $class = ('' !== $class) ? " class='$class'" : '';
        $extra = ('' !== $extra) ? $extra : '&nbsp';
        $this->addElement(new XoopsFormBreak($extra, $class)) ;
    }

    /**
     * create HTML to output the form as a theme-enabled table with validation.
     *
     * @return	string
     */
    public function render()
    {
        $root =& XCube_Root::getSingleton();
        $renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);
        $renderTarget =& $renderSystem->createRenderTarget('main');

        $renderTarget->setAttribute('legacy_module', 'legacy');
        $renderTarget->setTemplateName('legacy_xoopsform_themeform.html');
        $renderTarget->setAttribute('form', $this);

        $renderSystem->render($renderTarget);

        $ret = $renderTarget->getResult();
        $ret .= $this->renderValidationJS(true);

        return $ret;
    }
}
