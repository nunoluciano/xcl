<?php

// common prepend
require dirname(dirname(__FILE__)) . '/include/common_prepend.inc.php';

// controller
require_once dirname(dirname(__FILE__)) . '/class/PicoControllerVoteContent.class.php';
$controller = new PicoControllerVoteContent($currentCategoryObj);
$controller->execute($picoRequest);
$controller->render();
