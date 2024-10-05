<?php
session_start();
include "configs/autoload.php";
$Error = "";
$info = (object)[];

$RAW_DATA = file_get_contents("php://input");
$DATA = json_decode($RAW_DATA);

if (isset($DATA->data_type) && $DATA->data_type != "signup" && $DATA->data_type != "Login" && $DATA->data_type!="Forgot_password") {
    if (!isset($_SESSION["user_info"])) {
        $info->logged_in = false;
        $info->data_type = "login";
        echo json_encode($info);
        return; // Stop further processing
    }
} 

if (isset($DATA->data_type) && $DATA->data_type == "signup") {
    include "includes/signup.php";

} elseif (isset($DATA->data_type) && $DATA->data_type == "Login") {
    include "includes/login.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "Forgot_password") {
    include "includes/Forgot_password.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "New_Reconsiliation") {
    include "includes/New_Rec1.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "Timeline") {
    include "includes/Timeline.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "All") {
   include "includes/All.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "Profile") {
   include "includes/Profile.php";
} elseif (isset($DATA->data_type) && $DATA->data_type == "Mess") {
   include "includes/Mess.php";
}elseif (isset($DATA->data_type) && $DATA->data_type == "New_Rec") {
   include "includes/New_Rec2.php";
}elseif (isset($DATA->data_type) && $DATA->data_type == "Logout") {
    include "includes/Logout.php"; 
 }elseif (isset($DATA->data_type) && $DATA->data_type == "Profile2") {
    include "includes/Profile2.php";
   
 }