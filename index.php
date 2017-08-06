<?php
    require "./include.php";
    include "./para.php";

    if (($connection = mysql_connect(HOST, USER, PASS)) === FALSE)
        die("Could not connect to database");

    if (mysql_select_db(DB, $connection) === FALSE)
        die("Could not select database");

    $one = "SELECT * FROM `index` ORDER BY `index`.`id` ASC";
    $two = "SELECT * FROM `gcal`";

    $content = mysql_query($one);
    if ($content === FALSE)
        die("Could not Query Database");

    $calendar = mysql_query($two);
    if ($calendar === FALSE)
        die("Could not Query Database2");

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Hoopa TANF</title>
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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="calendar.php">Calendar</a></li>
                        <li><a href="forms.php">Forms</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>

                <br id="sep">

                <div id="search-bar" class="clearfix">
                    <form action="" method="get" accept-charset="utf-8">
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

            <main id="home">
                <header>
                    <h2>Home</h2>
                </header>
                <?php
                    if (mysql_num_rows($content)) {
                        while ($row = mysql_fetch_array($content)) {
                            echo "<article><header><h3>$row[title]</h3></header><section>";
                            if ($row['image'] != "NotSet") {
                                if ($row['position'] == "right") {
                                    echo "<img src='$row[image]' alt='Picture Error' style='float: right;'>";
                                }
                                else
                                    echo "<img src='$row[image]' alt='Picture Error' style='float: left;'>";
                            }
                            $row['content'] = wpautop($row['content']);
                            echo "$row[content]<br id='sep'></section></article>";
                        }
                    }
                ?>
            </main>

            <aside>
                <?php
                    if (mysql_num_rows($calendar)) {
                        $cal = mysql_fetch_array($calendar);
                        echo '<iframe src="https://www.google.com/calendar/embed?title=Agenda&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src='.$cal['calendar-id'].'&amp;color=%23182C57&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="100%" height="400" frameborder="0" scrolling="no"></iframe>';
                    }
                ?>
            </aside>

            <br id="sep">

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
