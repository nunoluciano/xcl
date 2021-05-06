<?php
/**
 * This Interface is generated by Cube tool.
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    code generator
 * @copyright Copyright 2005-2021 XOOPSCube Project
 * @license   https://github.com/xoopscube/xcl/blob/master/docs/GPL_V2.txt
 * @license   https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

/**
 * Interface of group client delegate
 * Modules which uses Legacy_Group must implement this interface.
**/
interface Legacy_iGroupClientDelegate
{
    /**
     * getClientList	Legacy_GroupClient.{dirname}.GetClientList
     *
     * @param mixed[]	&$list
     *  list[]['dirname']
     *  list[]['dataname']
     * @param string	$dirname
     *
     * @return	void
     */
    public static function getClientList(/*** mixed[] ***/ &$list, /*** string ***/ $dirname);

    /**
     * getClientData	Legacy_GroupClient.{dirname}.GetClientData
     * Get client modules' data to show them inside Legacy_Group module
     *
     * @param mixed[]	&$list
     *  list[]['dirname']	string	client module's dirname
     *  list[]['dataname']	string	client module's dataname(tablename)
     *  list[]['title']	string		client module title
     *  list[]['data']	mixed
     *  list[]['template_name']	string
     * @param string	$dirname	client module's dirname
     * @param string	$dataname	client's target tablename
     * @param string	$fieldname	client's target fieldname
     * @param int		$groupId
     *
     * @return	void
     */
    public static function getClientData(/*** mixed ***/ &$list, /*** string ***/ $dirname, /*** string ***/ $dataname, /*** string ***/ $fieldname, /*** int ***/ $groupId);

    /**
     * getActionList	Legacy_GroupClient.{dirname}.GetActionList
     * Get client module's actions(view, edit, etc) to set their permission
     * by member's group rank.
     *
     * @param mixed[]	&$list
     *	$list['action'][]	string	
     *	$list['rank'][]		Lenum_GroupRank
     *	$list['title'][]	string
     *	$list['desctiption'][]	string
     * @param string	$dirname	client module's dirname
     * @param string	$dataname	client module's dataname(tablename)
     *
     * @return	void
     */
    public static function getActionList(/*** mixed[] ***/ &$list, /*** string ***/ $dirname, /*** string ***/ $dataname);
}
