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
if(empty($_SESSION['login']) or empty($_SESSION['user'])) {
    //header('Location: login.php');
}
else{
 //$user = $_SESSION['user'];
}

$user = 'amin@aminsoltani.com';