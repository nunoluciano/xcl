# Change Log

All notable changes to this project will be documented in this file.

- Format based on [Keep A Change Log](https://keepachangelog.com/en/1.0.0/).
- This project adheres to [Semantic Versioning](https://semver.org/).

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
