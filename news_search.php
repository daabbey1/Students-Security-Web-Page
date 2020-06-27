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

    <link href="css/style.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="FontAwesome/css/all.css">

    <script defer src="FontAwesome/js/all.js"></script>

    <script src="js/page_animations.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="stylesheet.css" rel="stylesheet" type="text/css">
    <title> KNUST Crime Record Management </title>
</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

    <!-- Home Page Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-0">
        <a class="navbar-brand" href="index.php">
            <img class="mx-3" src="images/images (1).jfif" style="width: 5%;" alt="knust_logo"> KNUST SECURITY SERVICE
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
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="www.knust.edu.gh/">KNUST WEBSITE</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Breaking News -->
    <div class="container mt-5 pt-5">
        <!-- Header and Search Button -->
        <div class="row">
            <div class="col">
                <h3 class="text-info float-left news-header mt-3">Breaking News Search Result</h3>
            </div>

            <div class="col">
                <ul class="nav nav-pills justify-content-end " id="pills-tab" role="tablist">
                    <a href="news.php" class=" btn btn-info"> View All </a>
                </ul>
            </div>
        </div>


        <hr>

        <!--  Display all news from database -->
        <ul class="list-unstyled display_all_post">
            <li class="media">


                <?php
                if (isset($_POST["news_search"])) {
                    if (empty($_POST["news_text"])) {
                        echo "<div class='alert alert-primary' role='alert'>
                                            Search field empty
                                      </div>";
                        // unset($search);
                    } else {
                        $search = mysqli_real_escape_string($conn, $_POST["news_text"]);

                        $sql = "SELECT Title,News_Content,Time,Date 
                                FROM News
                                WHERE Title LIKE '%$search%' OR News_Content LIKE '%$search%' ";
                        $result = mysqli_query($conn, $sql);


                        $total_search = mysqli_num_rows($result);
                        // echo $total_search . ' results found <br />';
                        if ($total_search > 0) {
                            while ($row = mysqli_fetch_assoc($result)) { ?>


                                <div class="media-body mb-4">
                                    <h5 class="mt-0 mb-1"> <?php echo $row["Title"] ?> </h5>
                                    <?php echo $row["News_Content"] ?>
                                    <p class="card-text"><small class="text-muted">Updated on <?php echo $row["Date"] ?> at <?php echo $row["Time"] ?> ago</small></p>
                                </div>

                <?php }
                        } else {
                            echo 'No result found';
                        }
                    }
                }  ?>
                
            </li>
            <span class="text-info"> <?php echo $total_search ?> results found</span> <br />
        </ul>
    </div>
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>