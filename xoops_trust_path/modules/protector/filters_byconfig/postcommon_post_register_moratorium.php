<?php
/**
 * Protector module for XCL
 *
 * @package    Protector
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPSCube Project 
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

define( 'PROTECTOR_POSTCOMMON_POST_REGISTER_MORATORIUM', 60 ); // minutes

class protector_postcommon_post_register_moratorium extends ProtectorFilterAbstract {
	public function execute() {
		global $xoopsUser;

		if ( ! is_object( $xoopsUser ) ) {
			return true;
		}

		$moratorium_result = (int) ( ( $xoopsUser->getVar( 'user_regdate' ) + PROTECTOR_POSTCOMMON_POST_REGISTER_MORATORIUM * 60 - time() ) / 60 );
		if ( $moratorium_result > 0 ) {
			if ( preg_match( '#(https?\:|\[\/url\]|www\.)#', serialize( $_POST ) ) ) {
				$message                  = sprintf( _MD_PROTECTOR_FMT_REGISTER_MORATORIUM, $moratorium_result );
				$this->protector->message .= $message . '(' . serialize( $_POST ) . ')';
				$this->protector->output_log( 'Moratorium', 0, false, 128 );
				die( $message );
			}
		}
	}
}
