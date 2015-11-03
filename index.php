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
$PageData->baselink = "http://etfos.unios.hr/index.php";
$PageData->postlink = "http://localhost/Portfolio/postwall.php";
$PageData->templates = "http://localhost/Portfolio/templates";

if($var) {
    $fileToLoad = $_GET['page'];
    $page = include_once "templates/$fileToLoad.php";
}
else{
    $page = include_once "templates/introduction.php";
}
echo $page;