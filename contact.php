<?php
    require "./include.php";

    if (($connection = mysqli_connect(HOST, USER, PASS, DB)) === FALSE)
        die("Could not connect to database");

    $staff = "SELECT * FROM contact WHERE type=\"staff\" ORDER BY phone ASC";

    $staff_content = mysqli_query($connection, $staff);
    if ($staff_content === FALSE)
        die("Could not Query Database");

    $et = "SELECT * FROM contact WHERE type=\"et\"";

    $et_content = mysqli_query($connection, $et);
    if ($et_content === FALSE)
        die("Could not Query Database");

    $family = "SELECT * FROM contact WHERE type=\"family\"";

    $family_content = mysqli_query($connection, $family);
    if ($family_content === FALSE)
        die("Could not Query Database");

    $project = "SELECT * FROM contact WHERE type=\"project\"";

    $project_content = mysqli_query($connection, $project);
    if ($project_content === FALSE)
        die("Could not Query Database");

    $substance = "SELECT * FROM contact WHERE type=\"substance\"";

    $substance_content = mysqli_query($connection, $substance);
    if ($substance_content === FALSE)
        die("Could not Query Database");

    $sql2 = "SELECT * FROM `address`";

    $address = mysqli_query($connection, $sql2);
    if ($address === FALSE)
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
        <title>Contact - Hoopa TANF</title>
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
                        <li><a href="forms.php">Forms</a></li>
                        <li class="active"><a href="contact.php">Contact</a></li>
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

            <main id="contact">
                <header>
                    <h2>Contact</h2>
                </header>

                <div id="location">
                <?php
                    if (mysqli_num_rows($address)) {
                        while ($row = mysqli_fetch_array($address)) {
                            if ($row['image'] != "") {
                                echo "<img src='$row[image]' alt='TANF-LOGO' width='120' height='120'>";
                            }
                            else
                                echo "<img src='img/required/logo-full.png' alt='TANF-LOGO' width='120' height='120'>";

                            echo "<ul><h3>$row[title]</h3><li>Phone: $row[phone]</li><li>Fax: $row[fax]</li><br><hr style='width: 65%; margin: 5px auto 0;'><br>";

                            if ($row['hours'] != "") {
                                echo "<center><li>Hours: $row[hours]</li></center>";
                            }
                            if ($row['special'] != "") {
                                echo "<center><li>$row[special]</li></center>";
                            }
                            echo "</ul><address>$row[address]<br><address>$row[PO]<br>$row[city]</address>";
                        }
                    }
                ?>
                </div>
                <h2 style="text-align: center;">TANF Staff</h2>
                <hr class="split">
                <ul id="directory">
                <?php
                    if (mysqli_num_rows($staff_content)) {
                        while ($person = mysqli_fetch_array($staff_content)) {
                            echo "<li class='person'>";
                            if ($person['image'] != "") {
                                echo "<img src='img/contact/$person[image]' alt='$person[image]' class='pic' width='100' height='100'>";
                            }
                            else {
                                echo "<img src='img/required/person.jpg' alt='Person' class='pic' width='100' height='100'>";
                            }
                            echo "<div class='title'><h4>$person[name]</h4><h5>$person[job]</h5></div><ul class='details'><li>Ext: $person[phone]</li>";
                            if ($person['fax'] != "") {
                                echo "<li>Fax: $person[fax]</li>";
                            }
                            echo "<li>E-mail: <a href='mailto:$person[email]'>$person[email]</a></li></ul></li>";
                        }
                    }
                ?>
                    <br id="sep">
                </ul>

                <h2 style="text-align: center;">Employment and Training Staff</h2>
                <hr class="split">
                <ul id="directory">
                <?php
                    if (mysqli_num_rows($et_content)) {
                        while ($person = mysqli_fetch_array($et_content)) {
                            echo "<li class='person'>";
                            if ($person['image'] != "") {
                                echo "<img src='img/contact/$person[image]' alt='$person[image]' class='pic' width='100' height='100'>";
                            }
                            else {
                                echo "<img src='img/required/person.jpg' alt='Person' class='pic' width='100' height='100'>";
                            }
                            echo "<div class='title'><h4>$person[name]</h4><h5>$person[job]</h5></div><ul class='details'><li>Phone: $person[phone]</li>";
                            if ($person['fax'] != "") {
                                echo "<li>Fax: $person[fax]</li>";
                            }
                            echo "<li>E-mail: $person[email]</li></ul></li>";
                        }
                    }
                ?>
                    <br id="sep">
                </ul>

                <h2 style="text-align: center;">Hupa Family Resource Center</h2>
                <hr class="split">
                <ul id="directory">
                <?php
                    if (mysqli_num_rows($family_content)) {
                        while ($person = mysqli_fetch_array($family_content)) {
                            echo "<li class='person'>";
                            if ($person['image'] != "") {
                                echo "<img src='img/contact/$person[image]' alt='$person[image]' class='pic' width='100' height='100'>";
                            }
                            else {
                                echo "<img src='img/required/person.jpg' alt='Person' class='pic' width='100' height='100'>";
                            }
                            echo "<div class='title'><h4>$person[name]</h4><h5>$person[job]</h5></div><ul class='details'><li>Phone: $person[phone]</li>";
                            if ($person['fax'] != "") {
                                echo "<li>Fax: $person[fax]</li>";
                            }
                            echo "<li>E-mail: $person[email]</li></ul></li>";
                        }
                    }
                ?>
                    <br id="sep">
                </ul>

                <h2 style="text-align: center;">Hoopa TANF Projects</h2>
                <hr class="split">
                <ul id="directory">
                <?php
                    if (mysqli_num_rows($project_content)) {
                        while ($person = mysqli_fetch_array($project_content)) {
                            echo "<li class='person'>";
                            if ($person['image'] != "") {
                                echo "<img src='img/contact/$person[image]' alt='$person[image]' class='pic' width='100' height='100'>";
                            }
                            else {
                                echo "<img src='img/required/person.jpg' alt='Person' class='pic' width='100' height='100'>";
                            }
                            echo "<div class='title'><h4>$person[name]</h4><h5>$person[job]</h5></div><ul class='details'><li>Phone: $person[phone]</li>";
                            if ($person['fax'] != "") {
                                echo "<li>Fax: $person[fax]</li>";
                            }
                            echo "<li>E-mail: $person[email]</li></ul></li>";
                        }
                    }
                ?>
                    <br id="sep">
                </ul>

                <h2 style="text-align: center;">Hoopa TANF Substance Abuse Services</h2>
                <hr class="split">
                <ul id="directory">
                <?php
                    if (mysqli_num_rows($substance_content)) {
                        while ($person = mysqli_fetch_array($substance_content)) {
                            echo "<li class='person'>";
                            if ($person['image'] != "") {
                                echo "<img src='img/contact/$person[image]' alt='$person[image]' class='pic' width='100' height='100'>";
                            }
                            else {
                                echo "<img src='img/required/person.jpg' alt='Person' class='pic' width='100' height='100'>";
                            }
                            echo "<div class='title'><h4>$person[name]</h4><h5>$person[job]</h5></div><ul class='details'><li>Phone: $person[phone]</li>";
                            if ($person['fax'] != "") {
                                echo "<li>Fax: $person[fax]</li>";
                            }
                            echo "<li>E-mail: $person[email]</li></ul></li>";
                        }
                    }
                ?>
                    <br id="sep">
                </ul>
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
