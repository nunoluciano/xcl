<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
include_once './class/textsanitizer.php';

/**
 * setting manager for XOOPS installer
 *
 * @author Haruki Setoyama  <haruki@planewave.org>
 * @version $Id: settingmanager.php,v 1.2 2008/02/23 01:45:50 nobunobu Exp $
 * @access public
 **/
class setting_manager
{

    public $database;
    public $dbhost;
    public $dbuname;
    public $dbpass;
    public $dbname;
    public $prefix;
    public $db_pconnect;
    public $root_path;
    public $trust_path;
    public $xoops_url;

    public $salt;

    public $sanitizer;

    public function __construct($post = false)
    {
        $this->sanitizer = TextSanitizer::getInstance();
        if ($post) {
            $this->readPost();
        } else {
            $this->database = 'mysql';
            $this->dbhost = 'localhost';

            //
            // Generate prefix
            // !Fix A non well formed numeric value
            //mt_srand((int)microtime() * 10000);
            mt_srand ( (double)microtime () * 1000000 );
            do {
                $this->prefix = substr(md5( random_int(1, 6)), 0, 6);
            } while (!preg_match('/^[a-z]/', $this->prefix));

            $this->salt = substr(md5(mt_rand()), 5, 8);

            $this->db_pconnect = 0;

            $this->root_path = str_replace('\\', '/', getcwd()); // "
            $this->root_path = str_replace('/install', '', $this->root_path);

            $filepath = (!empty($_SERVER['REQUEST_URI']))
                ? dirname($_SERVER['REQUEST_URI'])
                : dirname($_SERVER['SCRIPT_NAME']);

            // "
            $filepath = str_replace(['\\', '/install'], ['/', ''], $filepath);
            if ('/' === substr($filepath, 0, 1)) {
                $filepath = substr($filepath, 1);
            }
            if ('/' === substr($filepath, -1)) {
                $filepath = substr($filepath, 0, -1);
            }
            $protocol = (!empty($_SERVER['HTTPS']) && ('on' === $_SERVER['HTTPS'])) ? 'https://' : 'http://';
            $this->xoops_url = (!empty($filepath)) ? $protocol . $_SERVER['HTTP_HOST'] . '/' . $filepath : $protocol . $_SERVER['HTTP_HOST'];
            // find xoops_trust_path
            $path = $this->root_path;
            while (strlen($path) > 4) {
                if (is_dir($path . '/xoops_trust_path')) {
                    $this->trust_path = $path . '/xoops_trust_path';
                    break;
                }
                $path = dirname($path);
            }
        }
    }

    public function readPost()
    {
        if (isset($_POST['database'])) {
            $this->database = $this->sanitizer->stripSlashesGPC($_POST['database']);
        }
        if (isset($_POST['dbhost'])) {
            $this->dbhost = $this->sanitizer->stripSlashesGPC($_POST['dbhost']);
        }
        if (isset($_POST['dbuname'])) {
            $this->dbuname = $this->sanitizer->stripSlashesGPC($_POST['dbuname']);
        }
        if (isset($_POST['dbpass'])) {
            $this->dbpass = $this->sanitizer->stripSlashesGPC($_POST['dbpass']);
        }
        if (isset($_POST['dbname'])) {
            $this->dbname = $this->sanitizer->stripSlashesGPC($_POST['dbname']);
        }
        if (isset($_POST['prefix'])) {
            $this->prefix = $this->sanitizer->stripSlashesGPC($_POST['prefix']);
        }
        if (isset($_POST['db_pconnect'])) {
            $this->db_pconnect = (int)$_POST['db_pconnect'] > 0 ? 1 : 0;
        }
        if (isset($_POST['root_path'])) {
            $this->root_path = $this->sanitizer->stripSlashesGPC($_POST['root_path']);
        }
        if (isset($_POST['trust_path'])) {
            $this->trust_path = $this->sanitizer->stripSlashesGPC($_POST['trust_path']);
        }
        if (isset($_POST['xoops_url'])) {
            $this->xoops_url = $this->sanitizer->stripSlashesGPC($_POST['xoops_url']);
        }
        if (isset($_POST['salt'])) {
            $this->salt = $this->sanitizer->stripSlashesGPC($_POST['salt']);
        }
    }

