<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * Class AltsysBreadcrumbs - singleton for xoops_breadcrumbs
 * @package    Altsys
 * @version    2.3
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license    https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

class AltsysBreadcrumbs
{
    public $paths = [];

    /**
     * AltsysBreadcrumbs constructor.
     */
    public function __construct()
    {
    }

    /**
     * function getInstance()
     * @return \AltsysBreadcrumbs
     */
    public static function getInstance()
    {
        static $instance;

        if (!isset($instance)) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * @return array
     */
    public function getXoopsBreadcrumbs()
    {
        $ret = [];

        foreach ($this->paths as $val) {
            // delayed language constant

            if ('_' == mb_substr($val['name'], 0, 1) && defined($val['name'])) {
                $ret[] = [
                    'url' => $val['url'],
                    'name' => constant($val['name']),
                ];
            } else {
                $ret[] = $val;
            }
        }

        unset($ret[count($ret) - 1]['url']);

        return $ret;
    }

    /**
     * all data should be escaped
     * @param        $url_or_path
     * @param string $name
     */
    public function appendPath($url_or_path, $name = '...')
    {
        if (is_array($url_or_path)) {
            if (empty($url_or_path['name'])) {
                // multiple paths

                $this->paths = array_merge($this->paths, $url_or_path);
            } else {
                // array format (just a path)

                $this->paths[] = $url_or_path;
            }
        } else {
            // separate format
            $this->paths[] = ['url' => $url_or_path, 'name' => $name];
        }
    }

    /**
     * @return bool
     */
    public function hasPaths()
    {
        return !empty($this->paths);
    }
}
