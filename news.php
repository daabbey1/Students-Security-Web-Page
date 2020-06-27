<?php
session_start();
include_once 'include/dbh.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <script src="js/Bootstrapjquery.js"></script>
    <script src="js/Propper.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <link rel="stylesheet" href="FontAwesome/css/all.css">

    <script defer src="FontAwesome/js/all.js"></script>

    <script src="js/page_animations.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <title> KNUST Crime Record Management </title>
</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

    <!-- Home Page Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">
            <img class="mx-3" src="images/images (1).jfif" style="width: 5%;" alt="knust_logo">
            <span class="f1">KNUST SECURITY SERVICE</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.knust.edu.gh/students/life/security">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="www.knust.edu.gh/">KNUST WEBSITE</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Breaking News -->
    <div class="container mt-3 pt-5">
        <!-- Header and Search Button -->
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <h3 class="text-info float-left news-header  search-text">Breaking News</h3>
            </div>

            <div class="col-xs-12 col-sm-8">
                <ul class="nav nav-pills justify-content-end search-button" id="pills-tab" role="tablist">
                    <form action="news_search.php" method="POST" class="form-inline form-control-lg my-2 my-lg-0 pl-0">
                        <input class="form-control form-control-lg mr-sm-0 col-9 border-right-0 border-info" type="search" name="news_text" placeholder="search news" style="border-radius: 5px 0px 0px 5px;" aria-label="Search">
                        <button class="btn btn-lg btn-outline-info form-control-lg col-2 my-2 my-sm-0 border-left-0" style="border-radius: 0px 5px 5px 0px;" type="submit" name="news_search"> <i class="fas fa-search"></i></button>
                    </form>
                </ul>
            </div>
        </div>


        <hr>

        <!--  Display all news from database -->
        <ul class="list-unstyled display_all_post mt-3 ">

            <?php
            $sql = "SELECT Title,News_Content,Time,Date FROM News";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="media">
                        <div class="media-body mb-4">
                            <h5 class="mt-0 mb-1 new-title"> <?= $row["Title"] ?> </h5>
                            <hr class="">
                            <?= $row["News_Content"] ?>
                            <p class="card-text"><small class="text-muted">Updated on <?= $row["Date"] ?> at <?= $row["Time"] ?> ago</small></p>
                        </div>
                    </li>
                <?php } ?>
                <hr class="shadow">
            <?php } ?>
        </ul>
    </div>


    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>