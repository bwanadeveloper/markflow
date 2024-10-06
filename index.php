<?php
include "configs/autoload.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0px;
        }
        #wrapper{
            width:60%;
            margin:auto;
            /* text-align: center; */
            float:right;
            margin-top: 30px;
            background-color: white;
            display: flex;
        }
        input[type="text"]{
            width:30%;
            outline: none;
             border: solid thin black;
             padding:3px;
             border-radius: 2px;
            
            /* box-shadow: 0 0 0 1px black;  */
        }
        input[type="checkbox"]{
            border:none;
            accent-color: #41fccd;
        }
        input[type="button"]{
            border:none;
            border-radius: 4px;
            padding:5px;
            accent-color: #41fccd;
        }
        textarea{
            outline: none;
             border: solid thin black;
             padding:3px;
             border-radius: 2px;
        }
        #nav{
            /* background-color: orangered; */
            width:300px;
            height:100vh;
            margin: 0px;
            padding-top: 0px;
            margin-top: 40px;
            margin-left: 10px;
            position: absolute;
            left:0;
           
        }
        #nav label{
            display: block;
            height: 40px;
            background-color: cornflowerblue;
            /* border-left: solid 5px grey; */
            transition:all 0.5s ease;
        }
        #right_pannel h3{
            margin-bottom: 20px;
        }
        #nav h3{
            cursor: pointer;
        }
        #right_pannel{
            flex:4;
            
        }
        #left_pannel{
            flex:0;
            background-color: pink;
            transition:all 1s ease ;
            min-height: 400px;
        }
        #mess:checked ~ #left_pannel{
         flex:1;
        }

        input[type="radio"]{
            display: none;
        }
        input[type="button"]{
            padding:10px;
            border:thin black 1px;
        }
        .Error{
            position: absolute;
            right: 30px;
            background-color: orangered;
        }
        .Timeline{
            width:100%;
            height:25px; 
            background-color:#5BCD85;
            display:flex;
            gap:20px;
            overflow: hidden;
            vertical-align: center;
            font-size: 11px;
            
        }
        .Timeline .view{
            font-size: 11px;
            padding: 3px;
        }
        .Timeline:nth-child(even) {
            background-color: #5BCDB1;
        }
        #wrapper-view-missing{
         
            float: right;
            width:60%;
            margin: auto;
        }
        #wrapper-view-missing input[type="text"]{
            padding: 8px;
            border-radius: 5px; 
            width:30%; 
            border: solid 1px #41fccd;
            box-shadow: 0 0 3px 1px #41fccd;
        }
        #wrapper-view-missing select{
            padding: 8px;
            border-radius: 5px; 
            width:32.5%; 
            border: solid 1px #41fccd;
            box-shadow: 0 0 3px 1px #41fccd; 
        }
        #profile{
            display: flex;
        }
        #profile input[type="text"]{
            width:80%;
            padding: 8px;
            border-radius: 5px;
            border: solid 1px green;
        }
        #profile select{
            width:80%;
            padding: 8px;
            border-radius: 5px;
            border: solid 1px green;
        }

        #new_rec input[type="text"]{
            padding: 8px;
            border-radius: 5px; 
            width:60%; 
            border: solid 1px #41fccd;
            box-shadow: 0 0 3px 1px #41fccd;
        }
        #new_rec select{
            padding: 8px;
            border-radius: 5px; 
            width:67%; 
            border: solid 1px #41fccd;
            box-shadow: 0 0 3px 1px #41fccd;
            outline:none;
        }
        textarea{
            border-radius: 5px; 
            border: solid 1px #41fccd;
            box-shadow: 0 0 3px 1px #41fccd;
        }
        #new_rec{
            display: flex;
        }
    
    </style>
