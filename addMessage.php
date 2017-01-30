<?php
/* -----------------------------------------------------------------------------------------
   Adglobal360 - Vipin Yadav - http://www.adglobal360.com/
   -----------------------------------------------------------------------------------------
*/
    require_once 'config/config.php'; 

    /* 
     * Data $_POST
     */

    $userArray = array();
    $message = $_POST['message'];
    $user_id = $_POST['user_id']; 

    /*
     *  Check User email if Already Exits;
     */
    $sql = "UPDATE user_data SET message = '$message' where id = '$user_id'";
    
    if ($conn->query($sql) === TRUE) {
        $userArray['status'] = 'success';
        $userArray['msg'] = 'You have successfully submitted your wishes';
    } else { 
        $json['status'] = "Error updating record: " . $conn->error;
    }
        
    echo json_encode($userArray);
    die();
?>



