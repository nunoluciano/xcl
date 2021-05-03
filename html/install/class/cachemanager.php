<?php
/**
 * cache_manager for XOOPS installer
 * @package XCL
 * @subpackage Installer
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Haruki Setoyama  <haruki@planewave.org>
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */


class cache_manager {

	public $s_files = [];
	public $f_files = [];

	public function write( $file, $source ) {
		if ( false !== $fp = fopen( XOOPS_CACHE_PATH . '/' . $file, 'wb' ) ) {
			fwrite( $fp, $source );
			fclose( $fp );
			$this->s_files[] = $file;
		} else {
			$this->f_files[] = $file;
		}
	}

	public function report() {
		$reports = [];
		foreach ( $this->s_files as $val ) {
			$reports[] = _OKIMG . sprintf( _INSTALL_L123, "<b>$val</b>" );
		}
		foreach ( $this->f_files as $val ) {
			$reports[] = _NGIMG . sprintf( _INSTALL_L124, "<b>$val</b>" );
		}

		return $reports;
	}
}
