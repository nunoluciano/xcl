<?php
/**
 * *
 *  * Zip downloader
 *  *
 *  * @package    class
 *  * @subpackage core
 *  * @author     Original Authors: Minahito
 *  * @author     Other Authors : Kazumi Ono (aka onokazu)
 *  * @copyright  2005-2021 The XOOPSCube Project
 *  * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *  * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 *  * @version    v 1.1 2007/05/15 02:34:21 minahito, Release: @package_230@
 *  * @link       https://github.com/xoopscube/xcl
 * *
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}
include_once XOOPS_ROOT_PATH.'/class/downloader.php';
include_once XOOPS_ROOT_PATH.'/class/class.zipfile.php';

class XoopsZipDownloader extends XoopsDownloader
{
    public function __construct($ext = '.zip', $mimyType = 'application/x-zip')
    {
        $this->archiver = new zipfile();
        $this->ext      = trim($ext);
        $this->mimeType = trim($mimyType);
    }

    public function addFile($filepath, $newfilename=null)
    {
        // Read in the file's contents
        $fp = fopen($filepath, 'rb');
        $data = fread($fp, filesize($filepath));
        fclose($fp);
        $filename = (isset($newfilename) && '' !== trim($newfilename)) ? trim($newfilename) : $filepath;
        $filepath = is_file($filename) ? $filename : $filepath;
        $this->archiver->addFile($data, $filename, filemtime($filepath));
    }

    public function addBinaryFile($filepath, $newfilename=null)
    {
        // Read in the file's contents
        $fp = fopen($filepath, 'rb');
        $data = fread($fp, filesize($filepath));
        fclose($fp);
        $filename = (isset($newfilename) && '' !== trim($newfilename)) ? trim($newfilename) : $filepath;
        $filepath = is_file($filename) ? $filename : $filepath;
        $this->archiver->addFile($data, $filename, filemtime($filepath));
    }

    public function addFileData(&$data, $filename, $time=0)
    {
        $this->archiver->addFile($data, $filename, $time);
    }

    public function addBinaryFileData(&$data, $filename, $time=0)
    {
        $this->addFileData($data, $filename, $time);
    }

    public function download($name, $gzip = true)
    {
        $file = $this->archiver->file();
        $this->_header($name.$this->ext);
        header('Content-Type: application/zip') ;
        header('Content-Length: ' . (float)@strlen($file)) ;
        echo $file;
    }
}
