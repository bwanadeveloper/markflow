<?php
session_destroy();
$info->logged_in = false;
$info->data_type = "login";
echo json_encode($info);