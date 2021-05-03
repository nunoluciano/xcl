<?php
/**
 * Legacy_SQLScanner.class.php
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}

require_once XOOPS_ROOT_PATH . '/modules/legacy/lib/EasyLex/EasyLex_SQLScanner.class.php';

class Legacy_SQLScanner extends EasyLex_SQLScanner
{
    public $mDB_PREFIX = '';
    public $mDirname = '';

    public function setDB_PREFIX($prefix)
    {
        $this->mDB_PREFIX = $prefix;
    }

    public function setDirname($dirname)
    {
        $this->mDirname = $dirname;
    }

    public function &getOperations()
    {
        $t_lines = [];
        $t_tokens = [];
        $depth = 0;

        foreach (array_keys($this->mTokens) as $key) {
            if (EASYLEX_SQL_OPEN_PARENTHESIS == $this->mTokens[$key]->mType) {
                $depth++;
            } elseif (EASYLEX_SQL_CLOSE_PARENTHESIS == $this->mTokens[$key]->mType) {
                $depth--;
            }

            $t_tokens[] =& $this->mTokens[$key];

            if (count($t_tokens) > 1 && 0 == $depth) {
                if (EASYLEX_SQL_SEMICOLON == $this->mTokens[$key]->mType) {
                    $t_lines[] =& $t_tokens;
                    unset($t_tokens);
                    $t_tokens = [];
                } elseif (EASYLEX_SQL_LETTER == $this->mTokens[$key]->mType && ('CREATE' == strtoupper($this->mTokens[$key]->mValue) || 'ALTER' == strtoupper($this->mTokens[$key]->mValue) || 'INSERT' == strtoupper($this->mTokens[$key]->mValue))) {
                    array_pop($t_tokens);
                    $t_lines[] =& $t_tokens;
                    unset($t_tokens);
                    $t_tokens = [];
                    $t_tokens[] =& $this->mTokens[$key];
                }
            }
        }

        if (count($t_tokens) > 0) {
            $t_lines[] =& $t_tokens;
            unset($t_tokens);
        }

        //
        // Prepare array for str_replace()
        //
        $t_search = ['{prefix}', '{dirname}', '{Dirname}', '{_dirname_}'];
        $t_replace = [$this->mDB_PREFIX, strtolower($this->mDirname), ucfirst(strtolower($this->mDirname)), $this->mDirname];

        foreach (array_keys($t_lines) as $idx) {
            foreach (array_keys($t_lines[$idx]) as $op_idx) {
                $t_lines[$idx][$op_idx]->mValue = str_replace($t_search, $t_replace, $t_lines[$idx][$op_idx]->mValue);
            }
        }

        return $t_lines;
    }
}
