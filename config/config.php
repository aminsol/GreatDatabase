<?php
define("DB_HOST", "45.55.5.95");
define("DB_NAME", "thegreatdatabase");
define("DB_USER", "thegreatdatabase");
define("DB_PASS", "WeAreAwesome");
$db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

session_start();
if(empty($_SESSION['login']) or empty($_SESSION['user']) and "login" != basename(__FILE__, '.php') and "register" != basename(__FILE__, '.php') ) {
    header('Location: login.php');
}
elseif("login" != basename(__FILE__, '.php') and "register" != basename(__FILE__, '.php')){
 $user = $_SESSION['user'];
}



