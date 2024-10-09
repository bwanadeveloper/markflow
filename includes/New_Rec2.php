<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;



// print_r($DATA);
// die();
$arr=array();
$Error="";

    
$arr["Unit"]=htmlspecialchars($DATA->Unit);
if($arr["Unit"]=="Unit"){
    $Error.="please select the Unit <br>";
   
}

$arr["Name"]=htmlspecialchars($DATA->Name);
 if($arr["Name"]==""){
    $Error.="please fill in your Name <br>";
    }else{
        if(strlen($arr["Name"])<5){
            $Error.="please fill in a your full name <br>";
        }
    }


$arr["Reg"]=htmlspecialchars($DATA->Reg);
if(empty($arr["Reg"])){
    $Error.="please input your Registration number <br>";
}
else{
    if(strlen($arr["Reg"])<3){
    $Error.="please add a Reg.No with atlest 3 characters <br>";
}
}

$arr["Lec"]=htmlspecialchars($DATA->Lec);
if($arr["Lec"]=="Lecturer"){
    $Error.="please select your Lecturer's Name <br>";
}
$arr["Year"]=htmlspecialchars($DATA->Year);
if($arr["Year"]=="Year"){
    $Error.="please select your Year <br>";
}
$arr["Trimester"]=htmlspecialchars($DATA->Trimester);
if($arr["Trimester"]=="Trimester"){
    $Error.="please select your Trimester <br>";
}

$arr["School"]=htmlspecialchars($DATA->School);
if($arr["School"]=="School"){
    $Error.="please select your School <br>";
}

$arr["Info"]=htmlspecialchars($DATA->info);
if(empty($arr["Info"])){
    $Error.="please input your short info <br>";
}

$arr["Res_info"]=htmlspecialchars($DATA->Res_info);
if(!empty($arr["Res_info"])){
    $Error.="please dont fill in Res_info it's for upper management <br>";
}

if($DATA->Exam==0 && $DATA->Ass1==0 && $DATA->Ass2==0 && $DATA->Ass3==0 && $DATA->Cat1==0 && $DATA->Cat2==0){
    $Error.="please select what's Missing <br>";
}
$arr["Ass1"]=$DATA->Ass1;
$arr["Ass2"]=$DATA->Ass2;
$arr["Ass3"]=$DATA->Ass3;
$arr["Cat1"]=$DATA->Cat1;
$arr["Cat2"]=$DATA->Cat2;
$arr["Exam"]=$DATA->Exam;
$arr["user_id"]=$_SESSION["user_info"];
$arr["Time"] = date("Y-m-d H:i:s");
$arr["Resolved"]=0;
// 	Missing_id	Unit	Name	Reg	School	Ass1	Ass2	Ass3	Cat1	Cat2

if($Error==""){

$arr["Missing_id"]=getRandomNumber(20,7);
$db=new database();
$query = "insert into missing_marks (Missing_id, User_id ,Unit ,Name,Reg ,School,Lec,Exam, Ass1,Ass2, Ass3,	Cat1, Cat2, Info,Trimester,Year,Res_info,Time,Resolved) VALUES (:Missing_id,:user_id,:Unit ,:Name ,:Reg,:School,:Lec,:Exam, :Ass1, :Ass2,	:Ass3, :Cat1, :Cat2,:Info,:Trimester,:Year,:Res_info,:Time,:Resolved)";
$db->write($query,$arr);
$info->data_type="New_Rec";
$info->message="You have successfully added a Reconsiliation";
echo json_encode($info);
$mail = new PHPMailer(true);
$query2 = "SELECT * FROM admin";
$result = $db->read($query2);

if (is_array($result) && count($result) > 0) {
    foreach ($result as $admin) {
        try {
            // Create a new instance of PHPMailer for each iteration to avoid conflicts
            $mail = new PHPMailer(true);

            // Server settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";  // Use the Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = "marixmem9@gmail.com";  // Your Gmail address
            $mail->Password = "cllf exbn vcsh xmul";  // Your Gmail App-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption
            $mail->Port = 587;  // Port for TLS

            // Recipients
            $mail->setFrom("marixmem9@gmail.com", "Marks Reconciliation");
            $mail->addAddress($admin->Email, $admin->Username);  // Add a recipient

            // Content
            $mail->Subject = "Marks Reconciliation";
            $mail->Body = "Please act on this mark to be reconciled: " . $arr["Missing_id"];

            // Send the email
            $mail->send();
            // echo "Email sent successfully to {$admin->Email}<br>";
        } catch (Exception $e) {
            echo "Message could not be sent to {$admin->Email}. Mailer Error: {$mail->ErrorInfo}<br>";
        }
    }
}

}else{
$info->data_type="New_Rec";
$info->message=$Error;

echo json_encode($info);

}