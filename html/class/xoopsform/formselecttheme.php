<?php
/**
 * Form select box with available themes
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
 * lists of values
 */
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
/**
 * base class
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/formselect.php';


class XoopsFormSelectTheme extends XoopsFormSelect
{
    /**
     * Constructor
     *
     * @param	string	$caption
     * @param	string	$name
     * @param	mixed	$value	Pre-selected value (or array of them).
     * @param	int		$size	Number or rows. "1" makes a drop-down-list
     */
    public function __construct($caption, $name, $value=null, $size=1)
    {
        $this->XoopsFormSelect($caption, $name, $value, $size);
        $this->addOptionArray(XoopsLists::getThemesList());
    }
    public function XoopsFormSelectTheme($caption, $name, $value=null, $size=1)
    {
        return $this->__construct($caption, $name, $value, $size);
    }
}
