<?php
/**
 * XCube_TextFilter.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 */

class XCube_TextFilter {
	public $mDummy;  //Dummy member for preventing object be treated as empty.

	public static function getInstance( &$instance ) {
		if ( empty( $instance ) ) {
			$instance = new self();
		}
	}

	public function toShow( $str ) {
		return htmlspecialchars( $str, ENT_QUOTES );
	}

	public function toEdit( $str ) {
		return htmlspecialchars( $str, ENT_QUOTES );
	}
}
