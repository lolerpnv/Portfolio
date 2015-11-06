<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/11/2015
 * Time: 10:20 PM
**/
function postwall($naslov,$tekst)
{
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $user = "tpap";
    $pass = "ArVz.318.BE";

    $link = "mysql:host=localhost;dbname=tpap";
    try {
        $dbh = new PDO($link, $user, $pass);

    } catch (PDOException $e) {
        die("Unable to connect: " . $e->getMessage());
    }
    $var = isset($_POST['naslov']);
    if ($var) {
        try {
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$naslov  = $_GET['naslov'];
            //$tekst = $_GET['tekst'];
            $time = time();
            $t = date("Y-m-d",$time);
            $dbh->beginTransaction();
            $id = $dbh->lastInsertId('id');
            $stmt = $dbh->prepare("insert into wall(id,naslov,datum,tekst) VALUES (:id,:nas,:dat,:tek)");
            $stmt->bindparam(':id',$id);
            $stmt->bindParam(':nas',$naslov);
            $stmt->bindparam(':dat',$t);
            $stmt->bindParam(':tek',$tekst);
            $stmt->execute();
            $dbh->commit();
        } catch (Exception $e) {
            $dbh->rollBack();
            echo "\nFailed: " . $e->getMessage();
        }
    }
}