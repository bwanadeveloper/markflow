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
        }
        input[type="button"]{
            border:none;
            border-radius: 4px;
            padding:5px;
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
        .Error{
            position: absolute;
            right: 30px;
            background-color: orangered;
        }

    </style>
</head>
<body>
   
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
    <label id="lab" class="Time" for="Reconsiliation Timeline">Reconsiliation Timeline</label>
    <label id="lab" class="All" for="All Reconsiliation">All Reconsiliation</label>
    <label id="lab" class="profile" for="Profile">Profile</label>
    <label id="lab" class="mess"  for="mess" >Messages</label>
    <label id="lab" class="Logout" style="border-bottom-left-radius:10px;" for="Logout" >Logout</label>
   </div>

   <script>
function _(id){
return document.querySelectorAll(id)
}


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
alert(xml.responseText)
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
            case "Reg.No":
                new_rec_data.Reg = inputs[i].value;
                break;
            case "Lec":
                new_rec_data.Lec = inputs[i].value;
                break;
        }
    }
    new_rec_data.School= document.getElementById("School").value;
    new_rec_data.info= document.getElementById("info").value
    send_data2(new_rec_data,"New_Rec")
    
}
//new xml for new Rec
function send_data2(data, type) {
    let xml2 = new XMLHttpRequest();
    xml2.onload = function () {
        if (xml2.status == 200 || xml2.readyState == 4) {
            alert(xml2.responseText);
            handle_results(xml2.responseText);
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
</body>
</html>