<?php

require_once XOOPS_ROOT_PATH.'/class/template.php' ;
require_once XOOPS_TRUST_PATH.'/libs/altsys/include/altsys_functions.php' ;

class D3Tpl extends XoopsTpl
{

    //HACK by domifara
    //	public function D3Tpl()
    public function __construct()
    {
        parent::__construct() ;

        // for RTL users
        @define('_GLOBAL_LEFT', 1 == @_ADM_USE_RTL ? 'right' : 'left') ;
        @define('_GLOBAL_RIGHT', 1 == @_ADM_USE_RTL ? 'left' : 'right') ;
    }
}
