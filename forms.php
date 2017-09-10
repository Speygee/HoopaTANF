<?php
    require "./include.php";

    if (($connection = mysqli_connect(HOST, USER, PASS, DB)) === FALSE)
        die("Could not connect to database");

        $query = "SELECT * FROM `forms_instance` ORDER BY `FormName` ASC";

        $forms = mysqli_query($connection, $query);
        if ($forms === FALSE)
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
        <title>Forms - Hoopa TANF</title>
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
                        <li><a href="calendar.php">Calendar</a></li>
                        <li class="active"><a href="forms.php">Forms</a></li>
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

            <main id="forms">
                <header>
                    <h2>Forms</h2>
                </header>
                <?php
                    echo "<ul id=\"formsDisplay\">";
                    if (mysqli_num_rows($forms)) {
                        while ($row = mysqli_fetch_array($forms)) {
                            echo "<li><a href='./forms/$row[formPDF]' target='_blank'>$row[formName]</a></li>";
                        }
                    }
                    echo "</ul>";
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
