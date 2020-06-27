<?php
session_start();
include_once 'dbh.php';

$Fname               = " "; 
$Mname               = " ";
$Lname               = " ";
$Program             = " ";
$Year                = " ";
$Hostel              = " ";
$Room_Numb           = " ";
$Others              = " ";
$Email               = " ";
$Contact             = " ";
$Relationship        = " "; 
$Detail_Relation     = " ";

//_______Edite selected news_________
if(isset($_GET['view'])){
    $ID = $_GET['view'];
echo 'pol';
    $sql = "SELECT ComplainantId,LoginId, ReportId, OffenceId, Fname, Mname, Lname, Program, Year, Hostel, Room_Numb, Others, Email, Contact, Relationship,Detail_Relation
            FROM Complainant
            WHERE ComplainantId = ".$ID;
    $result = mysqli_query($conn,$sql);
    
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $ComplainantId       = $row['ComplainantId'];
        $LoginId             = $row['LoginId'];
        $ReportId            = $row['ReportId'];
        $OffenceId           = $row['OffenceId'];
        $Fname               = $row['Fname'];
        $Mname               = $row['Mname'];
        $Lname               = $row['Lname'];
        $Program             = $row['Program'];
        $Year                = $row['Year'];
        $Hostel              = $row['Hostel'];
        $Room_Numb           = $row['Room_Numb'];
        $Others              = $row['Others'];
        $Email               = $row['Email'];
        $Contact             = $row['Contact'];
        $Relationship          = $row['Relationship'];
        $Detail_Relation       = $row['Detail_Relation'];
    }

    // $news_title          =   $_GET['news_title'];
    // $news_content        =   $_GET['news_content'];
    // $news_link_source    =   $_GET['news_link_source'];
    // $news_contact        =   $_GET['news_contact'];
    // $news_date           =   $_GET['news_date'];
    // $news_time           =   $_GET['news_time'];

    // $sql    =   "INSERT INTO News(Title,News_Content,Source_Or_Link,Contact,Date,Time)
    //             VALUES ($ID,'$news_title','$news_content','$news_link_source','$news_contact','$news_date','$news_time');
    //             WHERE NewsId = $ID";
    // $result = mysqli_query($conn, $sql);

    // $_SESSION['message'] = "Record has been Edited successful";
    // $_SESSION['msg_type'] = "success";

     //header("Location:../cases.php");
}
