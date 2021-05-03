<?php
/**
 * Form select field with a choice of available groups
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
 * Parent
 */
include_once XOOPS_ROOT_PATH . '/class/xoopsform/formselect.php';


class XoopsFormSelectGroup extends XoopsFormSelect
{
    /**
     * Constructor
     *
     * @param	string	$caption
     * @param	string	$name
     * @param	bool	$include_anon	Include group "anonymous"?
     * @param	mixed	$value	    	Pre-selected value (or array of them).
     * @param	int		$size	        Number or rows. "1" makes a drop-down-list.
     * @param	bool    $multiple       Allow multiple selections?
     */
    public function __construct($caption, $name, $include_anon=false, $value=null, $size=1, $multiple=false)
    {
        $this->XoopsFormSelect($caption, $name, $value, $size, $multiple);
        $member_handler =& xoops_gethandler('member');
        if (!$include_anon) {
            $this->addOptionArray($member_handler->getGroupList(new Criteria('groupid', XOOPS_GROUP_ANONYMOUS, '!=')));
        } else {
            $this->addOptionArray($member_handler->getGroupList());
        }
    }
    public function XoopsFormSelectGroup($caption, $name, $include_anon=false, $value=null, $size=1, $multiple=false)
    {
        return $this->__construct($caption, $name, $include_anon, $value, $size, $multiple);
    }
}
