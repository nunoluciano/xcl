<?php
/**
 * *
 *  * Form selection box with options for matching search terms.
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
 * base class
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/formselect.php';


class XoopsFormSelectMatchOption extends XoopsFormSelect
{
    /**
     * Constructor
     *
     * @param	string	$caption
     * @param	string	$name
     * @param	mixed	$value	Pre-selected value (or array of them).
     * 							Legal values are {@link XOOPS_MATCH_START}, {@link XOOPS_MATCH_END},
     * 							{@link XOOPS_MATCH_EQUAL}, and {@link XOOPS_MATCH_CONTAIN}
     * @param	int		$size	Number of rows. "1" makes a drop-down-list
     */
    public function __construct($caption, $name, $value=null, $size=1)
    {
        $this->XoopsFormSelect($caption, $name, $value, $size, false);
        $this->addOption(XOOPS_MATCH_START, _STARTSWITH);
        $this->addOption(XOOPS_MATCH_END, _ENDSWITH);
        $this->addOption(XOOPS_MATCH_EQUAL, _MATCHES);
        $this->addOption(XOOPS_MATCH_CONTAIN, _CONTAINS);
    }
    public function XoopsFormSelectMatchOption($caption, $name, $value=null, $size=1)
    {
        return $this->__construct($caption, $name, $value, $size);
    }
}
