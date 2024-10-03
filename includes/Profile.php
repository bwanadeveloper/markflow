<?php
$new_rec = "";
$db = new database();
$arr = [];
$arr["user_id"] = $_SESSION["user_info"];
$query = 'SELECT * FROM students WHERE user_id = :user_id limit 1';

$Result = $db->read($query, $arr);


if (is_array($Result) && count($Result)>0) {
    $selectedSchool = htmlspecialchars($Result[0]->school);
    $selectedcampus = htmlspecialchars($Result[0]->campus);
    $name = htmlspecialchars($Result[0]->name);
    $reg = htmlspecialchars($Result[0]->reg_no);
    $password = htmlspecialchars($Result[0]->password);
    $email=htmlspecialchars($Result[0]->email);
    $user_id = htmlspecialchars($Result[0]->user_id);
    $Username=htmlspecialchars($Result[0]->Username);
    $new_rec = '
    <div>
        <h3>Profile</h3>
        <select id="School" name="School">
            <option value="School" ' . ($selectedSchool == "School" ? 'selected' : '') . '>School</option>
            <option value="Technology" ' . ($selectedSchool == "Technology" ? 'selected' : '') . '>Technology</option>
            <option value="Business" ' . ($selectedSchool == "Business" ? 'selected' : '') . '>Business</option>
            <option value="Education" ' . ($selectedSchool == "Education" ? 'selected' : '') . '>Education</option>
        </select>
        <label for="School">School of</label>
    </div>
 <div style="margin-top:10px">
        <input type="text" name="User_id" id="user_id" disabled value="' . $user_id . '"><label for="user_id">User_id</label>
    </div>

     <div style="margin-top:10px">
        <input type="text" name="Username" id="Username" value="' . $Username . '"><label for="Name">Username</label>
    </div>

    <div style="margin-top:10px">
        <input type="text" name="Name" id="Name" value="' . $name . '"><label for="Name">Name</label>
    </div>

    <div style="margin-top:5px">
        <input type="text" name="Reg" id="Reg" value="' . $reg . '"><label for="Reg">Reg</label>
    </div>

    <div style="margin-top:5px">
        <input type="text" name="Password" id="Password" value="'.$password.'" ><label for="Password">Password</label>
    </div>

    <div style="margin-top:5px">
        <input type="text" name="email" id="email" value="'.$email.'" ><label for="email">email</label>
    </div>
         <select id="campus" name="campus">
            <option value="campus" ' . ($selectedcampus == "campus" ? 'selected' : '') . '>campus</option>
            <option value="Main" ' . ($selectedcampus == "Main" ? 'selected' : '') . '>Main</option>
            <option value="Western" ' . ($selectedcampus == "Western" ? 'selected' : '') . '>Western</option>
           
        </select>
    <label for="Campus">Campus:</label>
    
    <div style="margin-top:5px">
        <input id="send" type="button" value="save" onclick="send_data_Profile(event)">
    </div>
    </div>';
}

$info->data_type = "Profile";
$info->message = $new_rec;
echo json_encode($info);
?>
