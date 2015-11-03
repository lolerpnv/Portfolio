<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/11/2015
 * Time: 10:18 PM
 */
return "
<html>
<head>
    <link rel='stylesheet' type='text/css' href='std_StyleSheet.css'>
    <!-- Latest compiled and minified CSS -->
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <!-- Latest compiled JavaScript -->
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
</head>
<body>
    <form role='form' action='http://localhost/ch1/PapovBlog/postwall.php?' method='POST' style='padding-left: 10%'>
        <div class='form-group'>
            <label for='usr'>Naslov:</label>
            <input type='text' name='naslov' class='form-control' style='width: 35%'><br>
        </div>
        <div class='form-group'>
            <label  for='usr'>Tekst:</label>
            <input type='text' name='tekst' class='form-control' style='width: 60%;height: 100px'><br>
        </div>
    <input type='submit''>
    </form>
</body>
</html>

";