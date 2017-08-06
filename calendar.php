<?php
    require "./include.php";
    include "./para.php";

    $mysqli = new mysqli(HOST, USER, PASS, DB);
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }

    $sql = "SELECT * FROM `gcal`";

    $calendar = $mysqli->query($sql);
    if ($calendar === FALSE)
        die("Could not Query Database");

    $sql2 = "SELECT * FROM `calendar`";

    $content = $mysqli->query($sql2);
    if ($content === FALSE)
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
        <title>Calendar - Hoopa TANF</title>
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
                        <li><a href="services.php">Services</a></li>
                        <li class="active"><a href="calendar.php">Calendar</a></li>
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

            <main id="calendar">
                <header>
                    <h2>Calendar</h2>
                </header>

                <article>
                    <section>
                        <?php
                            while ($row = $content->fetch_array(MYSQLI_ASSOC)) {
                                $row["description"] = wpautop($row["description"]);
                                echo "$row[description]";
                            }
                        ?>
                        <h3>Click on any event for more details.</h3>
                    </section>
                </article>

                <?php
                    $cal = $calendar->fetch_array(MYSQLI_ASSOC);
                    $hold = $cal['calendar-id'];
                ?>
                <section class="desktop">

                    <?php
                        echo '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;height=650&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src='.$cal['calendar-id'].'&amp;color=%23182C57&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="100%" height="650" frameborder="0" scrolling="no"></iframe>';
                    ?>

                </section>
                <section class="tablet">

                    <?php
                        echo '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showTabs=0&amp;showCalendars=0&amp;height=500&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src='.$cal['calendar-id'].'&amp;color=%23182C57&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="100%" height="500" frameborder="0" scrolling="no"></iframe>';
                    ?>

                </section>
                <section class="mobile">
                    <?php
                        echo '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=AGENDA&amp;height=400&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src='.$cal['calendar-id'].'&amp;color=%23182C57&amp;ctz=America%2FLos_Angeles" style=" border-width:0 " width="100%" height="400" frameborder="0" scrolling="no"></iframe>';
                    ?>
                </section>

            </main>

            <div id="footer-wave" class="desktop tablet"><img src="img/required/footer_bg.png" alt="footer-wave"></div>

            <footer>
               <span>Copyright © <script>var d = new Date(); document.write(d.getFullYear());</script> Hoopa Valley Tribal TANF</span>
               <p>Developed by <a href="http://www.speygee.com"><img src="img/required/speygee-logo.png" alt="Speygee" height="20" width="20"></a></p>
            </footer>

            <?php
                $content->free();
                $calendar->free();
                $mysqli->close();
            ?>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
