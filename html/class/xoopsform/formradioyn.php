<?php
/**
 * Form radio buttons  Yes/No
 * A pair of radio buttons labelled _YES and _NO with values 1 and 0
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
include_once XOOPS_ROOT_PATH . '/class/xoopsform/formradio.php';


class XoopsFormRadioYN extends XoopsFormRadio
{
    /**
     * Constructor
     *
     * @param	string	$caption
     * @param	string	$name
     * @param	string	$value		Pre-selected value, can be "0" (No) or "1" (Yes)
     * @param	string	$yes		String for "Yes"
     * @param	string	$no			String for "No"
     */
    public function __construct($caption, $name, $value=null, $yes=_YES, $no=_NO)
    {
        $this->XoopsFormRadio($caption, $name, $value);
        $this->addOption(1, $yes);
        $this->addOption(0, $no);
    }
    public function XoopsFormRadioYN($caption, $name, $value=null, $yes=_YES, $no=_NO)
    {
        return $this->__construct($caption, $name, $value, $yes, $no);
    }
}
