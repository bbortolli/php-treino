<?php
/** O nome do banco de dados*/
define('DB_NAME', 'crudtreino');
/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');
/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');
/** nome do host do MySQL */
define('DB_HOST', 'localhost');
/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', '/php-treino/');
	
/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'config/db.php');
	
/** caminhos dos templates de header e footer **/
define('HEADER_TEMPLATE', ABSPATH . 'config/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'config/footer.php');
