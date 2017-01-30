<?php

include("../config/config.php");

$messageId = $_POST['id'];
//echo $messageId;

$sql = "UPDATE user_data SET status=1 WHERE id='$messageId'";

if ($conn->query($sql) === TRUE) {
    echo 1;
} else {
    echo 0;
}
?>