<?php
/**
 * XCube_RenderCache.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

class XCube_RenderCache {
	public $mCacheId;
	public $mResourceName;

	public function __construct() {
	}

	/**
	 * @param null $cachetime
	 *
	 * @return void
	 */
	public function isCache( $cachetime = null ) {
	}

	/**
	 * @return bool
	 */
	public function enableCache() {
		return true;
	}

	public function setResourceName( $name ) {
		$this->mResourceName = $name;
	}

	/**
	 * @return string
	 */
	public function getCacheId() {
	}

	/**
	 * @return string
	 */
	public function _getFileName() {
	}

	public function save( $renderTarget ) {
		if ( $this->enableCache() ) {
			$filename = $this->_getFileName();
			$fp       = fopen( $filename, 'wb' );
			fwrite( $fp, $renderTarget->getResult() );
			fclose( $fp );
		}
	}

	public function load() {
		if ( $this->isCache() ) {
			return file_get_contents( $this->_getFileName() );
		}
	}

	public function clear() {
	}

	public function reset() {
		$this->mResourceName = null;
	}
}
