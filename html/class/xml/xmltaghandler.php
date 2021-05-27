<?php
/**
 * Xml Tag Handler
 * @package    kernel
 * @subpackage xml
 * @author     Ken Egervari, Remi Michalski
 * @author     Minahito
 * @copyright  2005-2021 The XOOPSCube Project
 * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 * @version    2.3.0
 */

class XmlTagHandler
{

    public function __construct()
    {
    }

    public function getName()
    {
        return '';
    }

    /**
     * @param $parser
     * @param $attributes
     */
    public function handleBeginElement(&$parser, &$attributes)
    {
    }

    /**
     * @param $parser
     */
    public function handleEndElement(&$parser)
    {
    }

    /**
     * @param $parser
     * @param $data
     */
    public function handleCharacterData(&$parser,  &$data)
    {
    }
}
