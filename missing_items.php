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

    <link href="stylesheet.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KNUST Crime Record Management </title>
</head>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

    <!-- Home Page Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-0">
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
                    <a class="nav-link" href="https://www.knust.edu.gh">KNUST WEBSITE</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Header and Search Button -->
    <div class="container mt-5 pt-5">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <h3 class="text-info float-left news-header search-text">Missing Items</h3>
            </div>

            <div class="col-xs-12 col-sm-8">
                <ul class="nav nav-pills justify-content-end search-button " id="pills-tab" role="tablist">
                    <form action="missing_search.php" method="POST" class="form-inline form-control-lg my-2 my-lg-0 pl-0  ">
                        <input class="form-control form-control-lg mr-sm-0 col-9 border-right-0 border-info" name="missing_text" type="search" placeholder="search item" style="border-radius: 5px 0px 0px 5px;" aria-label="Search">
                        <button class="btn btn-lg btn-outline-info form-control-lg col-2 my-2 my-sm-0 border-left-0" style="border-radius: 0px 5px 5px 0px;" name="missing_search" type="submit"> <i class="fas fa-search"></i></button>
                    </form>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">
        <hr>
    </div>


    <!-- Display Missing Items -->
    <div class="container mt-5 all-missing-item">
        <div class="row">

            <?php
            $sql = "SELECT Missing_ItemId, L.LoginId,Title,Missing_Content,Picture_Dir,Date,Time,Username,Contact
            FROM Missing_Item,Login AS L
            WHERE Missing_Item.LoginId = L.LoginId";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <!-- <form action="include/missing_item_confi.php" method="GET" enctype="multipart/form-data"> -->
                    <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6">
                        <div class="media">
                            <img src="../TechSecurity_Data/uploads/Missing_Picture/<?php echo $row['Picture_Dir'] ?>" style="width:25%;" class="align-self-start mr-3" alt="...">
                            <div class="media-body">
                                <div class="mt-0 sub-item missing-title"><?php echo $row["Title"]; ?></div>
                                <p> <span class="missing-content"><?php echo $row["Missing_Content"]; ?> </span>

                                    <span class="card-text"><small class="text-muted"> Officer's Details | <?php echo $row["Username"]; ?> - <?php echo $row["Contact"]; ?> On <?php echo $row["Date"]; ?> At <?php echo $row["Time"]; ?> </small></span></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } ?>

        </div>


    </div>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })

        $(".view").on('items-table', 'click', function(e) {
            e.preventDefault();
            let data = $(this).data('object');
            console.log(data);
        });
    </script>



</body>

</html>