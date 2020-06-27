<?php


$db_Servername = "localhost";
$db_Username = "root";
$db_Password = "";
$db_Name = "techsecurity";
// $db_Name = "crime_reporting_and_information_system";

$conn = mysqli_connect($db_Servername, $db_Username, $db_Password, $db_Name);

if (!$conn) {
    echo "Connection failed";
} else {
    // echo "Connection successful....<br />";
}
?>