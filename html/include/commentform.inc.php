<?php
/**
 * Comment form
 * @package Legacy
 * @subpackage comment
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito
 * @author Kazumi Ono (aka onokazu)
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 */

if (!defined('XOOPS_ROOT_PATH')) {
    exit();
}
include_once XOOPS_ROOT_PATH . '/class/xoopslists.php';
include XOOPS_ROOT_PATH . '/class/xoopsformloader.php';
$cform = new XoopsThemeForm(_CM_POSTCOMMENT, 'commentform', 'postcomment.php');
if (!preg_match('/^re:/i', $subject)) {
    $subject = 'Re: ' . xoops_substr($subject, 0, 56);
}
$cform->addElement(new XoopsFormText(_CM_TITLE, 'subject', 50, 191, $subject), true);
$icons_radio = new XoopsFormRadio(_MESSAGEICON, 'icon', $icon);
$subject_icons = XoopsLists::getSubjectsList();
foreach ($subject_icons as $iconfile) {
    $icons_radio->addOption($iconfile, '<img src="'.XOOPS_URL.'/images/subject/'.$iconfile.'" alt="" />');
}
$cform->addElement($icons_radio);
$cform->addElement(new XoopsFormDhtmlTextArea(_CM_MESSAGE, 'message', $message, 10, 50), true);
$option_tray = new XoopsFormElementTray(_OPTIONS, '<br>');
if ($xoopsUser) {
    if (1 == $xoopsConfig['anonpost']) {
        $noname_checkbox = new XoopsFormCheckBox('', 'noname', $noname);
        $noname_checkbox->addOption(1, _POSTANON);
        $option_tray->addElement($noname_checkbox);
    }
    if ($xoopsUser->isAdmin($xoopsModule->getVar('mid'))) {
        $nohtml_checkbox = new XoopsFormCheckBox('', 'nohtml', $nohtml);
        $nohtml_checkbox->addOption(1, _DISABLEHTML);
        $option_tray->addElement($nohtml_checkbox);
    }
}
$smiley_checkbox = new XoopsFormCheckBox('', 'nosmiley', $nosmiley);
$smiley_checkbox->addOption(1, _DISABLESMILEY);
$option_tray->addElement($smiley_checkbox);

$cform->addElement($option_tray);
$cform->addElement(new XoopsFormHidden('pid', (int)$pid));
$cform->addElement(new XoopsFormHidden('comment_id', (int)$comment_id));
$cform->addElement(new XoopsFormHidden('item_id', (int)$item_id));
$cform->addElement(new XoopsFormHidden('order', (int)$order));
$button_tray = new XoopsFormElementTray('', '&nbsp;');
$button_tray->addElement(new XoopsFormButton('', 'preview', _PREVIEW, 'submit'));
$button_tray->addElement(new XoopsFormButton('', 'post', _CM_POSTCOMMENT, 'submit'));
$cform->addElement($button_tray);
$cform->display();
