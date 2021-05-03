<?php
/**
 * MovableType API
 * @package    kernel
 * @subpackage xml
 * @author     Kazumi Ono (aka onokazu)
 * @author     Minahito
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @version    2.3
 * @link       https://github.com/xoopscube/xcl
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH.'/class/xml/rpc/xmlrpcapi.php';

class MovableTypeApi extends XoopsXmlRpcApi
{
    public function __construct(&$params, &$response, &$module)
    {
        parent::__construct($params, $response, $module);
    }

    public function getCategoryList()
    {
        if (!$this->_checkUser($this->params[1], $this->params[2])) {
            $this->response->add(new XoopsXmlRpcFault(104));
        } else {
            $xoopsapi =& $this->_getXoopsApi($this->params);
            $xoopsapi->_setUser($this->user, $this->isadmin);
            $ret =& $xoopsapi->getCategories(false);
            if (is_array($ret)) {
                $arr = new XoopsXmlRpcArray();
                foreach ($ret as $id => $name) {
                    $struct = new XoopsXmlRpcStruct();
                    $struct->add('categoryId', new XoopsXmlRpcString($id));
                    $struct->add('categoryName', new XoopsXmlRpcString($name['title']));
                    $arr->add($struct);
                    unset($struct);
                }
                $this->response->add($arr);
            } else {
                $this->response->add(new XoopsXmlRpcFault(106));
            }
        }
    }

    public function getPostCategories()
    {
        $this->response->add(new XoopsXmlRpcFault(107));
    }

    public function setPostCategories()
    {
        $this->response->add(new XoopsXmlRpcFault(107));
    }

    public function supportedMethods()
    {
        $this->response->add(new XoopsXmlRpcFault(107));
    }
}
