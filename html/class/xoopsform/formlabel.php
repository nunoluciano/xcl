<?php
/**
 * *
 *  * Form text label
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

class XoopsFormLabel extends XoopsFormElement
{

    /**
     * Text
     * @var	string
     * @access	private
     */
    public $_value;

    /**
     * Constructor
     *
     * @param	string	$caption	Caption
     * @param	string	$value		Text
     */
    public function __construct($caption= '', $value= '')
    {
        $this->setCaption($caption);
        $this->_value = $value;
    }
    public function XoopsFormLabel($caption= '', $value= '')
    {
        return $this->__construct($caption, $value);
    }

    /**
     * Get the text
     *
     * @return	string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * Prepare HTML for output
     *
     * @return	string
     */
    public function render()
    {
        $root =& XCube_Root::getSingleton();
        $renderSystem =& $root->getRenderSystem(XOOPSFORM_DEPENDENCE_RENDER_SYSTEM);

        $renderTarget =& $renderSystem->createRenderTarget('main');

        $renderTarget->setAttribute('legacy_module', 'legacy');
        $renderTarget->setTemplateName('legacy_xoopsform_label.html');
        $renderTarget->setAttribute('element', $this);

        $renderSystem->render($renderTarget);

        return $renderTarget->getResult();
    }
}
