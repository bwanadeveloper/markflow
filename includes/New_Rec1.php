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
        $selectedunit = "";
        $selectedlec="";
        $currentYear = date("Y");  // Current year
     
        
        $new_rec = '
        <div id="new_rec">
        <div>
        <div style="margin-top:5px">
        <label style="display:block" for="Name">Name:</label>
            <input type="text" name="Name" value="'.$name.'" id="Name">
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="RegNo">Reg.No:</label>
            <input type="text" name="RegNo" value="'.$reg.'" id="RegNo">
        </div>

        <div style="margin-top:5px">
          <label style="display:block" for="School">School:</label>
            <select id="School" name="School">
                <option value="School" ' . ($selectedSchool == "School" ? 'selected' : '') . '>School</option>
                <option value="Technology" ' . ($selectedSchool == "Technology" ? 'selected' : '') . '>Technology</option>
                <option value="Business" ' . ($selectedSchool == "Business" ? 'selected' : '') . '>Business</option>
                <option value="Education" ' . ($selectedSchool == "Education" ? 'selected' : '') . '>Education</option>
            </select>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Trimester">Trimester:</label>
            <select id="Trimester" name="Trimester">
                <option value="Trimester">Trimester</option>
                <option value="Trimester 1">Trimester 1 ' . date("Y") . '</option>
                <option value="Trimester 2">Trimester 2 ' . date("Y") . '</option>
                <option value="Trimester 3">Trimester 3 ' . date("Y") . '</option>
            </select>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Year">Year:</label>
            <select id="Year" name="Year">
                <option value="Year">Year</option>
                <option value="' . $currentYear .'" >' . $currentYear . '</option>
                <option value="' . ($currentYear - 1) . '">' . ($currentYear - 1) . '</option>
                <option value="' . ($currentYear - 2) . '">' . ($currentYear - 2) . '</option>
                <option value="' . ($currentYear - 3) . '">' . ($currentYear - 3) . '</option>
            </select>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Unit">Unit:</label>
            <select id="Unit" name="Unit">
                <option value="Unit">Unit</option>
                <option value="Application Programming" ' . ($selectedunit == "Application Programming" ? 'selected' : '') . '>Application Programming</option>
                <option value="Database Design and Development" ' . ($selectedunit == "Database Design and Development" ? 'selected' : '') . '>Database Design and Development</option>
                <option value="Fundamentals Of Web Design" ' . ($selectedunit == "Fundamentals Of Web Design" ? 'selected' : '') . '>Fundamentals Of Web Design</option>
                <option value="Computing Mathematics" ' . ($selectedunit == "Computing Mathematics" ? 'selected' : '') . '>Computing Mathematics</option>
            </select>
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
            <input id="send" type="button" value="send" onclick="send_data(event)">
        </div>
</div>
<div>
        <div style="margin-top:5px">
        <label style="display:block" for="Lec">Lec:</label>
            <select id="Lec" name="Lec">
                <option value="Lecturer">Lecturer</option>
                <option value="Zipporah Munene" ' . ($selectedlec == "Zipporah Munene" ? 'selected' : '') . '>Zipporah Munene</option>
                <option value="Mundian Wangeshi" ' . ($selectedlec == "Mundian Wangeshi" ? 'selected' : '') . '>Mundian Wangeshi</option>
                <option value="Sally Masinde" ' . ($selectedlec == "Sally Masinde" ? 'selected' : '') . '>Sally Masinde</option>
                <option value="Rodgers Abongo" ' . ($selectedlec == "Rodgers Abongo" ? 'selected' : '') . '>Rodgers Abongo</option>
            </select>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="info">Info:</label>
            <textarea name="Info" id="info" rows="5" cols="40"></textarea>
        </div>

        <div style="margin-top:5px">
        <label style="display:block" for="Res_info">Reconsiliation Info:</label>
            <textarea name="Res_info" id="Res_info" rows="5" cols="40" disabled></textarea>
        </div> 


        </div>
        </div>';
    }
}

$info->data_type = "New_Reconsiliation";
$info->message = $new_rec;
echo json_encode($info);
?>
