<?php
/**
 * D3Forum module for XCL
 *
 * @package    D3Forum
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPS Cube Project
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

require_once __DIR__ . '/D3forumAntispamDefault.class.php';

class D3forumAntispamDefaultmobile extends D3forumAntispamDefault {

	public function checkValidate() {
		if ( $this->isMobile() ) {
			return true;
		}

		return parent::checkValidate();
	}

}
