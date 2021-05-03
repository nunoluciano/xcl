<?php
/**
 * legacy_usermenu.php
 * XOOPS2
 * @package   Legacy
 * @version   2.3.0
 * @author    Gigamaster, XCL 2020 PHP7
 * @author    kilica, 2008/09/25
 * @author    Kazumi Ono (AKA onokazu)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 * @license   https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt Modified BSD license
 * @brief     This function is called back to display the user menu.
 * [Template Variables]
 *  $block.uid ... Curent user id for the menu.
 *  $block.flagShowInbox ... If there is the pm module, set true.
 *  $block.inbox_url ... Return url to access inbox of pm.
 *  $block.new_messages ... amount of unread messages.
 */

function b_legacy_usermenu_show()
{
    $root =& XCube_Root::getSingleton();
    $xoopsUser =& $root->mController->mRoot->mContext->mXoopsUser;

    if (is_object($xoopsUser)) {
        $block = [];
        
        $block['uid'] = $xoopsUser->get('uid');
        $block['flagShowInbox'] = false;

        //
        // Check does this system have PrivateMessage feature.
        //
        $url = null;
        $service =& $root->mServiceManager->getService('privateMessage');
        if (null != $service) {
            $client =& $root->mServiceManager->createClient($service);
            $url = $client->call('getPmInboxUrl', ['uid' => $xoopsUser->get('uid')]);
            
            if (null != $url) {
                $block['inbox_url'] = $url;
                $block['new_messages'] = $client->call('getCountUnreadPM', ['uid' => $xoopsUser->get('uid')]);
                $block['flagShowInbox']=true;
            }
        }
        
        $block['show_adminlink'] = $root->mContext->mUser->isInRole('Site.Administrator');

        return $block;
    }
    return false;
}
