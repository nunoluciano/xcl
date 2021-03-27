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

function smarty_function_survey($params, &$smarty)
{
    $controller = new PicoFormProcessBySmartySurvey();
    $controller->canPostAgain = false; // default false for survey
    $controller->parseParameters($params);
    $controller->execute($params, $smarty);
}

class PicoFormProcessBySmartySurvey extends PicoFormProcessBySmartyBase
{
    public function __construct()
    {
        $this->mypluginname = 'survey';
    }

    public function executeLast()
    {
        $this->sendMail();
        $this->storeDB();
    }
}
