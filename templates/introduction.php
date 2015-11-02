<?php
/**
 * Created by PhpStorm.
 * User: Toni P
 * Date: 8/10/2015
 * Time: 7:33 PM
 */
$current = "wall";
return "
<!DOCTYPE html>
<html>
<head>

    <style>
    button.nav_black
    {
        background-color: #000000;
        background-color: rgba(0, 0, 0, 0);
        border-color: rgba(0, 0, 0, 0);
        padding-top: 15px;
    }
    p.nav_black
    {
        color: #f8f7ff;
        align-content: center;
    }
    </style>

    <meta charset='UTF-8'>
    <title id='nasl'> $PageData->tab_natpis</title>

    <link  href='css/about.css' rel='stylesheet'>
    <link  href='css/myapps.css' rel='stylesheet'>

    <!-- Latest compiled and minified CSS -->
    <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>

    <!-- jQuery library -->
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>

    <!-- Latest compiled JavaScript -->
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script

    <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js'></script>

    <script type='text/javascript'>
        var current = 'wall';
        function setNav(ime)
        {
        var da = ime;
        var id;
            switch (da)
            {
                case 0:
                id = 'wall';
                getElement(id);
                break;
                case 1:
                id = 'blog';
                getElement(id);
                break;
                case 2:
                id = 'myapps';
                getElement(id);
                break;
                case 3 :
                id = 'about';
                getElement(id);
                break;
            }
        }
        function getElement(ime)
        {
            $.get('$PageData->baselink?page='+ime, function(data,status){
                //alert(status+' data  '+data);


                appendStringAsNodes(document.getElementById('wrapper'), data);

                current = id;
            });
        }
        function appendStringAsNodes(element, html)
        {
            var frag = document.createDocumentFragment(),
                tmp = document.createElement('div'), child;
            tmp.innerHTML = html;
            // Append elements in a loop to a DocumentFragment, so that the browser does
            // not re-render the document for each node
            while (child = tmp.firstChild)
            {
                frag.appendChild(child);
            }
            if(element.hasChildNodes())
            {
                element.innerHTML = '';
            }
            element.appendChild(frag); // Now, append all elements at once
            frag = tmp = null;
        }

        function codeAddress() {
            $.get('$PageData->baselink?page=wall', function(data,status){
                //alert(status+' data  '+data);
                appendStringAsNodes(document.getElementById('wrapper'), data);
            });
        }
        window.onload = codeAddress();
        </script>
</head>
<body style='background-color: #f8f7ff' >
    <nav class='navbar navbar-inverse' >
        <div class='container-fluid'>
            <div class='navbar-header'>
              <a class='navbar-brand' href='http://www.etfos.unios.hr/~tpap/'>Toni Pap</a>
            </div>
            <div>
              <ul class='nav navbar-nav' style='padding-left: 30%'>
                <li style='padding-left: 20px'><button type='button' class='nav_black' onclick='setNav(0)'><p class='nav_black'>MyWall</p></button></li>
                <li style='padding-left: 20px'><button type='button' class='nav_black' onclick='setNav(1)'><p class='nav_black'>MyBlog</p></button></li>
                <li style='padding-left: 20px'><button type='button' class='nav_black' onclick='setNav(2)'><p class='nav_black' >MyApps</p></button></li>
                <li style='padding-left: 20px'><button type='button' class='nav_black' onclick='setNav(3)'><p class='nav_black' >AboutMe</p></button></li>
              </ul>
            </div>
        <a href='https://github.com/lolerpnv'><button type='button' class='btn btn-primary' style='float: right;background-color: transparent;border-color: transparent' ><p class='nav_black'>Git</p></button></a>
        </div>
    </nav>
    <div class='content' id='wrapper' style='padding-left: 20px'>

    </div>
</body>
</html>
";