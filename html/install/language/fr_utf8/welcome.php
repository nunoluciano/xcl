<?php
$content =
	'<div class="ui-tab-wrap">
	<input type="radio" id="ui-tab1" name="ui-tabGroup1" class="ui-tab" checked="">
	<label for="ui-tab1">About</label>

	<input type="radio" id="ui-tab2" name="ui-tabGroup1" class="ui-tab">
	<label for="ui-tab2">License</label>

	<input type="radio" id="ui-tab3" name="ui-tabGroup1" class="ui-tab">
    <label for="ui-tab3">Conditions</label>

    <div class="ui-tab-content">
    <p><b>XCL</b> est une <strong>Plateforme d\'application Web</strong> avec une architecture modulaire
     faisant de XCL un outil idéal pour développer des sites Web communautaires dynamiques de petite à grande taille,
     portails intra-entreprise, portails d\'entreprise, blogs et bien plus encore.
    </p>
    </div>

    <div class="ui-tab-content">
    <p>
    Le le noyau Cube est publié sous les termes de la <a href="https://github.com/xoopscube/legacy/blob/master/docs/bsd_licenses.txt" target="_blank" rel="external">New BSD License</a>.
    Il est librement redistribuable tant que vous respectez les termes de distribution New BSD License.
    </p>
    <p>
    Les modules XCL (D3) sont publiés sous les termes de la <a href="https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt" target="_blank" rel="external">GNU General Public License (GPL)</a>.
    Ils sont librement redistribuablea tant que vous respectez les termes de distribution GPL.
    </p>
    </div>

    <div class="ui-tab-content">
    <p>
    </p><ul>
    <li><a href="https://www.apache.org/" target="_blank" rel="external">Apache</a>, <a href="https://www.nginx.com/" target="_blank" rel="external">Nginx</a> ou tout autre serveur Web.</li>
    <li><a href="https://www.php.net/" target="_blank" rel="external">PHP7</a> ou supérieure</li>
    <li><a href="https://www.mysql.com/" target="_blank" rel="external">MySQL</a> ou <a href="https://mariadb.org/" target="_blank" rel="external">MariaDB</a> Base de données 5.6.x ou supérieure</li>
    </ul>
    <p></p>
    </div>
</div>
    <h3>Liste de contrôle pour l\'installation</h3>
    <p><input type="checkbox" required=""> Configurer serveur Web, PHP7 et base de données SQL.
    </p><p><input type="checkbox" required=""> Base de données utilisant <em>utf8mb4_general_ci</em> collation, utilisateur et mot de passe.
    </p><p>Rendre les répertoires et les fichiers accessibles en écriture :
    </p><p><input type="checkbox" required=""> html/uploads/
    </p><p><input type="checkbox" required=""> xoops_trust_path/cache/
    </p><p><input type="checkbox" required=""> xoops_trust_path/templates_c/
    </p><p><input type="checkbox" required=""> html/mainfile.php
    </p><p>Paramètres du navigateur Web
    </p><p><input type="checkbox" required=""> Activer les options: cookies et JavaScript.
    </p><h3>Installation</h3>
    <p>Cliquez sur suivant et poursuivez les instructions supplémentaires fournies par l\'assistant d\'installation.</p>
';
