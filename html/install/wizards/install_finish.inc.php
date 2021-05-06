<?php

include './language/' . $language . '/finish.php'; //This will set message to $content;

$wizard->assign( 'finish', $content );
$wizard->render( 'install_finish.tpl.php' );
