<?php

define('_MD_PICO_FILTERS_XPWIKIINITWEIGHT', 15);

define('_MD_PICO_FILTERS_XPWIKIEDITOR', 'bbcode');
define('_MD_PICO_FILTERS_XPWIKICSSCLASS', '');
define('_MD_PICO_FILTERS_XPWIKIUSEHTMLATNEW', false);
define('_MD_PICO_FILTERS_XPWIKIDISABLEONHTML', true);

function pico_xpwiki($mydirname, $text, $content4assign)
{
	@include_once XOOPS_TRUST_PATH . "/modules/xpwiki/include.php";

	if (!class_exists('XpWiki')) die('xpWiki is not installed correctly');

	// �����ϡ�xpWiki�򥤥󥹥ȡ��뤷���ǥ��쥯�ȥ�̾�Ǥ���
	$wiki = new XpWiki('xpwiki'); // create instance. option is xpWiki module's directory name.

	// ��������ϡ�xpWiki��CSS��Ŭ�Ѥ��뤿���DIV���饹̾�Ǥ���
	return $wiki->transform($text, 'pico_body');
}
