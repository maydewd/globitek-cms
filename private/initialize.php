<?php

define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');

require_once('credentials.php');
require_once('functions.php');

//connect to DB
$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
?>
