<?php
/**
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */
$content =
	'<div class="ui-tab-wrap">
	<input type="radio" id="ui-tab1" name="ui-tabGroup1" class="ui-tab" checked="">
	<label for="ui-tab1">About</label>

	<input type="radio" id="ui-tab2" name="ui-tabGroup1" class="ui-tab">
	<label for="ui-tab2">License</label>

	<input type="radio" id="ui-tab3" name="ui-tabGroup1" class="ui-tab">
    <label for="ui-tab3">Requirements</label>

    <div class="ui-tab-content">
    <p><b>XCL</b> is a <strong>Web Application Platform</strong> with a modular architecture
    making XCL an ideal tool for developing small to large dynamic community websites,
    intra company portals, corporate portals, weblogs and much more.
    </p>
    </div>

    <div class="ui-tab-content">
    <p>
    The Cube Core is released under the terms of the <a href="https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt" target="_blank" rel="external">New BSD License</a> and is free to use and modify.
    It is free to redistribute as long as you abide by the distribution terms of the New BSD License.
    </p>
    <p>
    The XOOPS Cube Legacy modules are released under the terms of the <a href="https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt" target="_blank" rel="external">GNU General Public License (GPL)</a> and is free to use and modify.
    It is free to redistribute as long as you abide by the distribution terms of the GPL.
    </p>
    </div>

    <div class="ui-tab-content">
    <p>
    </p><ul>
    <li><a href="https://www.apache.org/" target="_blank" rel="external">Apache</a>, <a href="https://www.nginx.com/" target="_blank" rel="external">Nginx</a> or any other Web Server.</li>
    <li><a href="https://www.php.net/" target="_blank" rel="external">PHP7</a> and higher</li>
    <li><a href="https://www.mysql.com/" target="_blank" rel="external">MySQL</a> or <a href="https://mariadb.org/" target="_blank" rel="external">MariaDB</a> Database 5.5.x and higher</li>
    </ul>
    <p></p>
    </div>
</div>
    <h3>Checklist for Installation</h3>
    <p><input type="checkbox" required=""> Set up Web Server, PHP7 and SQL Database.
    </p><p><input type="checkbox" required=""> Database using <em>utf8mb4_general_ci</em> collation, user and password.
    </p><p>Make the directories  and file writabale :
    </p><p><input type="checkbox" required=""> html/uploads/
    </p><p><input type="checkbox" required=""> xoops_trust_path/cache/
    </p><p><input type="checkbox" required=""> xoops_trust_path/templates_c/
    </p><p><input type="checkbox" required=""> html/mainfile.php
    </p><p>Web Browser Settings
    </p><p><input type="checkbox" required=""> Enable Cookies and JavaScript options.
    </p><h3>Installation</h3>
    <p>Click next and follow further instructions given by the Installer Wizard.</p>
';
