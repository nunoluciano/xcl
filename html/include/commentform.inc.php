<?php
/**
 * *
 *  * Comment form
 *  *
 *  * @package    Legacy
 *  * @subpackage comment
 *  * @author     Original Authors: Minahito
 *  * @author     Other Authors : Kazumi Ono (aka onokazu)
 *  * @copyright  2005-2020 The XOOPSCube Project
 *  * @license    Legacy : https://github.com/xoopscube/xcl/blob/master/GPL_V2.txt
 *  * @license    Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 *  * @version    v 1.1 2007/05/15 02:34:19 minahito, Release: @package_230@
 *  * @link       https://github.com/xoopscube/xcl
 * *
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
$cform->addElement(new XoopsFormText(_CM_TITLE, 'subject', 50, 255, $subject), true);
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
