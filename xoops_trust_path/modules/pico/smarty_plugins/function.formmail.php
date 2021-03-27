<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package XCL
 * @subpackage Pico
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once XOOPS_TRUST_PATH . '/modules/pico/class/FormProcessByHtml.class.php';
require_once XOOPS_TRUST_PATH . '/modules/pico/class/PicoFormProcessBySmartyBase.class.php';

function smarty_function_formmail($params, &$smarty)
{
    $controller = new PicoFormProcessBySmartyFormmail();

    $controller->parseParameters($params);

    // toEmails from 'adminmail'
    if (empty($controller->toEmails) && '' != trim($GLOBALS['xoopsConfig']['adminmail'])) {
        $controller->toEmails[] = $GLOBALS['xoopsConfig']['adminmail'];
    }

    if ($controller->countValidToEmails() <= 0) {
        die('Set a valid email address by adding to="(email)" inside &lt;{' . $controller->mypluginname . '}&gt;');
    }
    $controller->execute($params, $smarty);
}

class PicoFormProcessBySmartyFormmail extends PicoFormProcessBySmartyBase
{
    public function __construct()
    {
        $this->mypluginname = 'formmail';
    }

    public function executeLast()
    {
        $this->sendMail();
        //$this->storeDB() ;
    }
}
