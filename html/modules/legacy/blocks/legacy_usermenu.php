<?php
/**
 *
 * @package XOOPS2
 * @version $Id: legacy_usermenu.php,v 1.3 2008/09/25 15:12:13 kilica Exp $
 * @copyright Copyright (c) 2000 XOOPS.org  <https://www.xoops.org/>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 *
 */
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: https://www.myweb.ne.jp/, https://www.xoops.org/, https://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
//  This file has been modified for Legacy from XOOPS2 System module block   //
// ------------------------------------------------------------------------- //


 /**
  * This function is called back to display the user menu.
  * 
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
