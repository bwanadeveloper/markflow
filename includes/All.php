<?php
$new_rec="";

$new_rec = "";
$arr = [];
$db = new database();
$arr["user_id"] = $_SESSION["user_info"];
$query = "SELECT * FROM missing_marks WHERE user_id = :user_id AND Resolved = 1";
$result = $db->read($query, $arr);

$new_rec = '';
if ($result && count($result) > 0) {
    foreach ($result as $row) {
        // Construct the HTML output dynamically
        $new_rec .= "
            <div class='Timeline'>
                <p>Mark ID: {$row->Missing_id}</p>
                <p>Unit: {$row->Unit}</p>
                <p>Status: " . ($row->Resolved ? "Resolved" : "Pending") . "</p>
                <a href='index.php?action=view_rec&id={$row->Missing_id}'>
                    <button class='view' type='button'>View</button>
                </a>
                <p>" . date('l jS F, Y H:i:s', strtotime($row->Time)) . "</p>
            </div>
        ";
    }
}else{
    $new_rec = '<p>No missing marks that have been resolved were found.</p>';
}
$info->data_type="All";
$info->message=$new_rec;
echo json_encode($info);