    public function readConstant()
    {
        if (defined('XOOPS_DB_TYPE')) {
            $this->database = XOOPS_DB_TYPE;
        }
        if (defined('XOOPS_DB_HOST')) {
            $this->dbhost = XOOPS_DB_HOST;
        }
        if (defined('XOOPS_DB_USER')) {
            $this->dbuname = XOOPS_DB_USER;
        }
        if (defined('XOOPS_DB_PASS')) {
            $this->dbpass = XOOPS_DB_PASS;
        }
        if (defined('XOOPS_DB_NAME')) {
            $this->dbname = XOOPS_DB_NAME;
        }
        if (defined('XOOPS_DB_PREFIX')) {
            $this->prefix = XOOPS_DB_PREFIX;
        }
        if (defined('XOOPS_DB_PCONNECT')) {
            $this->db_pconnect = (int)XOOPS_DB_PCONNECT > 0 ? 1 : 0;
        }
        if (defined('XOOPS_ROOT_PATH')) {
            $this->root_path = XOOPS_ROOT_PATH;
        }
        if (defined('XOOPS_TRUST_PATH')) {
            $this->trust_path = XOOPS_TRUST_PATH;
        }
        if (defined('XOOPS_URL')) {
            $this->xoops_url = XOOPS_URL;
        }
        if (defined('XOOPS_SALT')) {
            $this->salt = XOOPS_SALT;
        }
    }

