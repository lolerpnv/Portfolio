<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/15/2015
 * Time: 10:09 PM
 */
$link = "mysql:host=localhost;dbname=tpap";
$user = "tpap";
$pass = "ArVz.318.BE";

$page = "<div >";
try {
    $dbh = new PDO($link, $user,$pass);
    foreach($dbh->query('SELECT * from wall') as $row) {
        $page .= "<div style='background-color: transparent;border-radius: 15px;border-style: solid;border-color: #000000;width: 40%;padding-left: 20px'>
                    <h3>$row[1]</h3>
                    <p>$row[2]</p>
                    <p>$row[3]</p>
                  </div>";
    }

} catch (PDOException $e) {die("Unable to connect: " . $e->getMessage());}
$page .= "</div>";


return $page;