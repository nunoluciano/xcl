<?php
/**
 * XCube_RoleManager.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @brief The provider class which handles role information with the store.
 */

class XCube_RoleManager {
	public function getRolesForUser( $username = null ) {
	}
}

/**
 * The utility class which handles role information without the root object.
 */
class XCube_Role {
	public function getRolesForUser( $username = null ) {
		$root =& XCube_Root::getSingleton();

		return $root->mRoleManager->getRolesForUser( $username );
	}
}
