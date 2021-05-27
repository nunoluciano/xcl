<?php
/**
 * Form Date and time selection field
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

class XoopsFormDateTime extends XoopsFormElementTray
{

    public function __construct($caption, $name, $size = 15, $value=0)
    {
        $this->XoopsFormElementTray($caption, '&nbsp;');
        $value = (int)$value;
        $value = ($value > 0) ? $value : time();
        $datetime = getDate($value);
        $this->addElement(new XoopsFormTextDateSelect('', $name.'[date]', $size, $value));
        $timearray = [];
        for ($i = 0; $i < 24; $i++) {
            for ($j = 0; $j < 60; $j += 10) {
                $key = ($i * 3600) + ($j * 60);
                $timearray[$key] = (0 !== $j) ? $i . ':' . $j : $i . ':0' . $j;
            }
        }
        ksort($timearray);
        $timeselect = new XoopsFormSelect('', $name.'[time]', $datetime['hours'] * 3600 + 600 * ceil($datetime['minutes'] / 10));
        $timeselect->addOptionArray($timearray);
        $this->addElement($timeselect);
    }
    public function XoopsFormDateTime($caption, $name, $size = 15, $value=0)
    {
        return $this->__construct($caption, $name, $size, $value);
    }
}
