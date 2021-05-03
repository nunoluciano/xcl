<?php
/**
 * Form hidden token field
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

class XoopsFormHiddenToken extends XoopsFormHidden
{

    /**
     * Constructor
     *
     * @param string $name "name" attribute
     * @param int    $timeout
     */
    public function __construct($name = null, $timeout = 360)
    {
        if (empty($name)) {
            $token =& XoopsMultiTokenHandler::quickCreate(XOOPS_TOKEN_DEFAULT);
            $name = $token->getTokenName();
        } else {
            $token =& XoopsSingleTokenHandler::quickCreate(XOOPS_TOKEN_DEFAULT);
        }
        $this->XoopsFormHidden($name, $token->getTokenValue());
    }
    public function XoopsFormHiddenToken($name = null, $timeout = 360)
    {
        return $this->__construct($name, $timeout);
    }
}
