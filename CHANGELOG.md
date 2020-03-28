# Change Log

All notable changes to this project will be documented in this file.

- Format based on [Keep A Change Log](https://keepachangelog.com/en/1.0.0/).
- This project adheres to [Semantic Versioning](https://semver.org/).

## [unreleased] 2020-02-29

### Added

- jQuery to common/js

### Changed

- Admin Dashboard
- Admin Template Module Card
- Admin Template Install List
- Render Local Javascripts

### Fixed

- Xupdate AbstractAction
- Xupdate ModuleStore Handler

### Removed

- Render CDN Javascripts

### Update

- X-elFinder version 2.53

## [unreleased] 2019-12-19

### Added

- Admin Theme version 0.0.4
- Buttons ( custom properties )
- Cards ( custom properties )
- Components ( Admin Templates: sections filter, sort )
- HTML5 Web Storage ( local storage )
- @media ( prefers-color-scheme: dark )
- @media ( prefers-reduced-motion: reduce )
- Select color-mode Light or Dark 
- Script fallback to local
- UI-root components custom properties

### Changed

- Accessible Rich Internet Applications ( ARIA ) 
- Cards ( clean-up components html and css ) 
- Components ( Admin Templates ) 
- Custom Properties (alphabetical order ) 
- HTML5 Layout ( simple and scalable ) 
- Legacy Render System ( header script ) 
- Media Queries ( @media rule )  
- SVG Icons ( simple vertical-align & scalable ) 
- Tables structure ( thead, tbody, tfoot )  
- UI root consistency :  
  replaced reference of fabric industry ( xs, md, xl... )  
  with #xoopscube order/weight numeric values

### Fixed

- Altsys ( UI-Components )
- D3 Modules Templates
- .editorconfig [**.css] 
  ( indent_style = tab
  indent_size = 2 )
- Javascript ( jQuery and Vanilla )
- Grid and Flex (simplified and scalable)
- X-Update Store Templates
- X-Update Store SVG Icons

### Removed

- Altsys Core Version check
- Deprecated Fck-htmlarea
- [WIP] Admin-UI ( test files )

### Update

- Admin Theme
- Altsys
- D3 Modules
- HTML Purifier HTML5 attributes 
- Standards Compliant HTML Filtering

## [unreleased] 2019-11-29

### Added

- Admin Theme version 0.0.3
- CDN Script Fallback Local

### Changed

- HTML5
- Legacy Render System
- Modules icons svg
- Smarty modifier
- Templates (Admin)

### Fixed

- Legacy xoops error
- Lost Pass action
- User Login
- Xupdate Store AssetPreload class
- Xupdate Store preg_replace /e

### Removed

- [WIP] Admin-UI images
- Deprecated Fck-htmlarea

### Update

- HTML Purifier 4.12.0 - Standards Compliant HTML Filtering
- Xupdate Store phpseclib-2.0.23

## [unreleased] 2019-11-15

### Added

- Admin Theme (WIP)
- Theme Flex Starter (WIP)
- Admin Dashboard Preload

### Changed

- Admin Blocks & Dashboard
- Admin Dashboard Settings
- Archive_Zip preg_match
- Pico Form Process by HTML regex
- D3Forum Text Sanitizer
- Pico Text Sanitizer

### Fixed

- **class constructors**
- XoopsCommentRenderer
- XoopsDownloader
- XoopsTarDownloader
- XoopsObjectTree
- XoopsMediaUploader
- XoopsXmlRpcApi
- XoopsXmlRpcParser
- XoopsXmlRpcDocument
- XoopsXmlRss2Parser
- XoopsThemeSetParser
- XoopsGroupPermForm
- XoopsZipDownloader
- AltsysFormCheckboxGroup
- LegacyImagebodyObject
- Legacy_AbstractCacheInformation
- Legacy_ActionForm
- Legacy kernel criteria.class
- Legacy_Mailer
- Protector Postcommon HTMLPurify4everyone
- Protector Postcommon HTMLPurify4guest
- ShadePlus_ServiceServer
- ShadePlus_SoapClient
- nusoap_base
- LegacyTheme
- LegacyThemeHandler
- LegacyRenderThemeObject
- Profile_ActionFrame
- Profile_Action
- User_Permission
- User_PermissionModuleItem
- User_PermissionBlockItem
- User_PermissionSystemAdminItem
- User_LostPassMailDirector
- User_LostPass1MailBuilder
- UserMailjob_linkObject
- XoopsAvatar
- XoopsImage
- XoopsImagecategory
- XoopsImageset
- XoopsImagesetimg
- XoopsSubjecticon
- XCube_RenderCache

### Removed

- CKEditor4Utilities mysql_set_charset
- Legacy_Controller magic_quotes 
- Protector patches
- Protector Myysql_query

### Update

- XelFinder v2.50

## [unreleased] 2019-10-19

### Added

- Accessibility Help #145
- Accessibility Checker #145
- Ajax Data Loading 
- Build-config #146
- Code Snippets
- Content Templates
- Toolbar Editor 
- oEmbed Media #147

### Changed

- ThemePreload comments translated from Ja to En
- MyConfig comments translated from Ja to En
- D3module changed _TRUST_PATH by _LIBRARY_PATH HTMLPurifier #131
- D3forum version
- Pico changed _TRUST_PATH by _LIBRARY_PATH #131
- Protector filters changed _TRUST_PATH by _LIBRARY_PATH #131
- Protector README
- Protector version ref 2.3.0
- D3Forum readme (merged)
- Pico changed english catalog
- SVG icons and graphics
- Site_default.ini required and recommended modules
- X-Update version
- X-Update stores urls 

### Fixed

- Altsys gtickets NOTICE: Only variables should be passed by reference #136
- Altsys mygrouppermform NOTICE: Only variables should be passed by reference #137
- Altsys Text_Diff.php calling assert() with a string argument is deprecated #138
- Altsys Text_Diff.php deprecated constructors #139
- Class xoopsmultimailer deprecated constructors #140
- DEPRECATED: Non-static method Legacy_SiteClose #135
- EasyLex_SQLScanner constructor #141
- Kernel group call to undefined method #130
- Pico SQL Error Update in include transact_functions #128
- PicoModelContent #129
- PicoControllerVoteContent #129
- PicoControllerUpdateContent #132
- PicoControllerInsertCategory #129
- PicoControllerInsertContent #129
- PicoControllerGetHistory #129
- PicoControllerDiffHistories #129
- User RegistMailBuilder deprecated constructors
- xelFinder session by @nao-pon #102

### Removed

- Module Lecat #143
- Ckeditor html files
- Ckeditor skin moono-lisa #151
- Extra files for localization
- Protector CHANGES_OLD
- Protector MEMO_ja
- Protector README_PL.txt
- Protector TODO
- Protector version.txt 

### Update

- Ckeditor v.4.13.0 #144
- Skin Moono Dark
- Default Theme 
- Default Session  
- Default General Settings #149
- D3Forum Preferences #150
- Render Preferences #150
- Search Options #150
- User Preferences #150
- CKEditor Preferences #150
- Pico Preferences #150
- xelFinder Preferences #150

## [unreleased] - 2019-10-09

### Changed

- revert xelFinderSession.class.php - fixCookieRegist error #102
- xoops_cookie and session to xcl_wap

### Fixed

- Old style constructor to "__construct" #98 Nobuhiro YASUTOMI aka nbuy
- Theme legacy_default - Smarty typo og:title #109
- MySQL 5.7.+ Strict Mode #97 Kilica
- xelFinder Use of mbstring.internal_encoding is deprecated #101
- xelfinder Admin failed to open googledrive.php #106
- xelfinder Couldn't find constant _DROPBOX_TOKEN #107
- xoopsmailer deprecated constructor and utf-8 #103
- Undefined variable: mods in Block Install List Action #104

### Update

- class, kernel, legacy, message "__construct" #98 Nobuhiro YASUTOMI aka nbuy
- Catalog english : install, legacy, profile, stdCache, user
- xelfinder version 2.50 by Naoki Sawada aka nao-pon

## [unreleased] - 2019-10-07

### Added

- Merged Module D3Forum 0.89.5

### Changed

- include/cp_functions.php --version
- include/cubecore_init.php --version

### Fixed

- Numeric value in install/class/settingmanager.php
- Legacy - Module Information #99
- MySQL 5.7.+ Strict Mode #97 by Kilica

### Update

- XCL and modules version (legacy,profile,stdCache,user)
- modules doc/help

## [unreleased] - 2019-09-25

### Removed

- Remove duplicated lib HTMLPurifier from Protector #94
- Remove dir "doc" (french) from Protector #94

### Fixed

- Protector path to TRUST_PATH/libs/htmlpurifier

### Update

- HTML Purifier 4.11.0

## [unreleased] - 2019-04-30

### Added

- Extra Meta Webmaster Tools
- Hack by Ryuji to prevent Legacy_redirect if AdelieDebug
- Fixes Pico Category

## [unreleased] - 2019-04-18

### Added

- Module lecat (temporary, to be released with elPackage)
- Module Pico
- Module Xelfinder
- login.php

### Fixed

- HTTPS everywhere : Chrome ! [#82](https://github.com/xoopscube/xcl/issues/82)
- Profile missing _MI_PROFILE_ADMENU_DATA_DOWNLOAD [#67](https://github.com/xoopscube/xcl/issues/67)
- Profile_Admin_DefinitionsListAction getBaseUrl [#66](https://github.com/xoopscube/xcl/issues/66)
- Module Uninstall Action $flag [#65](https://github.com/xoopscube/xcl/issues/65)
- Protector gtickets constructor [#64](https://github.com/xoopscube/xcl/issues/64)
- Meta Copyright 2019 [#62](https://github.com/xoopscube/xcl/issues/62)
- Legacy constructors [#43](https://github.com/xoopscube/xcl/issues/43)
- XCube constructors [#42](https://github.com/xoopscube/xcl/issues/42)
- XCube controller setupSession [#41](https://github.com/xoopscube/xcl/issues/41)
- Legacy_AdminControllerStrategy [#38](https://github.com/xoopscube/xcl/issues/38)
- Legacy_AbstractDebugger [#37](https://github.com/xoopscube/xcl/issues/37)
- Search Form Error [#36](https://github.com/xoopscube/xcl/issues/36)
- ProtectorFilterHandler deprecated constructor [#35](https://github.com/xoopscube/xcl/issues/35)
- ProtectorFilterAbstract constructor [#34](https://github.com/xoopscube/xcl/issues/34)
- Protector directory configs [#33](https://github.com/xoopscube/xcl/issues/33)
- smarty compiler class [#32](https://github.com/xoopscube/xcl/issues/82)
- ckeditor smarty function [#31](https://github.com/xoopscube/xcl/issues/31)


## [unreleased] - 2019-04-12

### Deprecated

- Deprecated constructors
- Variables passed by reference

### Fixed

- Core
- Legacy
- Search
- Sync branches
- Sync Trust Path


## [unreleased] - 2019-02-11

**XCL 2.3.0 Update to PHP7:**

### Added

- Merge branch 'master' into 2.3.0, Nao-pon

### Changed

- README.md, Gigamaster (Info opensource)
- upload /modules/xupdate
- upload modules/ckeditor4
- upload modules/altsys
- upload modules/protector
- installer en, ja_utf8
- language/english

### Deprecated

- PHP5 rem.

### Removed

- Remove ?> from PHP files, Kilica
- Move folder 'docs' to new repo
- Move folder 'extras' to new repo

### Fixed

- Update to LF, Kilica
- Update version /include
- Update /common
- update /core
- update /install
- update /kernel
- update /modules/legacyRender
- update /modules/message
- update modules/profile
- update modules/stdCache
- update modules/user
- update modules/ckeditor4 0.74
- Fixed installer template
- Kernel Object, Fix PHP7 Undefined index variable not initialized with Null coalesce operator
- XCube controller, Fix PHP7 Only variables should be passed by reference - XCube Session
- Legacy Controller, processModulePreload, Fix PHP7 Only variables should be passed by reference

### Security

- update class.phpmailer 5.2.27