</head>
<body>
<?php
if (!empty($_GET["action"]) && $_GET["action"] === "view" && !empty($_GET["id"])):?>
   <?php
    $id = intval($_GET['id']); 
    $arr=false;
    $arr["Missing_id"]=$id;
    $sql = "SELECT * FROM missing_marks WHERE Missing_id = :Missing_id";
    $db = new database();
    
    $result=$db->read($sql,$arr);
    // print_r($result);
    $selectedSchool=$result[0]->School ;
    $selectedtrimester=$result[0]->Trimester;
    $name=$result[0]->Name ;
    $reg=$result[0]->Reg ;
    $unit=$result[0]->Unit;
    $lec=$result[0]->Lec ;
    $info=$result[0]->Info;
    $res_info=$result[0]->Res_info;
    $exam=$result[0]->Exam;
    $ass1=$result[0]->Ass1;
    $ass2=$result[0]->Ass2;
    $ass3=$result[0]->Ass3;
    $cat1=$result[0]->Cat1;
    $cat2=$result[0]->Cat2;
    $currentYear = date("Y");  // Current year
    $selectedyear =$result[0]->Year;
    
    // print_r($result)
  
    ?>
    <div id="wrapper-view-missing">
    <div style="margin-top:5px">
    <label style="display:block" for="Name">Name:</label>
    <input type="text" name="Name" value="<?= $name ?>" id="Name">

           
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Reg.No">Reg.No:</label>
            <input type="text" name="Reg.No" value=<?=$reg?> id="Reg.No">
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="School">School:</label>
            <select id="School" name="School">
                <option value="School" <?=$selectedSchool == "School" ? 'selected' : ''?>>School</option>
                <option value="Technology" <?= $selectedSchool == "Technology" ? 'selected' : ''?>>Technology</option>
                <option value="Business" <?= $selectedSchool == "Business" ? 'selected' : ''?>>Business</option>
                <option value="Education" <?= $selectedSchool == "Education" ? 'selected' : ''?>>Education</option>
            </select>
            
        </div>
         <div style="margin-top:5px">
        <label style="display:block" for="Trimester">Trimester:</label>
            <select id="Trimester" name="Trimester">
                <option value="Trimester" <?=$selectedtrimester == "Trimester" ? 'selected' : ''?>>Trimester</option>
                <option value="Trimester 1" <?= $selectedtrimester == "Trimester 1" ? 'selected' : ''?>>Trimester 1</option>
                <option value="Trimester 2" <?= $selectedtrimester == "Trimester 2" ? 'selected' : ''?>>Trimester 2</option>
                <option value="Trimester 3" <?= $selectedtrimester == "Trimester 3" ? 'selected' : ''?>>Trimester 3</option>
            </select>
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Year">Year:</label>
            <select id="Year" name="Year">
                <option value="Year" <?=$selectedyear == "Year" ? 'selected' : ''?>>Year</option>
                <option value="<?=$currentYear?>" <?= $selectedyear == $currentYear ? 'selected' : ''?>><?=$currentYear?></option>
                <option value="<?=$currentYear-1?>" <?= $selectedyear == $currentYear-1 ? 'selected' : ''?>><?=$currentYear-1?></option>
                <option value="<?=$currentYear-2?>" <?= $selectedyear == $currentYear-2 ? 'selected' : ''?>><?=$currentYear-2?></option>
                <option value="<?=$currentYear-3?>" <?= $selectedyear == $currentYear-3 ? 'selected' : ''?>><?=$currentYear-3?></option>
            </select>
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Unit">Unit:</label>
            <select id="Unit" name="Unit">
                <option value="Unit" <?=$unit == "Unit" ? 'selected' : ''?>>Unit</option>
                <option value="Application Programming" <?= $unit == "Application Programming" ? 'selected' : ''?>>Application Programming</option>
                <option value="Database Design and Development" <?= $unit == "Database Design and Development" ? 'selected' : ''?>>Database Design and Development</option>
                <option value="Fundamentals of Web Design" <?= $unit == "Fundamentals of Web Design" ? 'selected' : ''?>>Fundamentals of Web Design</option>
                <option value="Computing Mathematics" <?= $unit == "Computing Mathematics" ? 'selected' : ''?>>Computing Mathematics</option>
            </select>
            
        </div>



        <div style="margin-top:5px">
        <input type="checkbox" value="Exam" name="Exam" id="Exam" <?= $exam == 1 ? 'checked' : '' ?>>
            <label for="Exam">Exam</label>
        </div>

        <div style="margin-top:5px">
            <h5>Course Work</h5>
            <input type="checkbox" value="Ass1" name="Ass1" id="Ass1"<?= $ass1 == 1 ? 'checked' : '' ?> >
            <label for="Ass1">Ass1</label>
            <input type="checkbox" value="Ass2" name="Ass2" id="Ass2" <?= $ass2 == 1 ? 'checked' : '' ?>>
            <label for="Ass2">Ass2</label>
            <input type="checkbox" value="Ass3" name="Ass3" id="Ass3" <?= $ass3 == 1 ? 'checked' : '' ?>>
            <label for="Ass3">Ass3</label>
            <input type="checkbox" value="Cat1" name="Cat1" id="Cat1" <?= $cat1 == 1 ? 'checked' : '' ?>>
            <label for="Cat1">Cat1</label>
            <input type="checkbox" value="Cat2" name="Cat2" id="Cat2" <?= $cat2 == 1 ? 'checked' : '' ?>>
            <label for="Cat2">Cat2</label>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Lec">Lec:</label>
            <select id="Lec" name="Lec">
                <option value="Lecturer" <?=$lec == "Lecturer" ? 'selected' : ''?>>Lecturer</option>
                <option value="Zipporah Munene" <?= $lec == "Zipporah Munene" ? 'selected' : ''?>>Zipporah Munene</option>
                <option value="Mundian Wangeshi" <?= $lec == "Mundian Wangeshi" ? 'selected' : ''?>>Mundian Wangeshi</option>
                <option value="Sally Masinde" <?= $lec == "Sally Masinde" ? 'selected' : ''?>>Sally Masinde</option>
                <option value="Rodgers Abongo" <?= $lec == "Rodgers Abongo" ? 'selected' : ''?>>Rodgers Abongo</option>
            </select>
            
        </div>

       

        <div style="margin-top:5px">
            <textarea name="Info" id="info" rows="10" cols="40"><?=$info?></textarea>
            <label for="info">Info:</label>
        </div>
        <div style="margin-top:5px">
            <textarea name="Info" id="Res_info" rows="5" cols="40" disabled <?=$res_info?>></textarea>
            <label for="info">Reconsiliation Info:</label>
        </div>
        <div style="margin-top:5px">
            <input id="send" type="button" value="save" onclick="save_data(event)">
        </div>

        <div><a href="index.php"><input type="button" value="Go Back"></a></div>

    </div>
     <div id="nav">

    <label id="lab" class="New" style="border-top-left-radius:10px;" for="New Reconsiliation">New Reconsiliation</label>
    <label id="lab" style="border-left:10px solid pink;" class="Time" for="Reconsiliation Timeline">Reconsiliation Timeline</label>
    <label id="lab" class="All" for="All Reconsiliation">All Reconsiliation</label>
    <label id="lab" class="profile" for="Profile">Profile</label>
    <label id="lab" class="mess"  for="mess" >Messages</label>
    <label id="lab" class="Logout" style="border-bottom-left-radius:10px;" for="Logout" >Logout</label>
   </div>
   <?php elseif (!empty($_GET["action"]) && $_GET["action"] === "view_rec" && !empty($_GET["id"])): ?>
    <?php
    $id = intval($_GET['id']); 
    $arr=false;
    $arr["Missing_id"]=$id;
    $sql = "SELECT * FROM missing_marks WHERE Missing_id = :Missing_id";
    $db = new database();
    
    $result=$db->read($sql,$arr);
    // print_r($result);
    $selectedSchool=$result[0]->School ;
    $selectedtrimester=$result[0]->Trimester;
    $name=$result[0]->Name ;
    $reg=$result[0]->Reg ;
    $unit=$result[0]->Unit;
    $lec=$result[0]->Lec ;
    $info=$result[0]->Info;
    $res_info=$result[0]->Res_info;
    $exam=$result[0]->Exam;
    $ass1=$result[0]->Ass1;
    $ass2=$result[0]->Ass2;
    $ass3=$result[0]->Ass3;
    $cat1=$result[0]->Cat1;
    $cat2=$result[0]->Cat2;
    $currentYear = date("Y");  // Current year
    $selectedyear =$result[0]->Year;
    
    // print_r($result)
  
    ?>
    <div id="wrapper-view-missing">
    <div style="margin-top:5px">
    <label style="display:block" for="Name">Name:</label>
    <input type="text" name="Name" value="<?= $name ?>" id="Name">

           
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Reg.No">Reg.No:</label>
            <input type="text" name="Reg.No" value=<?=$reg?> id="Reg.No">
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="School">School:</label>
            <select id="School" name="School">
                <option value="School" <?=$selectedSchool == "School" ? 'selected' : ''?>>School</option>
                <option value="Technology" <?= $selectedSchool == "Technology" ? 'selected' : ''?>>Technology</option>
                <option value="Business" <?= $selectedSchool == "Business" ? 'selected' : ''?>>Business</option>
                <option value="Education" <?= $selectedSchool == "Education" ? 'selected' : ''?>>Education</option>
            </select>
            
        </div>
         <div style="margin-top:5px">
        <label style="display:block" for="Trimester">Trimester:</label>
            <select id="Trimester" name="Trimester">
                <option value="Trimester" <?=$selectedtrimester == "Trimester" ? 'selected' : ''?>>Trimester</option>
                <option value="Trimester 1" <?= $selectedtrimester == "Trimester 1" ? 'selected' : ''?>>Trimester 1</option>
                <option value="Trimester 2" <?= $selectedtrimester == "Trimester 2" ? 'selected' : ''?>>Trimester 2</option>
                <option value="Trimester 3" <?= $selectedtrimester == "Trimester 3" ? 'selected' : ''?>>Trimester 3</option>
            </select>
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Year">Year:</label>
            <select id="Year" name="Year">
                <option value="Year" <?=$selectedyear == "Year" ? 'selected' : ''?>>Year</option>
                <option value="<?=$currentYear?>" <?= $selectedyear == $currentYear ? 'selected' : ''?>><?=$currentYear?></option>
                <option value="<?=$currentYear-1?>" <?= $selectedyear == $currentYear-1 ? 'selected' : ''?>><?=$currentYear-1?></option>
                <option value="<?=$currentYear-2?>" <?= $selectedyear == $currentYear-2 ? 'selected' : ''?>><?=$currentYear-2?></option>
                <option value="<?=$currentYear-3?>" <?= $selectedyear == $currentYear-3 ? 'selected' : ''?>><?=$currentYear-3?></option>
            </select>
            
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Unit">Unit:</label>
            <select id="Unit" name="Unit">
                <option value="Unit" <?=$unit == "Unit" ? 'selected' : ''?>>Unit</option>
                <option value="Application Programming" <?= $unit == "Application Programming" ? 'selected' : ''?>>Application Programming</option>
                <option value="Database Design and Development" <?= $unit == "Database Design and Development" ? 'selected' : ''?>>Database Design and Development</option>
                <option value="Fundamentals of Web Design" <?= $unit == "Fundamentals of Web Design" ? 'selected' : ''?>>Fundamentals of Web Design</option>
                <option value="Computing Mathematics" <?= $unit == "Computing Mathematics" ? 'selected' : ''?>>Computing Mathematics</option>
            </select>
            
        </div>



        <div style="margin-top:5px">
        <input type="checkbox" value="Exam" name="Exam" id="Exam" <?= $exam == 1 ? 'checked' : '' ?>>
            <label for="Exam">Exam</label>
        </div>

        <div style="margin-top:5px">
            <h5>Course Work</h5>
            <input type="checkbox" value="Ass1" name="Ass1" id="Ass1"<?= $ass1 == 1 ? 'checked' : '' ?> >
            <label for="Ass1">Ass1</label>
            <input type="checkbox" value="Ass2" name="Ass2" id="Ass2" <?= $ass2 == 1 ? 'checked' : '' ?>>
            <label for="Ass2">Ass2</label>
            <input type="checkbox" value="Ass3" name="Ass3" id="Ass3" <?= $ass3 == 1 ? 'checked' : '' ?>>
            <label for="Ass3">Ass3</label>
            <input type="checkbox" value="Cat1" name="Cat1" id="Cat1" <?= $cat1 == 1 ? 'checked' : '' ?>>
            <label for="Cat1">Cat1</label>
            <input type="checkbox" value="Cat2" name="Cat2" id="Cat2" <?= $cat2 == 1 ? 'checked' : '' ?>>
            <label for="Cat2">Cat2</label>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Lec">Lec:</label>
            <select id="Lec" name="Lec">
                <option value="Lecturer" <?=$lec == "Lecturer" ? 'selected' : ''?>>Lecturer</option>
                <option value="Zipporah Munene" <?= $lec == "Zipporah Munene" ? 'selected' : ''?>>Zipporah Munene</option>
                <option value="Mundian Wangeshi" <?= $lec == "Mundian Wangeshi" ? 'selected' : ''?>>Mundian Wangeshi</option>
                <option value="Sally Masinde" <?= $lec == "Sally Masinde" ? 'selected' : ''?>>Sally Masinde</option>
                <option value="Rodgers Abongo" <?= $lec == "Rodgers Abongo" ? 'selected' : ''?>>Rodgers Abongo</option>
            </select>
            
        </div>

       

        <div style="margin-top:5px">
            <textarea name="Info" id="info" rows="10" cols="40"><?=$info?></textarea>
            <label for="info">Info:</label>
        </div>
        <div style="margin-top:5px">
            <textarea name="Info" id="Res_info" rows="5" cols="40" disabled ><?=$res_info?></textarea>
            <label for="info">Reconsiliation Info:</label>
        </div>
        <div style="margin-top:5px">
            <input id="send" type="button" value="save" onclick="save_data(event)">
        </div>

        <div><a href="index.php"><input type="button" value="Go Back"></a></div>

    </div>
     <div id="nav">

    <label id="lab" class="New" style="border-top-left-radius:10px;" for="New Reconsiliation">New Reconsiliation</label>
    <label id="lab"  class="Time" for="Reconsiliation Timeline">Reconsiliation Timeline</label>
    <label id="lab" style="border-left:10px solid pink;" class="All" for="All Reconsiliation">All Reconsiliation</label>
    <label id="lab" class="profile" for="Profile">Profile</label>
    <label id="lab" class="mess"  for="mess" >Messages</label>
    <label id="lab" class="Logout" style="border-bottom-left-radius:10px;" for="Logout" >Logout</label>
   </div>
