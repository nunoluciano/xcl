# Change Log

All notable changes to this project will be documented in this file.

- Format based on [Keep A Change Log](https://keepachangelog.com/en/1.0.0/).
- This project adheres to [Semantic Versioning](https://semver.org/).


## [unreleased] - 2019-04-30.

### Added

- Extra Meta Webmaster Tools
- Hack by Ryuji to prevent Legacy_redirect if AdelieDebug
- Fixes Pico Category

## [unreleased] - 2019-04-18.

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


## [unreleased] - 2019-04-12.

### Deprecated

- Deprecated constructors
- Variables passed by reference

### Fixed

- Core
- Legacy
- Search
- Sync branches
- Sync Trust Path


## [unreleased] - 2019-02-11.

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
