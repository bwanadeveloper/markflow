<?php
$new_rec = "";

$db = new database();
$arr = [];
$arr["user_id"] = $_SESSION["user_info"];
$query = 'SELECT * FROM students WHERE user_id = :user_id';

$Result = $db->read($query, $arr);

// Check if there are multiple records and loop through them
if (is_array($Result) && count($Result) > 0) {
    $new_rec .= '<h3>Missing Marks Student Page</h3>';
    
    foreach ($Result as $row) {
        $selectedSchool = htmlspecialchars($row->school);
        $selectedcampus = htmlspecialchars($row->campus);
        $name = htmlspecialchars($row->name);
        $reg = htmlspecialchars($row->reg_no);
        $password = htmlspecialchars($row->password);
        $email = htmlspecialchars($row->email);
        $user_id = htmlspecialchars($row->user_id);
        $Username = htmlspecialchars($row->Username);

        // Generate the HTML structure for each student record
        $new_rec .= '<div>';
        
        $new_rec .= '
        <div style="margin-top:5px">
            <input type="text" name="Name" value="'.$name.'" id="Name">
            <label for="Name">Name:</label>
        </div>

        <div style="margin-top:5px">
            <input type="text" name="Reg.No" value="'.$reg.'" id="Reg.No">
            <label for="Reg.No">Reg.No:</label>
        </div>

        <div style="margin-top:5px">
            <select id="School" name="School">
                <option value="School" ' . ($selectedSchool == "School" ? 'selected' : '') . '>School</option>
                <option value="Technology" ' . ($selectedSchool == "Technology" ? 'selected' : '') . '>Technology</option>
                <option value="Business" ' . ($selectedSchool == "Business" ? 'selected' : '') . '>Business</option>
                <option value="Education" ' . ($selectedSchool == "Education" ? 'selected' : '') . '>Education</option>
            </select>
            <label for="School">School:</label>
        </div>

        <div style="margin-top:5px">
            <input type="text" name="Unit" id="unit">
            <label for="unit">Unit:</label>
        </div>

        <div style="margin-top:5px">
            <input type="checkbox" value="Exam" name="Exam" id="Exam">
            <label for="Exam">Exam</label>
        </div>

        <div style="margin-top:5px">
            <h5>Course Work</h5>
            <input type="checkbox" value="Ass1" name="Ass1" id="Ass1">
            <label for="Ass1">Ass1</label>
            <input type="checkbox" value="Ass2" name="Ass2" id="Ass2">
            <label for="Ass2">Ass2</label>
            <input type="checkbox" value="Ass3" name="Ass3" id="Ass3">
            <label for="Ass3">Ass3</label>
            <input type="checkbox" value="Cat1" name="Cat1" id="Cat1">
            <label for="Cat1">Cat1</label>
            <input type="checkbox" value="Cat2" name="Cat2" id="Cat2">
            <label for="Cat2">Cat2</label>
        </div>

        <div style="margin-top:5px">
            <input type="text" name="Lec" id="Lec">
            <label for="Lec">Lec:</label>
        </div>

        <div style="margin-top:5px">
            <textarea name="Info" id="info" rows="5" cols="40"></textarea>
            <label for="info">Info:</label>
        </div>

        <div style="margin-top:5px">
            <textarea name="Info" id="Res_info" rows="5" cols="40" disabled></textarea>
            <label for="info">Reconsiliation Info:</label>
        </div> 

        <div style="margin-top:5px">
            <input id="send" type="button" value="send" onclick="send_data(event)">
        </div>
        ';  
        $new_rec .= '</div>';
    }
}

$info->data_type = "New_Reconsiliation";
$info->message = $new_rec;
echo json_encode($info);
?>
