<?php
session_start();

if(isset($_SESSION["LoginId"])){
    session_destroy();
    header("Location:index.php");
}
