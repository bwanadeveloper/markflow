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
 </style>
</head>
<body>
 
    <div id="wrapper">
    <h3 class="sin p"style="text-align: center;">Login</h3>
    <div id="input">
    <div id="em_Error"></div>
    <div><input id="email" type="text" placeholder="email"></div>
    <div id="pass_Error"></div>
    <div><input id="password" type="text" placeholder="password"></div>
    </div>
    <div style="text-align:center;margin-top:40px;">
        <input id="submit" type="button" value="Login"></div>
    <div style="text-align:center;padding-top:30px;"><a href="signup.php">Dont have an account Signup</a></div>
    <div style="text-align:center;padding-top:50px;"><a  href="Forgot_password.php">Forgot password</a></div>
    </div>
    
</body>
<script>
function _(id){
return document.getElementById(id);
}
let em_Error=_("em_Error")
let pass_Error=_("pass_Error")

let btn =_("submit")
btn.addEventListener("click",send_data)

data = {}
let input = document.getElementsByTagName("input")

 
function send_data(){
for(let i = 0;i<input.length-1;i++){
        switch(input[i].id){
        case "email":
        data.email=input[i].value
        break
        case "password":
        data.password=input[i].value
        break
        }
}
get_data(data,"Login")
}



function get_data(find, type) {
    let xml = new XMLHttpRequest();
    xml.onload = function () {
        if (xml.readyState == 4 && xml.status == 200) {
            // Output the server response in the console
            // alert(xml.responseText)
            handle_result(xml.responseText);
        }
    };
    find.data_type = type;
    xml.open("POST", "api.php", true);
    let data_string = JSON.stringify(find);
    xml.send(data_string);
}

function handle_result(results) {
    const result = JSON.parse(results);

    switch (result.data_type) {
        case "Error":
            if (result.email_wrong) {
                em_Error.innerHTML = result.email_wrong;
            }
            if (result.pass_wrong) {
                pass_Error.innerHTML = result.pass_wrong;
            }
            if (result.email) {
                em_Error.innerHTML = result.email;
            }
            if (result.pass) {
                pass_Error.innerHTML = result.pass;
            }
            break;
        case "success" :
            em_Error.innerHTML = "success";
            pass_Error.innerHTML = "success";
            setTimeout(()=>{
            window.location= "index.php"
            },1000)
               
    }
}

</script>
</html>



