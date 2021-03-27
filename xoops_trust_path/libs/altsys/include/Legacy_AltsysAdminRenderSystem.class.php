<?php
/**
 * Altsys library (UI-Components) for D3 modules
 * Class Legacy_AltsysAdminRenderSystem
 * @package XCL
 * @subpackage Altsys
 * @version 2.3
 * @author Gijoe (Peak), Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

require_once XOOPS_ROOT_PATH . '/modules/legacyRender/kernel/Legacy_AdminRenderSystem.class.php';
require_once XOOPS_TRUST_PATH . '/libs/altsys/include/altsys_functions.php';
require_once XOOPS_TRUST_PATH . '/libs/altsys/include/admin_in_theme_functions.php';

class Legacy_AltsysAdminRenderSystem extends Legacy_AdminRenderSystem {
	public function renderTheme( &$target ) {
		global $altsysModuleConfig;

		if ( empty( $altsysModuleConfig['admin_in_theme'] ) ) {
			parent::renderTheme( $target );
		} else {
			$attributes = $target->getAttributes();

			altsys_admin_in_theme_in_last( $attributes['xoops_contents'] );
			exit;
		}
	}
}
