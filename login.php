<?php
session_start();
// if (isset($_SESSION["LoginId"])) {
//     header("Location:page.php");
// } else {
?>

<!DOCTYPE html>
<html>
<script>

</script>

<head>
    <link rel="stylesheet" href="FontAwesome/css/all.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/font.css" rel="stylesheet" type="text/css">
    <script src="js/Bootstrapjquery.js"></script>
    <script src="js/Propper.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->
    <link href="stylesheet.css" rel="stylesheet" type="text/css">

    <script defer src="FontAwesome/js/all.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KNUST RECORD MANAGEMENT </title>
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

    <!-- Login Section -->
    <div class="card login-card text-center" >
        <h5 class="card-header text-light bg-info">KNUST SECURITY SYSTEM</h5>
        <div class="card-body bg-orange">
            <form id="login-form" action="include/login_confi.php" method="POST">
                <div class="form-group row">
                    <label class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-form-label ">Username</label>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
                        <input type="text" class="form-control" id="username" name="Username" autofocus required>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-12 col-md-4 col-lg-3  col-form-label">Password</label>
                    <div class="col-sm-12 col-md-6 col-lg-7">
                        <input type="password" class="form-control" id="Password" name="Password" required>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" class="btn btn-info form-control" value="Log In" id="submt-button" data-object="<?= $_POST['Password'] ?>">
                </div>
            </form>
        </div>
        <?php
        $fulUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        if (strpos($fulUrl, "Login=char") ==  true) {
            echo "
                                    <div class='alert alert-primary mt-3' role='alert'>
                                    Username must start with a character eg, daabbey3.
                                    </div>
                                ";
            exit();
        } elseif (strpos($fulUrl, "Login=failed") ==  true) {
            echo "
                                    <div class='alert alert-primary mt-3' role='alert'>
                                    Wrong password, user must be either a Student,Lecturer or an Officer
                                    </div>
                                ";
            exit();
        } elseif (strpos($fulUrl, "Signup=error") ==  true) {
            echo "
                                    <div class='alert alert-primary mt-3' role='alert'>
                                    Use the Submit button to submit form.
                                    </div>
                                ";
            exit();
        }
        ?>
    </div>



    <script src="js/page_animations.js"></script>
    <!-- Enables javasript to function -->
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>
</body>

</html>
<?php
// }
?>