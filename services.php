<?php
    require "./include.php";
    include "./para.php";

    if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
        die("Could not connect to database");

    if (mysql_select_db(DB, $connection) === FALSE)
        die("Could not select database");

    $sql = "SELECT * FROM `services`";

    $content = mysql_query($sql);
    if ($content === FALSE)
        die("Could not Query Database");
    $nav = mysql_query($sql);
    if ($nav === FALSE)
        die("Could not Query Database");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Services - Hoopa TANF</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">


        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/boilerplate.css">
        <link rel="stylesheet" href="css/layout.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="js/respond.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="gridContainer clearfix">
            <header id="banner">
                <section class="desktop tablet">
                    <a href="index.php">
                        <img src="img/required/logo-full.png" alt="TANF-LOGO">
                        <h1>Hoopa Valley Tribal TANF</h1>
                    </a>
                </section>

                <section class="mobile">
                    <img src="img/required/menu-icon.png" alt="MENU" id="menu-icon">

                    <a href="index.php"><img src="img/required/logo-horizontal.png" alt="LOGO"></a>

                    <img src="img/required/search-icon.png" alt="SEARCH" id="search-icon">
                </section>

                <nav id="site-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="services.php">Services</a></li>
                        <li><a href="calendar.php">Calendar</a></li>
                        <li><a href="forms.php">Forms</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>

                <br id="sep">

                <div id="search-bar">
                    <form action="" method="" accept-charset="utf-8">
                        <input type="search" name="search" id="search" placeholder="Search for Anything!">
                        <input type="submit" name="submit" id="search-button" value="Search">
                    </form>
                </div>

                <br>

                <img src="img/required/wave.png" alt="wave" class="desktop tablet" id="banner-wave">
            </header>

            <div id="facebook">
              <a href="https://www.facebook.com/HoopaTANF/"><img src="img/required/FB.png" alt="Find us on Facebook"></a>
            </div>

            <main id="services">
                <header>
                    <h2 id='list'>Services</h2>
                </header>
                <?php
                    if (mysql_num_rows($nav) >= 3) {
                        $list = TRUE;
                    }
                    if (isset($list)) {
                        echo "<section><ul><h3>List of Services</h3>";
                        while($row = mysql_fetch_array($nav)){
                            echo "<li><a href='#$row[id]'>$row[header]</a></li>";
                        }
                        echo"</ul></section>";
                    }
                ?>
                <?php
                    if (mysql_num_rows($content)) {
                        while($row2 = mysql_fetch_array($content)){
                            echo "<article><header><h3 id='$row2[id]'>$row2[header]</h3></header><section>";
                            if($row2['image']!="") {
                                echo "<img src='$row2[image]' alt='Image Error' style='float: left;'>";
                            }
                            $row2['content'] = wpautop($row2['content']);
                            echo"<h4>Description:</h4>$row2[content]";
                            if($row2['access']!="") {
                                $row2['access'] = wpautop($row2['access']);
                                echo "<div class='access'><h5>How to access this service:</h5>$row2[access]</div>";
                            }
                            if (isset($list)) {
                                echo "<center><a href='#list' style='color:#000;'>Back to List</a></center>";
                            }
                            echo "<br id='sep'></section></article>";
                        }
                    }

                ?>
            </main>

            <div id="footer-wave" class="desktop tablet"><img src="img/required/footer_bg.png" alt="footer-wave"></div>

            <footer>
               <span>Copyright © <script>var d = new Date(); document.write(d.getFullYear());</script> Hoopa Valley Tribal TANF</span>
               <p>Developed by <a href="http://www.speygee.com"><img src="img/required/speygee-logo.png" alt="Speygee" height="20" width="20"></a></p>
            </footer>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
