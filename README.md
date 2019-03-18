# X-elFinder

A modular version of the web-based file manager [elFinder 2.0](http://elfinder.org/) that works with JavaScript + PHP for XCL.

Installing this module with XCL wizard will automatically replace the default image manager.

## Download

* You can clone or download the module from XCL repo.
* X-elfinder is released with XCL package ensuring backwards copatibility
* For any other Xoops package download from [nao-pon/xelfinder - GitHub](https://github.com/nao-pon/xelfinder)

For issues, questions and requests regarding X-elFinder you can use the XCL **Issue** tracker of Github.

Japanese support available at the forum :

* [X-elFinder- Forums XOOPS Mania](http://xoops.hypweb.net/modules/forum/index.php?forum_id=25)


## Requirements

* XOOPS based platform
 * Tested with the following packages:
  * XOOPS Cube Legacy 2.2.0, 2.2.1, 2.3.0
  * XOOPS 2.1.16-JP
  * XOOPS 2.5.5
* PHP 5.2 or higher

## Installation

* Install from XCL modules management following the GUI wizard steps.
* Install manually. You need write permissions (such as 777 or 707) in the following directories to create files:

* html/modules/xelfinder/cache
* html/modules/xelfinder/cache/tmb
* xoops_trust_path/uploads/xelfinder

Although PathInfo is used for image reference, depending on the server environment, PathInfo may not be used and may not be displayed properly.

In this case, set "Disable PathInfo of file reference URL" to "Yes" in the general settings of the management screen.

### How to change the popup to IFRAME

The X-elFinder popup uses openWithSelfMain () which is included in xoops.js, but openWithSelfMain () opens another window. If you want to change this to an IFRAME, you can change the file theme.html to load <{$xoops_js}> and then load  openWithSelfMain_iframe.js.

* HypConf (setting of HypCommon module) in "other settings" set to "tag inserted at the end of < head >"

 `<script type="text/javascript" src="<{$xoops_url}>/modules/xelfinder/include/js/openWithSelfMain_iframe.js"></script>`

Add or edit theme.html as follows:

Example (theme.html):

    `<script type="text/javascript">
    <!--
    <{$xoops_js}>
    //-->
    </script>
    <script type="text/javascript" src="<{$xoops_url}>/modules/xelfinder/include/js/openWithSelfMain_iframe.js"></script>`

## X-elFinder main features

In addition to the default elFinder, X-elfinder has the following features.

* Drag and drop file upload between browser windows (Firefox, Chrome, Safari)
* Image editing using Pixlr.com
* Direct management of cloud storage with [Dropbox.com](http://db.tt/w0gZJglT) ( [Here you can get 500MB bonus](http://db.tt/w0gZJglT) for new registration & installation)
* Permissions and restrictions can be specified for each group
* Add a plug-in type volume (like a drive)
    * Group ID can be specified for each volume
    * Detailed response by the xelfinder_db plug-in
        * User-specific folder
        * Group folder
        * Guest folder
        * Folder and file permissions (read, write, unlock, hide can be set for owner, group, guest respectively)
        * Set permissions of new items per folder
    * Specify an arbitrary directory in the server and manipulate image files in that directory with the xelfinder plug-in
    * Includes plug-ins for XOOPS d3diary, GNAVI, MailBBS and MyAlbum modules
        * Available images stored relatively to each module

## Image Manager

* XCL ensures backwards compatibility
* Other Xoops packages require a simple edit of the file imagemanager.php

Edit imagemanager.php and add the following include after the line mainfile.php :

    `include 'modules/xelfinder/manager.php';`

Save and it's done.

## Uninstallation

If you uninstall X-elfinder, the uploaded files will remain, but all information about folders, permissions and owners will be lost.

If you want to save such information, backup first your database.

The table name of X-elFinder starts with "[XOOPS DB prefix] [X-elFinder module directory name] ".

If you want to uninstall and delete all the uploaded files, just find the ".../uploads/xelfinder" directory.
