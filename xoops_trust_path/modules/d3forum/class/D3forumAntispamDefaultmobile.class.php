<?php

require_once __DIR__ . '/D3forumAntispamDefault.class.php' ;

class D3forumAntispamDefaultmobile extends D3forumAntispamDefault
{

    public function checkValidate()
    {
        if ($this->isMobile()) {
            return true;
        } else {
            return parent::checkValidate();
        }
    }

}

?>
