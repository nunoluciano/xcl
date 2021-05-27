<?php
/**
 * XCube_Permission.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @brief XCube_PermissionUtils
 * Note:
 * In some other languages, such as C, a void function can't be used in an expression, only as a statement.
 * IDEs and other tools can warn the user when the return value of a void function is being used.
 * It isn't strictly necessary for the language itself to cover this.
 * https://wiki.php.net/rfc/void_return_type#use_of_void_functions_in_expressions
 */

class XCube_Permissions {
	public function getRolesOfAction() {
		$args       = func_get_args();
		$actionName = array_shift( $args );

		$root =& XCube_Root::getSingleton();

		return $root->mPermissionManager->getRolesOfAction( $actionName, $args );
	}
}

class XCube_AbstractPermissionProvider {
	public function __construct() {
	}

	public function prepare() {
	}

	public function getRolesOfAction( $actionName, $args ) {
	}
}
