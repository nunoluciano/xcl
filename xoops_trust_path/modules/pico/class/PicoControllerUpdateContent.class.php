<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package XCL
 * @subpackage Pico
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once __DIR__ . '/PicoControllerAbstract.class.php';
require_once __DIR__ . '/PicoModelCategory.class.php';
require_once __DIR__ . '/PicoModelContent.class.php';
require_once __DIR__ . '/gtickets.php';
require_once dirname( __DIR__ ) . '/include/transact_functions.php';
require_once dirname( __DIR__ ) . '/include/history_functions.php';

class PicoControllerUpdateContent extends PicoControllerAbstract {

	//var $mydirname = '' ;
	//var $mytrustdirname = '' ;
	//var $assign = array() ;
	//var $mod_config = array() ;
	//var $uid = 0 ;
	//var $currentCategoryObj = null ;
	//var $permissions = array() ;
	//var $is_need_header_footer = true ;
	//var $template_name = '' ;
	//var $html_header = '' ;
	//var $contentObjs = array() ;

	public $contentObj;

	public function execute( $request ) {
		// Ticket Check
		if ( ! $GLOBALS['xoopsGTicket']->check( true, 'pico' ) ) {
			redirect_header( XOOPS_URL . '/', 3, $GLOBALS['xoopsGTicket']->getErrors() );
		}

		parent::execute( $request );

		// contentObj
		$cat_data         = $this->currentCategoryObj->getData();
		$this->contentObj = new PicoContent( $this->mydirname, $request['content_id'], $this->currentCategoryObj );

		// check existence
		if ( $this->contentObj->isError() ) {
			redirect_header( XOOPS_URL . "/modules/$this->mydirname/index.php", 2, _MD_PICO_ERR_READCONTENT );
			exit;
		}
		$content_data = $this->contentObj->getData();

		// permission check
		if ( empty( $content_data['can_edit'] ) ) {
			if ( $content_data['locked'] ) {
				redirect_header( XOOPS_URL . '/', 2, _MD_PICO_ERR_LOCKEDCONTENT );
				exit;
			}

			redirect_header( XOOPS_URL . '/', 2, _MD_PICO_ERR_EDITCONTENT );
			exit;
		}

		// update the content
		pico_updatecontent( $this->mydirname, $request['content_id'], $cat_data['post_auto_approved'], $cat_data['isadminormod'] );
		$content_uri4html = XOOPS_URL . "/modules/$this->mydirname/" . pico_common_make_content_link4html( $this->mod_config, $request['content_id'], $this->mydirname );

		// return uri
		if ( ! empty( $_GET['ret'] ) && ( $ret_uri = pico_main_parse_ret2uri( $this->mydirname, $_GET['ret'] ) ) ) {
			$ret_uri4html = htmlspecialchars( $ret_uri, ENT_QUOTES );
		} else {
			$ret_uri4html = $content_uri4html;
		}

		// calling a delegate
		if ( class_exists( 'XCube_DelegateUtils' ) ) {
			XCube_DelegateUtils::raiseEvent( 'ModuleClass.Pico.Contentman.UpdateSuccess', $this->mydirname, $request['content_id'], $cat_data, $ret_uri4html );
		}

		if ( $cat_data['post_auto_approved'] ) {
			// message "modified"
			redirect_header( $ret_uri4html, 2, _MD_PICO_MSG_CONTENTUPDATED );
		} else {
			// Notify for new waiting content (only for admin or mod)
			$users2notify = pico_main_get_moderators( $this->mydirname, $cat_data['id'] );
			if ( empty( $users2notify ) ) {
				$users2notify = [ 0 ];
			}
			pico_main_trigger_event( $this->mydirname, 'global', 0, 'waitingcontent', [ 'CONTENT_URL' => XOOPS_URL . "/modules/$this->mydirname/index.php?page=contentmanager&content_id=" . $request['content_id'] ], $users2notify );
			// message "waiting approval"
			redirect_header( $ret_uri4html, 2, _MD_PICO_MSG_CONTENTWAITINGUPDATE );
		}

		// view
		$this->is_need_header_footer = false;
	}

	public function render( $target = null ) {
		exit;
	}
}
