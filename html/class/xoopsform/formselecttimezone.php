<?php
/**
 * Form select box with timezones
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


class XoopsFormSelectTimezone extends XoopsFormSelect
{
    /**
     * Constructor
     *
     * @param	string	$caption
     * @param	string	$name
     * @param	mixed	$value	Pre-selected value (or array of them).
     * 							Legal values are "-12" to "12" with some ".5"s strewn in ;-)
     * @param	int		$size	Number of rows. "1" makes a drop-down-box.
     */
    public function __construct($caption, $name, $value=null, $size=1)
    {
        $this->XoopsFormSelect($caption, $name, $value, $size);
        $this->addOptionArray(XoopsLists::getTimeZoneList());
    }
    public function XoopsFormSelectTimezone($caption, $name, $value=null, $size=1)
    {
        return $this->__construct($caption, $name, $value, $size);
    }
}
