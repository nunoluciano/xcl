<?php
/**
 * Pico content management D3 module for XCL
 *
 * @package    Pico
 * @version    2.3.1
 * @author     Gigamaster, 2020 XCL PHP7
 * @author     Gijoe (Peak)
 * @copyright  Copyright 2005-2021 XOOPSCube Project 
 * @license    https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

class PicoTagHandler {

	var $mydirname;

	public function __construct( $mydirname ) {
		$this->mydirname = $mydirname;
	}

// get content_ids separated by comma 1,2,4,16
	function getContentIdsCS( $label ) {
		$db = XoopsDatabaseFactory::getDatabaseConnection();

		$sql = "SELECT content_ids FROM " . $db->prefix( $this->mydirname . "_tags" ) . " WHERE label=" . $db->quoteString( $label );
		if ( ! $trs = $db->query( $sql ) ) {
			if ( $GLOBALS['xoopsUser']->isAdmin() ) {
				echo $db->logger->dumpQueries();
			}
			exit;
		}

		if ( $db->getRowsNum( $trs ) <= 0 ) {
			return false;
		} else {
			list( $content_ids_sc ) = $db->fetchRow( $trs );

			return preg_replace( '/[^0-9,]/', '', $content_ids_sc );
		}
	}

}


class PicoTag {

	public $mydirname;

	public function __construct( $mydirname, $label ) {
	}

}
