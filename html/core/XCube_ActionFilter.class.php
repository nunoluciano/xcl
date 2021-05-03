<?php
/**
 * XCube_ActionFilter.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @public
 * @brief [Abstract] Used for initialization, post-processing and other purposes by the controller.
 *
 *    This class is chained and called by the initialization procedure of the
 *    controller class. Developers or users can use the subclass to customize dynamically.
 *
 *    Users usually do not need to add filters because each controller
 *    have sufficient initialization code.
 *    This class is used in case of special customization of modules and users.
 *
 *    A controller must not use this class in its initialization procedure.
 *
 *    Two member functions are called by the controller at the proper time.
 *    The timing is different for each controller.
 *
 * \par Abstract Class
 *    This class is an abstract class.
 */

class XCube_ActionFilter {
	/**
	 * @protected
	 * @brief [READ ONLY] XCube_Controller
	 */
	public $mController;

	/**
	 * @protected
	 * @brief [READ ONLY] XCube_Root
	 */
	public $mRoot;

	/**
	 * @public
	 * @brief Constructor.
	 *
	 * @param $controller XCube_Controller
	 */
	public function __construct( &$controller ) {
		$this->mController =& $controller;
		$this->mRoot       =& $this->mController->mRoot;
	}

	/**
	 * @public
	 * @brief [Abstract] Executes the logic, when the controller executes preFilter().
	 * @remarks
	 *     This method is called at the very beginning of the controller initialization process,
	 *     some of the filters may not be called if these filters are registered later.
	 */
	public function preFilter() {
	}

	/**
	 * @public
	 * @brief [Abstract] Executes the logic, when the controller executes preBlockFilter().
	 * @remarks
	 *      Each controller has different timing when it calls preBlockFilter().
	 */
	public function preBlockFilter() {
	}

	/**
	 * @public
	 * @brief [Abstract] Executes the logic, when the controller executes postFilter().
	 * @remarks
	 *      Each controller has different timing when it calls postFilter().
	 */
	public function postFilter() {
	}
}
