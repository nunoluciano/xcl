<?php

if (file_exists(__DIR__ . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/modinfo.php')) {
    include_once __DIR__ . '/language/' . $GLOBALS['xoopsConfig']['language'] . '/modinfo.php';
} elseif (file_exists(__DIR__ . '/language/english/modinfo.php')) {
    include_once __DIR__ . '/language/english/modinfo.php';
}

$controllers = [
    'myblocksadmin',
    'compilehookadmin',
    'get_templates',
    'get_tplsvarsinfo',
    'mypreferences',
    'mytplsadmin',
    'mytplsform',
    'put_templates',
    'mylangadmin',
];
