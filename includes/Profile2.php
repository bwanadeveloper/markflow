<?php

$arr = array();
$Error = "";

// Validate and assign variables
$arr["Name"] = htmlspecialchars($DATA->Name);
if ($arr["Name"] == "") {
    $Error .= "please fill in the Name <br>";
} else {
    if (strlen($arr["Name"]) < 5) {
        $Error .= "please fill in a Name with at least 5 chars <br>";
    }
}

$arr["Reg"] = htmlspecialchars($DATA->Reg);
if ($arr["Reg"] == "") {
    $Error .= "please fill in your Reg <br>";
} else {
    if (strlen($arr["Reg"]) < 4) {
        $Error .= "please fill in a valid Reg.No <br>";
    }
}

$arr["Password"] = htmlspecialchars($DATA->Password);
if (empty($arr["Password"])) {
    $Error .= "please input your password <br>";
} else {
    if (strlen($arr["Password"]) < 3) {
        $Error .= "please add a Password with at least 3 characters <br>";
    }
}

$arr["username"] = htmlspecialchars($DATA->Username);
if (empty($arr["username"])) {
    $Error .= "please input your username <br>";
} else {
    if (strlen($arr["username"]) < 3) {
        $Error .= "please add a username with at least 3 characters <br>";
    }
}

$arr["email"] = htmlspecialchars($DATA->Email);
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if ($arr["email"] == "") {
    $Error .= "please fill in email <br>";
} else {
    if (!preg_match($email_pattern, $arr["email"])) {
        $Error .= "please fill in a valid email <br>";
    }
}

$arr["School"] = htmlspecialchars($DATA->School);
if ($arr["School"] == "School") {
    $Error .= "please select your School <br>";
}

$arr["Campus"] = htmlspecialchars($DATA->Campus);
if ($arr["Campus"] == "campus") {
    $Error .= "please select your Campus <br>";
}

$arr["user_id"] = $_SESSION["user_info"];

if ($Error == "") {
    $db = new database();

    // Corrected SQL query
    $query = "UPDATE students SET Username=:username, Name=:Name, Email=:email, Password=:Password, Reg_No=:Reg, School=:School, Campus=:Campus WHERE user_id=:user_id";

    // Run the query
    $db->write($query, $arr);

    $info->data_type = "Profile2";
    $info->message = "You have successfully saved your profile";
    echo json_encode($info);
} else {
    $info->data_type = "Profile2";
    $info->message = $Error;
    echo json_encode($info);
}
?>
