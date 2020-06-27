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
                    <a class="nav-link" href="https://www.knust.edu.gh/students/life/security">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.knust.edu.gh">KNUST WEBSITE</a>
                </li>
            </ul>
        </div>
    </nav>



    <div class="container mt-5 pt-5">
        <!-- Header and Search Button -->
        <div class="row">
            <div class="col">
                <h3 class="text-info float-left news-header mt-3">Missing Items Search Result</h3>
            </div>

            <div class="col">
                <ul class="nav nav-pills justify-content-end " id="pills-tab" role="tablist">
                    <a href="missing_items.php" class=" btn btn-info"> Back </a>
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

            <?='';
            if (isset($_POST["missing_search"])) {
                if (empty($_POST["missing_text"])) {
                    echo "<div class='alert alert-primary' role='alert'>
                                            Search field empty
                                      </div>";
                    // unset($search);
                } else {
                    $search = mysqli_real_escape_string($conn, $_POST["missing_text"]);

                    $sql = "SELECT Missing_ItemId, L.LoginId,Title,Missing_Content,Picture_Dir,Date,Time,Username,Contact
                    FROM Missing_Item,Login AS L
                    WHERE Missing_Item.LoginId = L.LoginId AND Title LIKE '%$search%' OR Missing_Content LIKE '%$search%' ";
                    $result = mysqli_query($conn, $sql);

                    $total_search = mysqli_num_rows($result);
                    // echo $total_search . ' results found <br />';
                    if ($total_search > 0) {
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <div class="col-xs-12 col-sm-12 col-lg-6 col-xl-6">
                                <div class="media">
                                    <img src="../TechSecurity_Data/uploads/Missing_Picture/<?php echo $row['Picture_Dir'] ?>" style="width:25%" class="align-self-start mr-3" alt="...">
                                    <div class="media-body">
                                        <div class="mt-0 sub-item"><?php echo $row["Title"]; ?></div>
                                        <p><?php echo $row["Missing_Content"]; ?>

                                            <span class="card-text"><small class="text-muted"> Officer's Details | <?php echo $row["Username"]; ?> - <?php echo $row["Contact"]; ?> On <?php echo $row["Date"]; ?> At <?php echo $row["Time"]; ?> </small></span></p>
                                    </div>
                                </div>
                            </div>

            <?php }
                    } else {
                        echo 'No result found';
                    }
                }
            }  ?>







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