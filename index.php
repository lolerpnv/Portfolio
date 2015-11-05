<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/9/2015
 * Time: 10:38 PM
 */
$var = isset($_GET['page']);
$var2 = isset($_GET['type']);


$PageData = new stdClass();
$PageData->tab_natpis = "MySite";
$PageData->naslov = "Moja Stranica";
$PageData->baselink = "http://localhost/Portfolio/index.php";
$PageData->postlink = "http://localhost/Portfolio/postwall.php";
$PageData->templates = "http://localhost/Portfolio/templates";

if($var) {
    $fileToLoad = $_GET['page'];
    $case = $fileToLoad=="wall"||
            $fileToLoad=="blog"||
            $fileToLoad=="myapps"||
            $fileToLoad=="about";

    switch ($fileToLoad)
    {
        case "postwall":
            require "postwall.php";
            postwall($_POST['naslov'],$_POST['tekst']);
            $page = include_once "templates/introduction.php";
            break;
        case $case:
            $page = include_once "templates/$fileToLoad.php";
            break;
        default:
            $page = include_once "templates/introduction.php";
            break;
    }
}
else{
    $page = include_once "templates/introduction.php";
}
echo $page;