<?php

$Error_email="";
$Error_pass="";
$arr =false;
$arr["email"] = $DATA->email;

if($arr["email"]==""){
    $Error.="Email is required <br>";
    $Error_email= "Email is required <br>";
}

$arr2["password"] = $DATA->password;
if($arr2["password"]==""){
    $Error.="password is required <br>";
    $Error_pass= "password is required <br>";
}


if($Error == ""){
$db=new database();
$query="select * from students where email = :email limit 1";
$result =$db->read($query,$arr);

        if(is_array($result) && count($result)>0){
            $result=$result[0];
             if($arr2["password"] == $result->password){
                $info->data_type="success";
                echo json_encode($info);
                $_SESSION["user_info"] =$result->user_id;
             }else{
                $info->pass_wrong="password is incorrect";
                  $info->data_type="Error";
                echo json_encode($info);
             }
            
        }else{
            $info->email_wrong="Email is not registered";
            $info->data_type="Error";
            echo json_encode($info);
        }
}else{
    $info->email=$Error_email;
    $info->pass=$Error_pass;
    $info->data_type="Error";
    $info->error=$Error;
    echo json_encode($info);
}