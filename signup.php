<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>

 <style>
    #wrapper{
        height: 550px;
        width:35%;
        background-color: #fff;
        margin: auto;
        box-shadow: 0 0 15px 1px black;
        border-radius: 25px;
       
        
    }
    input[type="text"]{
       padding: 10px;
       border-radius: 10px;
       border: none;
       outline: none;
       width:60%;
       background-color: lightgray;
       margin-top: 10px;
       
       
    }

    input[type="button"]{
       padding: 10px;
       border-radius: 10px;
       border: none;
       outline: none;
       
       background-color: lightgray;
       margin-top: 10px;
       cursor:pointer
       
    }
    #input{
        text-align: center;
        margin-top: 90px;
    }

    .sin.p{
        font-size: 50px;
        padding-top: 50px;
        
    }

    a{
        text-decoration: none;
    }
    #user_err,#email_err,#pass_err{
        font-size: 12px;
        padding-top: 5px;
    }
 </style>
</head>
<body>
    <div id="wrapper">
    <h3 class="sin p"style="text-align: center;">Signup</h3>
    <div id="input">
    <div id="user_err"></div>
    <div><input id="username" type="text" placeholder="username"></div>
    <div id="email_err"></div>
    <div><input id="email" type="text" placeholder="email"></div>
    <div id="pass_err"></div>
    <div><input id="password" type="text" placeholder="password"></div>
    </div>
    <div style="text-align:center;margin-top:40px;">
        <input id="submit" type="button" value="Signup"></div>
    <div style="text-align:center;padding-top:30px;"><a href="login.php">have an account login</a></div>
    </div>
    
</body>
<script>
function _(id){
return document.getElementById(id);
}
let Errors =_("Error")
let user_err = _("user_err")
let email_err=_("email_err")
let pass_err=_("pass_err")


let btn =_("submit")
btn.addEventListener("click",send_data)

data = {}
let input = document.getElementsByTagName("input")

 
function send_data(){
for(let i = 0;i<input.length-1;i++){
        switch(input[i].id){
        case "username":
        data.username=input[i].value
        break
        case "email":
        data.email=input[i].value
        break
        case "password":
        data.password=input[i].value
        break
        }
}
get_data(data,"signup")
  
}




function get_data(find, type) {
  btn.value="loading..."
  btn.disabled = true;
    let xml = new XMLHttpRequest();
    xml.onload = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            // Output the server response in the console
            // alert(xml.responseText)
            handle_results(xml.responseText);
            btn.value="signup";
            btn.disabled = false;
        }
    };
    find.data_type = type;
    xml.open("POST", "api.php", true);
    let data_string = JSON.stringify(find);
    xml.send(data_string);
}

function handle_results(responses){
let response=JSON.parse(responses);
switch(response.data_type){
case "Error":
  email_err.innerHTML=response.email
  user_err.innerHTML=response.username
  pass_err.innerHTML=response.password
  const afterStyle = window.getComputedStyle(pass_err, '::after');
 
  break

  case "Success":
    email_err.innerHTML="success";
  user_err.innerHTML="success";
  pass_err.innerHTML="success";

  setTimeout(()=>{
    window.location="login.php";
            },1000)
   
    break
}

}



</script>
</html>



