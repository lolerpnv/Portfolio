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
$PageData->baselink = "http://www.etfos.unios.hr/~tpap/index.php";
if($var) {
    $fileToLoad = $_GET['page'];
    $page = include_once "templates/$fileToLoad.php";
}
else{
    $page = include_once "templates/introduction.php";
}
echo $page;