<?php else:?>
  <div id="wrapper">
<input type="radio" id="New Reconsiliation" name="radio">
<input type="radio" id="Reconsiliation Timeline" name="radio">
<input type="radio" id="All Reconsiliation" name="radio">
<input type="radio" id="Profile" name="radio">
<input type="radio" id="mess" name="radio">
<input type="radio" id="Logout" name="radio">
<div id="left_pannel"></div>



<div class="Error"></div>
<div id="right_pannel">

</div>

   <div id="nav">

    <label id="lab" class="New" style="border-top-left-radius:10px;" for="New Reconsiliation">New Reconsiliation</label>
    <label id="lab" class="Time"  for="Reconsiliation Timeline">Reconsiliation Timeline</label>
    <label id="lab" class="All" for="All Reconsiliation">All Reconsiliation</label>
    <label id="lab" class="profile" for="Profile">Profile</label>
    <label id="lab" class="mess"  for="mess" >Messages</label>
    <label id="lab" class="Logout" style="border-bottom-left-radius:10px;" for="Logout" >Logout</label>
   </div>
   <script>
function _(id){
return document.querySelectorAll(id)
}

let view=_(".view")[0]
let labels=_("#lab");
labels.forEach(label => {
    label.addEventListener("click",function(){
    labels.forEach(l => l.style.border = "none");
    label.style.borderLeft = "10px solid pink"
    })
});


