<?php
/**
 * Installer default charset_mysql
 * @package XCL
 * @subpackage Installer
 * @version 2.3
 * @author Gigamaster (XCL)
 * @date 2020/05/27 15:10:28
 * @copyright Copyright 2005-2021 XOOPS Cube Project  <https://github.com/xoopscube/legacy>
 * @license https://github.com/xoopscube/legacy/blob/master/docs/GPL_V2.txt GNU GENERAL PUBLIC LICENSE Version 2
 */

if ( ! defined( 'XOOPS_ROOT_PATH' ) ) {
	exit();
}

$this->db->queryF( '/*!50503 SET NAMES utf8mb4 */' );
$this->db->queryF( '/*!50503 SET SESSION character_set_server=utf8mb4 */' );
$this->db->queryF( '/*!50503 ALTER DATABASE `' . XOOPS_DB_NAME . '` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */' );

$set_charset = ( XOOPS_DB_TYPE === 'mysqli' ) ? 'mysqli_set_charset' : 'mysql_set_charset';
if ( function_exists( $set_charset ) ) {
	if ( XOOPS_DB_TYPE === 'mysqli' ) {
		$set_charset( $this->db->conn, 'utf8mb4' );
		$this->db->queryF( '/*!50503 SET NAMES utf8mb4 */' );
		$this->db->queryF( '/*!50503 SET SESSION collation_connection=utf8mb4_general_ci */' );
	} else {
		$set_charset( 'utf8' );
		$this->db->queryF( '/*!40101 SET NAMES utf8 */' );
		$this->db->queryF( '/*!40101 SET SESSION collation_connection=utf8_general_ci */' );
	}
}
/*
    +--------------------------+--------------------+
    | Variable_name            | Value              |
    +--------------------------+--------------------+
    | character_set_client     | utf8mb4            |
    | character_set_connection | utf8mb4            |
    | character_set_database   | utf8mb4            |
    | character_set_filesystem | binary             |
    | character_set_results    | utf8mb4            |
    | character_set_server     | utf8mb4            |
    | character_set_system     | utf8               |
    | collation_connection     | utf8mb4_general_ci |
    | collation_database       | utf8mb4_general_ci |
    | collation_server         | utf8mb4_general_ci |
    +--------------------------+--------------------+
 */
