<?php
/**
 * Form break
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

class XoopsFormBreak extends XoopsFormElement
{
    public function __construct($extra = '', $class= '')
    {
        $this->setExtra($extra);
        $this->setClass($class);
    }
    public function XoopsFormBreak($extra = '', $class= '')
    {
        return $this->__construct($extra, $class);
    }

    public function isBreak()
    {
        return true;
    }
}
