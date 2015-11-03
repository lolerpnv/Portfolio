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

$page = '
<div class="container" align="center">
    <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Write on my wall</button>
    <div id="demo" class="collapse">
      <h4>Here you can write on my wall</h4>
      <form class="form-group" role="form" style="width: 40%" action="http://localhost/Portfolio/postwall.php" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="naslov" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
          <label for="demo">Text</label>
          <textarea name="tekst" rows="5" class="form-control" title="tekst"></textarea>
        </div>
        <button type="submit"  class="btn btn-default">Publish</button>
      </form>
    </div>
</div>';


$page .= "<div align='center' style='padding-top: 50px'>";
try {
    $dbh = new PDO($link, $user,$pass);
    foreach($dbh->query('SELECT * from wall') as $row) {
        $page .= "<div align='left' style='background-color: transparent;border-radius: 15px;border-style: solid;border-color: #000000;width: 40%;padding-left: 20px'>
                    <h3 align='centerw'>$row[1]</h3>
                    <p>$row[2]</p>
                    <p>$row[3]</p>
                  </div>";
    }

} catch (PDOException $e) {die("Unable to connect: " . $e->getMessage());}
$page .= "</div>";


return $page;