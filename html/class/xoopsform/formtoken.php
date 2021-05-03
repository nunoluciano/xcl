<?php
/**
 * Token
 * @package    Legacy
 * @subpackage core
 * @author     kilica
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @version    2.3.0 @Gigamaster 2020 XCL PHP7
 * @link       https://github.com/xoopscube/xcl
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

class XoopsFormToken extends XoopsFormHidden
{
    /**
     * Constructor
     *
     * @param object    $token  XoopsToken instance
    */
    public function __construct($token)
    {
        if (is_object($token)) {
            parent::__construct($token->getTokenName(), $token->getTokenValue());
        } else {
            parent::__construct('', '');
        }
    }
    public function XoopsFormToken($token)
    {
        return self::__construct($token);
    }
}
