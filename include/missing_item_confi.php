<?php
session_start();
include_once 'dbh.php';

//echo $_GET['delete'];
if (isset($_POST['submit'])) {
    $missing_title      =       strtoupper($_POST["missing_title"]);
    $missing_content    =       $_POST["missing_content"];
    $contact            =       $_POST["contact"];
    $date               =       $_POST["date"];
    $time               =       $_POST["time"];

    //_____Variable For User Login Id_____
    $Login_ID = $_SESSION["LoginId"];

        //Taking recorde of Picture
        $file           =   $_FILES['picture_dir'];
        $file_Name      =   $_FILES['picture_dir']['name'];
        $file_Type      =   $_FILES['picture_dir']['type'];
        $file_TempName  =   $_FILES['picture_dir']['tmp_name'];
        $file_Error     =   $_FILES['picture_dir']['error'];
        $file_Size      =   $_FILES['picture_dir']['size'];

        $fileExt        =   explode('.', $file_Name);
        $file_ActualExt =   strtolower(end($fileExt));

        $allowed        =   array('jpeg', 'jpg', 'png');

        if (in_array($file_ActualExt, $allowed)) {
            if ($file_Error === 0) {
                if ($file_Size < 70000000) {

                    $picture     =   "missing_item" . $Login_ID . "." . $file_ActualExt;
                    $picture_dir =   '../uploads/Missing_Picture/' . $picture;

                    move_uploaded_file($file_TempName, $picture_dir);
                
                    //------Insertion Into Offence Type---------
                $sql    =  "INSERT INTO Missing_Item(LoginId,Title,Missing_Content,Picture_Dir,Contact,Date,Time)
                            VALUES ($Login_ID,'$missing_title','$missing_content','$picture','$contact','$date','$time');";
                    $result = mysqli_query($conn, $sql);

                $_SESSION['message'] = "Record has been saved successful";
                $_SESSION['msg_type'] = "success";
                    
                } else {
                    echo 'Size too large';
                }
            } else {
                echo 'Error uploading your file';
            }
        } else {
            echo 'File type must be .wav or .mp4';
        }
    header("Location:../missing_items.php?Post=updated");
}

if (isset($_GET['delete'])) {
    $ID = $_GET['delete'];
    $sql = 'DELETE FROM missing_item WHERE Missing_ItemId = '.$ID;
    $result = mysqli_query($conn,$sql);

    $_SESSION['message'] = "Record has been deleted";
    $_SESSION['msg_type'] = "danger";

    header("Location:../missing_items.php");

}


if (isset($_GET['edit'])){
    $edit_Id        =       $_GET['edit'];
    $edit_title     =       strtoupper($_GET["edit_title"]);
    $edit_content   =       $_GET["edit_content"];
    $edit_contact   =       $_GET["edit_contact"];
    $edit_date      =       $_GET["edit_date"];
    $edit_time      =       $_GET["edit_time"];

    //Taking recorde of Edited Picture
        $edit_file           =   $_FILES['edit_picture_dir'];
        $edit_file_Name      =   $_FILES['edit_picture_dir']['name'];
        $edit_file_Type      =   $_FILES['edit_picture_dir']['type'];
        $edit_file_TempName  =   $_FILES['edit_picture_dir']['tmp_name'];
        $edit_file_Error     =   $_FILES['edit_picture_dir']['error'];
        $edit_file_Size      =   $_FILES['edit_picture_dir']['size'];

        $fileExt        =   explode('.', $edit_file_Name);
        $file_ActualExt =   strtolower(end($fileExt));

        $allowed        =   array('jpeg', 'jpg', 'png');

        if (in_array($file_ActualExt, $allowed)) {
            if ($file_Error === 0) {
                if ($file_Size < 70000000) {

                    $edit_picture     =   "missing_item" . $Login_ID . "." . $file_ActualExt;
                    $picture_dir =   '../uploads/Missing_Picture/' . $picture;

                    move_uploaded_file($file_TempName, $picture_dir);
                
                //---> Inserting Edited item into missing table
                $sql    = "UPDATE Missing_Item
                            SET Title = '$edit_title',Missing_Content = '$edit_content',Picture_Dir = '$edit_picture',Contact = '$edit_contact',Date = '$edit_date',Time = '$edit_time'
                            WHERE Missing_ItemId = $edit_Id ;";
                $result = mysqli_query($conn, $sql);

                $_SESSION['message'] = "Record has been Edited successful";
                $_SESSION['msg_type'] = "success";
                    
                } else {
                    echo 'Size too large';
                }
            } else {
                echo 'Error uploading your file';
            }
        } else {
            echo 'File type must be .wav or .mp4';
        }
    //header("Location:../missing_items.php?Post=edited");
}


// if (isset($_GET['edit'])) {
//     $ID = $_GET['edit'];
//     $sql = 'SELECT * FROM missing_item WHERE Missing_ItemId = '.$ID;
//     $result = mysqli_query($conn,$sql);

//     if(mysqli_num_rows($result) > 0){
//         while ($row = mysqli_fetch_assoc($result)) {
//             $missing_title      =       $row["missing_title"];
//             $missing_content    =       $row["missing_content"];
//             $contact            =       $rowT["contact"];
//             $date               =       $row["date"];
//             $time               =       $row["time"];
//             $picture            =       $row["Picture_Dir"];
//         }
//     }

//     $_SESSION['message'] = "Record has been edited!";
//     $_SESSION['msg_type'] = "info";

//     header("Location: ../missing_items.php");

// }
?>