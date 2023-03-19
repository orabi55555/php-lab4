<?php
require_once("vendor/autoload.php");

session_start();

$handler = new MySQLHandler("items");

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    if(!$_GET["id"]){
        require_once("views/items.php");
    }
    require_once("views/details.php");
} elseif(isset($_GET["page"])){
    require_once("views/Additem.php");
}
else  {
    require_once("views/items.php");
}