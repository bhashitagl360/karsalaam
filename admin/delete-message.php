<?php

include("../config/config.php");

$messageId = $_POST['id'];
//echo $messageId;

$sql = "UPDATE user_all_data SET deleted=1 WHERE id='$messageId'";

if ($conn->query($sql) === TRUE) {
    echo 1;
} else {
    echo 0;
}
?>