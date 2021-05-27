<?php
/**
 * XCube_Theme.class.php
 * @package XCube
 * @version 2.3.0
 * @author Nuno Luciano (aka Gigamaster), 2020 XCL PHP7
 * @author Minahito, 2008/10/12 04:30:27
 * @copyright Copyright 2005-2021 XOOPSCube Project  <https://github.com/xoopscube/>
 * @license   Cube : https://github.com/xoopscube/xcl/blob/master/BSD_license.txt
 * @brief The theme class.
 */

class XCube_Theme {
	/**
	 * A name of the theme.
	 *
	 * @var string
	 */
	public $mName;

	/**
	 * A name of the theme on the file system.
	 *
	 * @var string
	 */
	public $mDirname;

	/**
	 * A name of the entity system on which this theme depends.
	 *
	 * @var string
	 */
	public $mDepends = [];

	public $mVersion;

	public $mUrl;

	public $mThemeOptions;

	/**
	 * A name of the render system on which this theme depends on.
	 *
	 * @var string
	 */
	public $mRenderSystemName;

	/**
	 * A file name of screen shot.
	 *
	 * @var string
	 */
	public $mScreenShot;

	public $mDescription;

	/**
	 * A description of this theme file format. This information isn't used by
	 * a program. But, this is an important information for users
	 *
	 * @var string
	 */
	public $mFormat;

	public $mAuthor;

	/**
	 * @deprecated mLicense
	 */
	public $mLicence;

	public $mLicense;

	public $_mManifesto = [];

	/**
	 * Load manifesto file, and set infomations from the file to member
	 * property.
	 *
	 * @param $file
	 *
	 * @return bool
	 */
	public function loadManifesto( $file ) {
		if ( file_exists( $file ) ) {
			$iniHandler          = new XCube_IniHandler( $file, true );
			$this->_mManifesto   = $iniHandler->getAllConfig();
			$this->mName         = $this->_mManifesto['Manifesto']['Name'] ?? '';
			$this->mDepends      = $this->_mManifesto['Manifesto']['Depends'] ?? '';
			$this->mVersion      = $this->_mManifesto['Manifesto']['Version'] ?? '';
			$this->mUrl          = $this->_mManifesto['Manifesto']['Url'] ?? '';
			$this->mThemeOptions = $this->_mManifesto['Manifesto']['ThemeOptions'] ?? '';

			$this->mRenderSystemName = $this->_mManifesto['Theme']['RenderSystem'] ?? '';
			$this->mAuthor           = $this->_mManifesto['Theme']['Author'] ?? '';

			if ( isset( $this->_mManifesto['Theme']['ScreenShot'] ) ) {
				$this->mScreenShot = $this->_mManifesto['Theme']['ScreenShot'];
			}

			if ( isset( $this->_mManifesto['Theme']['Description'] ) ) {
				$this->mDescription = $this->_mManifesto['Theme']['Description'];
			}

			$this->mFormat = $this->_mManifesto['Theme']['Format'] ?? '';

			if ( isset( $this->_mManifesto['Theme']['License'] ) ) {
				$this->mLicense = $this->_mManifesto['Theme']['License'];
				$this->mLicence = $this->_mManifesto['Theme']['License'];
			} elseif ( isset( $this->_mManifesto['Theme']['Licence'] ) ) { // For typo English, French
				$this->mLicense = $this->_mManifesto['Theme']['Licence'];
				$this->mLicence = $this->_mManifesto['Theme']['Licence'];
			}

			return true;
		}

		return false;
	}
}
