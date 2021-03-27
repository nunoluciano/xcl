<?php
/**
 * D3Forum module for XCL
 *
 * @package XCL
 * @subpackage D3Forum
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once __DIR__ . '/D3forumAntispamDefault.class.php';

class D3forumAntispamDefaultmobilesmart extends D3forumAntispamDefault {

	public function checkValidate() {
		if ( $this->isMobile() ) {
			return true;
		}

		return parent::checkValidate();
	}

	public function isMobile() {
		if ( class_exists( 'Wizin_User' ) ) {
			// WizMobile (gusagi)
			$user =& Wizin_User::getSingleton();

			return $user->bIsMobile;
		}

		if ( defined( 'HYP_K_TAI_RENDER' ) && HYP_K_TAI_RENDER && HYP_K_TAI_RENDER != 2 ) {
			// hyp_common ktai-renderer (nao-pon)
			return true;
		}

		return false;
	}

}
