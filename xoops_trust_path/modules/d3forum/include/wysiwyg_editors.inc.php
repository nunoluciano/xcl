<?php

if (empty($_POST['body_editor'])) {
    $body_editor = @$xoopsModuleConfig['body_editor'];
} else {
    $body_editor = $_POST['body_editor'];

    // normal (xoopsdhtmltarea)
    $d3forum_wysiwyg_body = '';
    $d3forum_wysiwyg_header = '';

}