    public function checkData()
    {
        $ret = '';
        $error = [];

        if (empty($this->dbhost)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L27);
        }
        if (empty($this->dbname)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L29);
        }
        if (empty($this->prefix)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L30);
        }
        if (empty($this->salt)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_LANG_XOOPS_SALT);
        }
        if (empty($this->root_path)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L55);
        }
        if (empty($this->trust_path)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L55);
        }
        if (empty($this->xoops_url)) {
            $error[] = sprintf(_INSTALL_L57, _INSTALL_L56);
        }

        if (!empty($error)) {
            foreach ($error as $err) {
                $ret .= '<p class="confirmError">' . $err . '</p>';
            }
        }

        return $ret;
    }

    public function editform()
    {
        $ret =
            '<h3>' . _INSTALL_L51 . '</h3>
            <span style="font-size:85%;">' . _INSTALL_L66 . '</span>
            <br>
            <select size="1" name="database" id="database">';
        $dblist = $this->getDBList();
        foreach ($dblist as $val) {
            $ret .= '<option value="' . $val . '"';
            if ($val === $this->database) {
                $ret .= ' selected="selected"';
            }
            $ret .= '>' . $val . '</option>';
        }
        $ret .= '</select> ';
        $ret .= $this->editform_sub(_INSTALL_L27, _INSTALL_L67, 'dbhost', $this->sanitizer->htmlSpecialChars($this->dbhost));
        $ret .= $this->editform_sub(_INSTALL_L28, _INSTALL_L65, 'dbuname', $this->sanitizer->htmlSpecialChars($this->dbuname));
        $ret .= $this->editform_sub(_INSTALL_L52, _INSTALL_L68, 'dbpass', $this->sanitizer->htmlSpecialChars($this->dbpass));
        $ret .= $this->editform_sub(_INSTALL_L29, _INSTALL_L64, 'dbname', $this->sanitizer->htmlSpecialChars($this->dbname));
        $ret .= $this->editform_sub(_INSTALL_L30, _INSTALL_L63, 'prefix', $this->sanitizer->htmlSpecialChars($this->prefix));
        $ret .= $this->editform_sub(_INSTALL_LANG_XOOPS_SALT, _INSTALL_LANG_XOOPS_SALT_DESC, 'salt', $this->sanitizer->htmlSpecialChars($this->salt));

        $ret .= '<h3>' . _INSTALL_L54 . '</h3>
                <p><span style="font-size:85%;">' . _INSTALL_L69 . '</span>
                <input type="radio" name="db_pconnect" value="1"' . (1 === $this->db_pconnect ? ' checked="checked"' : '') . '>' . _INSTALL_L23 . '
                <input type="radio" name="db_pconnect" value="0"' . (1 !== $this->db_pconnect ? ' checked="checked"' : '') . '>' . _INSTALL_L24 . '
                </p>';

        $ret .= $this->editform_sub(_INSTALL_L55, _INSTALL_L59, 'root_path', $this->sanitizer->htmlSpecialChars($this->root_path));
        $ret .= $this->editform_sub(_INSTALL_L75, _INSTALL_L76, 'trust_path', $this->sanitizer->htmlSpecialChars($this->trust_path));
        $ret .= $this->editform_sub(_INSTALL_L56, _INSTALL_L58, 'xoops_url', $this->sanitizer->htmlSpecialChars($this->xoops_url));

        return $ret;
    }

    public function editform_sub($title, $desc, $name, $value)
    {
        return '<h3>' . $title . '</h3>
                <p><span style="font-size:85%;">' . $desc . '</span><br>
                <input type="text" name="' . $name . '" id="' . $name . '" size="30" maxlength="100" value="' . htmlspecialchars($value, ENT_QUOTES | ENT_HTML5) . '">
                </p>';
    }

    public function confirmForm()
    {
        $yesno = empty($this->db_pconnect) ? _INSTALL_L24 : _INSTALL_L23;
        $ret =
            '<h3>' . _INSTALL_L51 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->database) . '</p>
            <h3>' . _INSTALL_L27 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->dbhost) . '</p>
            <h3>' . _INSTALL_L28 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->dbuname) . '</p>
            <h3>' . _INSTALL_L52 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->dbpass) . '</p>
            <h3>' . _INSTALL_L29 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->dbname) . '</p>
            <h3>' . _INSTALL_L30 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->prefix) . '</p>
            <h3>' . _INSTALL_LANG_XOOPS_SALT . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->salt) . '</p>
            <h3>' . _INSTALL_L54 . '</h3>
            <p class="data">' . $yesno . '</p>
            <h3>' . _INSTALL_L55 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->root_path) . '</p>
            <h3>' . _INSTALL_L75 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->trust_path) . '</p>
            <h3>' . _INSTALL_L56 . '</h3>
            <p class="data">' . $this->sanitizer->htmlSpecialChars($this->xoops_url) . '</p>
            <br>
            <input type="hidden" name="database" value="' . $this->sanitizer->htmlSpecialChars($this->database) . '" />
            <input type="hidden" name="dbhost" value="' . $this->sanitizer->htmlSpecialChars($this->dbhost) . '" />
            <input type="hidden" name="dbuname" value="' . $this->sanitizer->htmlSpecialChars($this->dbuname) . '" />
            <input type="hidden" name="dbpass" value="' . $this->sanitizer->htmlSpecialChars($this->dbpass) . '" />
            <input type="hidden" name="dbname" value="' . $this->sanitizer->htmlSpecialChars($this->dbname) . '" />
            <input type="hidden" name="prefix" value="' . $this->sanitizer->htmlSpecialChars($this->prefix) . '" />
            <input type="hidden" name="salt" value="' . $this->sanitizer->htmlSpecialChars($this->salt) . '" />
            <input type="hidden" name="db_pconnect" value="' . (int)$this->db_pconnect . '" />
            <input type="hidden" name="root_path" value="' . $this->sanitizer->htmlSpecialChars($this->root_path) . '" />
            <input type="hidden" name="trust_path" value="' . $this->sanitizer->htmlSpecialChars($this->trust_path) . '" />
            <input type="hidden" name="xoops_url" value="' . $this->sanitizer->htmlSpecialChars($this->xoops_url) . '" />
            ';
        return $ret;
    }


    public function getDBList()
    {
        return [extension_loaded('mysql') ? 'mysql' : 'mysqli'];
        //$dirname = '../class/database/';
        //$dirlist = array();
        //if (is_dir($dirname) && $handle = opendir($dirname)) {
        //    while (false !== ($file = readdir($handle))) {
        //        if ( !preg_match("/^[.]{1,2}$/",$file) ) {
        //            if (strtolower($file) != 'cvs' && is_dir($dirname.$file) ) {
        //                $dirlist[$file] = strtolower($file);
        //            }
        //        }
        //   }
        //    closedir($handle);
        //    asort($dirlist);
        //    reset($dirlist);
        //}
        //return $dirlist;
    }
}
