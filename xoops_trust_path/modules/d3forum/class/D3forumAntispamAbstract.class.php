<?php

class D3forumAntispamAbstract
{

    var $errors = [];

    public function getErrors4Html()
    {
        $ret = '';
        foreach ($this->errors as $error) {
            $ret .= '<span style="color:#f00;">' . htmlspecialchars($error) . '</span><br>';
        }

        return $ret;
    }

    public function getHtml4Assign()
    {
        return [
            'html_in_form'            => '',
            'js_global'               => '',
            'js_in_validate_function' => '',
        ];
    }

    public function checkValidate()
    {
        return true;
    }

    public function isMobile()
    {
        if (class_exists('Wizin_User')) {
            // WizMobile (gusagi)
            $user =& Wizin_User::getSingleton();
            return $user->bIsMobile;
        } elseif (defined('HYP_K_TAI_RENDER') && HYP_K_TAI_RENDER && HYP_K_TAI_RENDER != 2) {
            // hyp_common ktai-renderer (nao-pon)
            return true;
        } else {
            return false;
        }
    }

    public function setVar($key, $val)
    {
        if (property_exists($this, $key)) {
            $this->$key = $val;
            return true;
        }
        return false;
    }

    public function getVar($key)
    {
        if (property_exists($this, $key)) {
            return $this->$key;
        }
        return null;
    }

}

?>