if (labels[3]) {
  labels[3].style.borderLeft = "10px solid pink";
  get_data({},"Profile")
}

let Time = _(".Time")[0]
let All = _(".All")[0]
let profile = _(".profile")[0]
let mess = _(".mess")[0]
let Err=_(".Error")[0]
let new_rec=_(".New")[0];
let Logout=_(".Logout")[0]
//sending nothing to get back the data for navbar
Time.addEventListener("click",()=>{
    get_data({},"Timeline")
    Err.innerHTML="";
})

All.addEventListener("click",()=>{
    get_data({},"All")
    Err.innerHTML="";
})

profile.addEventListener("click",()=>{
    get_data({},"Profile")
    Err.innerHTML="";
})
mess.addEventListener("click",()=>{
    get_data({},"Mess")
    Err.innerHTML="";
})
new_rec.addEventListener("click",()=>{
    get_data({},"New_Reconsiliation")
    Err.innerHTML="";
})
Logout.addEventListener("click",()=>{
    get_data({},"Logout")
    Err.innerHTML="";
})




let right_pannel=_("#right_pannel")[0]



let data={}
//First xml
function get_data(data,data_type){
let xml = new XMLHttpRequest()

xml.onload=function (){
if(xml.status==200 || xml.readyState==4){
// alert(xml.responseText)
handle_results(xml.responseText)
}
}
data.data_type=data_type
xml.open("POST","api.php",true)
data=JSON.stringify(data)
xml.send(data)
}
//handle responses
function handle_results(responses){
   let obj =JSON.parse(responses)
   switch(obj.data_type){
    case "login":
        if(obj.logged_in ==false){
            window.location="login.php"
        }
        break
    case "New_Reconsiliation":
      right_pannel.innerHTML=obj.message
       break
    case "Timeline":
        right_pannel.innerHTML=obj.message  
        break
    case "All":
        right_pannel.innerHTML=obj.message 
        break
    case "Profile":
        right_pannel.innerHTML=obj.message 
        break
    case "Mess":
        right_pannel.innerHTML=obj.message 
        break
    case "New_Rec":
        Err.innerHTML=obj.message
    case "Profile2":
        Err.innerHTML=obj.message
}

}
//new rec data
let new_rec_data={}

