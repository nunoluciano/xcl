<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * Class D3Tpl
 * @package XCL
 * @subpackage Altsys
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once XOOPS_ROOT_PATH . '/class/template.php';
require_once XOOPS_TRUST_PATH . '/libs/altsys/include/altsys_functions.php';


class D3Tpl extends XoopsTpl
{
    /**
     * D3Tpl constructor.
     */
    public function __construct()
    {
        parent::__construct() ;

        // for RTL users
        @define('_GLOBAL_LEFT', 1 == @_ADM_USE_RTL ? 'right' : 'left') ;
        @define('_GLOBAL_RIGHT', 1 == @_ADM_USE_RTL ? 'left' : 'right') ;
    }
}
