<?php

// print_r($DATA);
// die();
$arr=array();
$Error="";

    
$arr["Unit"]=htmlspecialchars($DATA->Unit);
if($arr["Unit"]==""){
    $Error.="please fill in the Unit <br>";
   
}else{
    if(strlen($arr["Unit"])<5){
    $Error.="please fill in a Unit with atleast 5 chars <br>";
    }
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
if(empty($arr["Lec"])){
    $Error.="please input your Lecturers Name <br>";
}
else{
    if(strlen($arr["Lec"])<3){
    $Error.="Lecturers name should be more chars <br>";
}
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
$query = "insert into missing_marks (Missing_id, User_id ,Unit ,Name,Reg ,School,Lec,Exam, Ass1,Ass2, Ass3,	Cat1, Cat2, Info,Res_info,Time,Resolved) VALUES (:Missing_id,:user_id,:Unit ,:Name ,:Reg,:School,:Lec,:Exam, :Ass1, :Ass2,	:Ass3, :Cat1, :Cat2,:Info,:Res_info,:Time,:Resolved)";
$db->write($query,$arr);
$info->data_type="New_Rec";
$info->message="You have successfully added a Reconsiliation";
echo json_encode($info);

}else{
$info->data_type="New_Rec";
$info->message=$Error;

echo json_encode($info);

}