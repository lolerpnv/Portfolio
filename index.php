<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/9/2015
 * Time: 10:38 PM
 */
$var = isset($_GET['page']);
$PageData = new stdClass();
$PageData->tab_natpis = "MySite";
$PageData->naslov = "Moja Stranica";
$PageData->baselink = "http://localhost/Portfolio/index.php";
$PageData->templates = "http://localhost/Portfolio/templates";
if($var) {
    $fileToLoad = $_GET['page'];
    $page = include_once "templates/$fileToLoad.php";
}
else{
    $page = include_once "templates/introduction.php";
}
echo $page;