function send_data(){
    let inputs =document.getElementsByTagName("input")
    for (let i = 0; i < inputs.length; i++) {
        switch (inputs[i].name) {
            case "Unit":
                new_rec_data.Unit = inputs[i].value;
                break;
            case "Exam":
                new_rec_data.Exam = inputs[i].checked ? 1 : 0;  // Handle both checked and unchecked cases
                break;
            case "Ass1":
                new_rec_data.Ass1 = inputs[i].checked ? 1 : 0;
                break;
            case "Ass2":
                new_rec_data.Ass2 = inputs[i].checked ? 1 : 0;
                break;
            case "Ass3":
                new_rec_data.Ass3 = inputs[i].checked ? 1 : 0;
                break;
            case "Cat1":
                new_rec_data.Cat1 = inputs[i].checked ? 1 : 0;
                break;
            case "Cat2":
                new_rec_data.Cat2 = inputs[i].checked ? 1 : 0;
                break;
            case "Name":
                new_rec_data.Name = inputs[i].value;
                break;
            case "RegNo":
                new_rec_data.Reg = inputs[i].value;
                break;
            case "Lec":
                new_rec_data.Lec = inputs[i].value;
                break;
        }
    }
    new_rec_data.School= document.getElementById("School").value;
    new_rec_data.info= document.getElementById("info").value
    new_rec_data.Res_info=document.getElementById("Res_info").value
    new_rec_data.Trimester = document.getElementById("Trimester").value
    new_rec_data.Year = document.getElementById("Year").value
    new_rec_data.Unit = document.getElementById("Unit").value
    new_rec_data.Lec = document.getElementById("Lec").value
    console.log(Res_info)
    send_data2(new_rec_data,"New_Rec")
    
}
//new xml for new Rec
function send_data2(data, type) {
    let button=document.getElementById("send")
    button.value="...loading"
    button.disabled=true
    let xml2 = new XMLHttpRequest();
    xml2.onload = function () {
        if (xml2.status == 200 || xml2.readyState == 4) {
            // alert(xml2.responseText);
            handle_results(xml2.responseText);
            button.disabled=false
            button.value="Send"
        }
    };
    data.data_type = type;
    let jsonData = JSON.stringify(data);
    xml2.open("POST", "api.php", true);
    xml2.send(jsonData); // Send the JSON string
}
function send_data_Profile() {
    let inputs = document.getElementsByTagName("input");
    let data2 = {};

    for (let i = 0; i < inputs.length; i++) {
        switch (inputs[i].name) {
            case "Name":
                data2.Name = inputs[i].value;
                break;
            case "Reg":
                data2.Reg = inputs[i].value;
                break;
            case "Password":
                data2.Password = inputs[i].value;
                break;
            case "email" :
                data2.Email = inputs[i].value;
                break
            case "Username":
                data2.Username = inputs[i].value;
        }
    }

    data2.Campus = document.getElementById("campus").value;
    data2.School = document.getElementById("School").value;

    console.log(data2);
    get_data(data2, "Profile2");
}










   </script>
 


<?php endif?>
 
 
</body>
</html>