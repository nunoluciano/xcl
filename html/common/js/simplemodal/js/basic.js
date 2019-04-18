/*
 * SimpleModal Basic Modal Dialog
 * https://simplemodal.com
 *
 * Copyright (c) 2013 Eric Martin - https://ericmmartin.com
 *
 * Licensed under the MIT license:
 *   https://www.opensource.org/licenses/mit-license.php
 */

jQuery(function ($) {
	// Load dialog on page load
	//$('#basic-modal-content').modal();

	// Load dialog on click
	$('#basic-modal .basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
});