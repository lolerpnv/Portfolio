<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/11/2015
 * Time: 10:20 PM
**/
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
$var = isset($_POST['type']);
$row = "NECE";

$user = "tpap";
$pass = "ArVz.318.BE";

    $link = "mysql:host=localhost;dbname=tpap";
    try {
        $dbh = new PDO($link, $user,$pass);

    } catch (PDOException $e) {
        die("Unable to connect: " . $e->getMessage());
    }
    $date = date("Y-m-d");
    $var = isset($_POST['naslov']);
    if($var){
        try {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $naslov  = $_POST['naslov'];
            $tekst = $_POST['tekst'];

            $dbh->beginTransaction();
            $id = $dbh->lastInsertId('id');
            $dbh->exec("insert into wall (id, naslov,datum, tekst) values ($id, '$naslov' ,FROM_UNIXTIME(1231634282), '$tekst')");
            $dbh->commit();



            $row = "gotovo";

        } catch (Exception $e) {
            $dbh->rollBack();
            echo "\nFailed: " . $e->getMessage();
        }
    }
    $tables = "<h1>Start</h1>
    <table style='width:100%'>";
    foreach($dbh->query('SELECT * from wall') as $row) {
        $tables .= "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[3]</td>
                        <td>$row[2]</td>
                     </tr>";
    }
    $tables .= "</table><h1>Stop</h1>";
    $dbh = null;
    $page = include_once("index.php");


echo $page;