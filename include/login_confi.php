
<?php
session_start();

include_once 'dbh.php';

if (!isset($_POST['submit'])) {


    $USERNAME = mysqli_escape_string($conn, strtoupper($_POST['Username'])) ;
    $PASSWORD = mysqli_escape_string ($conn, strtoupper($_POST['Password']));

    //Check if input character is valid
    if (!preg_match("/^[a-zA-Z]*$/", $USERNAME)) {
        header("Location:../login.php?Login=char");
        exit();
    } 
    //Compare password with OFFICER, STUDENT AND LECTURER
    elseif (!($PASSWORD == "OFFICER" || $PASSWORD == "STUDENT" || $PASSWORD == "LECTURER")) {
        header("Location:../login.php?Login=failed");
        exit();

    }else {
        $sql = "SELECT *
                FROM Login
                WHERE Username = '$USERNAME' AND Password = '$PASSWORD';";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            //Store USERNAME and ID in session
            $_SESSION["Usernmae"] = $row["Username"];
            $_SESSION["LoginId"] = $row["LoginId"];
            $_SESSION["Password"] = $row["Password"];
            
            header("Location:../FIR.php?Login=succesful");
        }else{
            
            //Store USERNAME in session
            $_SESSION["Usernmae"] = $USERNAME;
            $_SESSION["Password"] = $PASSWORD;

            //Insertion of Data into Login database
            $sql = "INSERT INTO Login(Username,Password) VALUE ('$USERNAME','$PASSWORD');";
            $result = mysqli_query($conn, $sql);

            //Fetches the last inserted ID of the login credential
            $_SESSION["LoginId"] = $last = mysqli_insert_id($conn);

            header("Location:../FIR.php?Login=succesful");
        }
    }
} else {
    header("Location:../login.php?Signup=error");
}
?>