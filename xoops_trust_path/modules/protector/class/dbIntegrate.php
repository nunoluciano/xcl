<?php
/**
 * Protector module for XCL
 *
 * @package XCL
 * @subpackage Protector Administration Security
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

class protectorDbIntegrate
{
    private $link = null;
    private $api = 'mysql';
    
    public function __construct($link)
    {
        $this->link = $link;
        if (is_object($link) && $link instanceof \mysqli) {
            $this->api = 'mysqli';
        }
    }
    
    public function FieldFlags($result, $field_offset)
    {
        switch ($this->api) {
            case 'mysqli':
                $res = mysqli_fetch_field_direct($result, $field_offset);
                if ($res && $res->flags) {
                    $flags = $res->flags;
                    if (defined('MYSQLI_BINARY_FLAG') and ($flags & MYSQLI_BINARY_FLAG)) {
                        $flags .= ' BINARY';
                    }
                    return $flags;
                } else {
                    return false;
                }
            default:
                return mysqli_field_flags($result, $field_offset);
        }
    }
    
    public function FetchField($result, $field_offset)
    {
        $type_hash = [
            1=>'tinyint',
            2=>'smallint',
            3=>'int',
            4=>'float',
            5=>'double',
            7=>'timestamp',
            8=>'bigint',
            9=>'mediumint',
            10=>'date',
            11=>'time',
            12=>'datetime',
            13=>'year',
            16=>'bit',
            252=>'blob',
            253=>'varchar',
            254=>'char',
            246=>'decimal'
        ];
        switch ($this->api) {
            case 'mysqli':
                $res = mysqli_fetch_field_direct($result, $field_offset);
                if (isset($type_hash[$res->type])) {
                    $res->type = $type_hash[$res->type];
                }
                return $res;
            default:
                return mysqli_fetch_field($result, $field_offset);
        }
    }
}
