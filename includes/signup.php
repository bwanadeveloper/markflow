<?php

$arr=array();
$Error_username="";
$Error_email="";
$Error_password="";
    


$arr["username"]=htmlspecialchars($DATA->username);
if($arr["username"]==""){
    $Error.="please fill in a username <br>";
    $Error_username="please fill in a username <br>";
}else{
    if(strlen($arr["username"])<5){
    $Error.="please fill in a username with atleast 5 chars <br>";
    $Error_username.="please fill in a username with atleast 5 chars <br>";
    }
}

$arr["email"]=htmlspecialchars($DATA->email);
$email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
 if($arr["email"]==""){
    $Error.="please fill in email <br>";
    $Error_email="please fill in email <br>";
    }else{
        if(!preg_match($email_pattern, $arr["email"])){
            $Error.="please fill in a valid email <br>";
            $Error_email.="please fill in a valid email <br>";
        }
    }


$arr["password"]=$DATA->password;
if(empty($arr["password"])){
    $Error.="please input a password <br>";
    $Error_password="please input a password <br>";
}
else{
    if(strlen($arr["password"])<6){
    $Error.="please add characterss to be atleast 6 <br>";
    $Error_password.="please add characterss to be atleast 6 <br>";
}


}

if($Error==""){
    $arr["user_id"]=getRandomNumber(20);
$db=new database();
$query = "insert into students (user_id, username, email, password) VALUES (:user_id, :username, :email, :password)";
$db->write($query,$arr);
$info->data_type="Success";
$info->message="You have successfully signed up";
echo json_encode($info);

}else{
$info->data_type="Error";
$info->message=$Error;
$info->username=$Error_username;
$info->email=$Error_email;
$info->password=$Error_password;

echo json_encode($info);

}