<?php
/**
 * Form text label
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
