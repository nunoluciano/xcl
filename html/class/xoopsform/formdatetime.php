<?php
/**
 * *
 *  * Form Date and time selection field
 *  *
 *  * @package    kernel
 *  * @subpackage form
 *  * @author     Original Authors: Kazumi Ono (aka onokazu)
 *  * @author     Other Authors : Minahito
 *  * @copyright  2000-2020 The XOOPSCube Project
 *  * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *  * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 *  * @version    Release: @package_230@
 *  * @link       https://github.com/xoopscube/xcl
 * *
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
