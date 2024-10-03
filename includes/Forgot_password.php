<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$Error_email="";
$Error_pass="";
$arr =false;
$arr["email"] = $DATA->email;

if($arr["email"]==""){
    $Error.="Email is required <br>";
    $Error_email= "Email is required <br>";
}


if($Error == ""){
$db=new database();
$query="select * from students where email = :email limit 1";
$result =$db->read($query,$arr);

        if(is_array($result) && count($result)>0){
            $result=$result[0];
            
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";  // Use the Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = "marixmem9@gmail.com";  // Your Gmail address
            $mail->Password = "cllf exbn vcsh xmul";  // Your Gmail App-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
            $mail->Port = 587;  // Port for TLS
        
            // Recipients
            $mail->setFrom("marixmem9@gmail.com", "Marks Reconsiliation");
            $mail->addAddress($result->email, $result->Username);  // Add a recipient
        
            // Content
            $mail->Subject = "Password Recovery";
            $mail->Body = "Here is your password: $result->password";
        
            // Send the email
            $mail->send();
            $info->data_type="success";
            $info->email_correct="Password has been sent to email";
            
            echo json_encode($info);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        
            
        }else{
            $info->email_wrong="Email is not registered";
            $info->data_type="Error";
            echo json_encode($info);
        }
}else{
    $info->email=$Error_email;
    $info->data_type="Error";
    $info->error=$Error;
    echo json_encode($info);
}