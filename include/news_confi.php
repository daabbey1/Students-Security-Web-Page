<?php
session_start();
include_once 'dbh.php';


if (isset($_POST['submit'])) {
    $Title          =   $_POST['Title'];
    $News_content   =   $_POST['News_content'];
    $link_source    =   $_POST['link_source'];
    $contact        =   $_POST['contact'];
    $Date           =   $_POST['Date'];
    $Time           =   $_POST['Time'];

    //_____Variable For User Login Id_____
    $Login_ID = $_SESSION["LoginId"];

    $sql    =   "INSERT INTO News(LoginId,Title,News_Content,Source_Or_Link,Contact,Date,Time)
                VALUES ($Login_ID,'$Title','$News_content','$link_source','$contact','$Date','$Time');";
    $result = mysqli_query($conn, $sql);

    header("Location: ../news.php");
}

//_______Delete selected news________
if (isset($_GET['delete'])) {
    $ID = $_GET['delete'];
    $sql = "DELETE FROM News WHERE NewsId = ".$ID;
    $result = mysqli_query($conn,$sql);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("Location:../news.php");
}

//_______Edite selected news_________
if(isset($_GET['edit'])){
    $ID = $_GET['edit'];
    $news_title          =   $_GET['news_title'];
    $news_content        =   $_GET['news_content'];
    $news_link_source    =   $_GET['news_link_source'];
    $news_contact        =   $_GET['news_contact'];
    $news_date           =   $_GET['news_date'];
    $news_time           =   $_GET['news_time'];

    $sql    =   "INSERT INTO News(Title,News_Content,Source_Or_Link,Contact,Date,Time)
                VALUES ($ID,'$news_title','$news_content','$news_link_source','$news_contact','$news_date','$news_time');
                WHERE NewsId = $ID";
    $result = mysqli_query($conn, $sql);

    $_SESSION['message'] = "Record has been Edited successful";
    $_SESSION['msg_type'] = "success";

    header("Location:../news.php");
}
?>