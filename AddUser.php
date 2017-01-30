<?php
    include('config/config.php'); 
/* 
 * Data $_POST
 */
     
    $userArray = array();
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $message = $_POST['message'];
    
    /*
     *  Check User email if Already Exits;
     */
    $sqlSelect = "SELECT id FROM user_data where email='$email'";
    $result = $conn->query($sqlSelect); 
    if ($result->num_rows > 0) {
        /*
        *  if already Exits; 
        *  throw error;
        */
        $userArray['status'] = 'fail';
        $userArray['msg'] =  "Email ID is already Exists!"; 
    } else {
        /*
        * else add data
        */
        $sql = "INSERT INTO user_data (name, email, mobile, ip_address, message)
        VALUES ('$firstName', '$email', '$mobile', '$ip_address', '$message')"; 

        if ($conn->query($sql) === TRUE) {
            $userArray['status'] = 'success';
            $userArray['msg'] =  "Your message has been submitted";
            $userArray['user_id'] = $conn->insert_id;
            $_SESSION['user_id'] = $conn->insert_id;
        } else {
            $userArray['status'] = 'fail';
            $userArray['msg'] =  $sql . "<br>" . $conn->error;
            $userArray['user_id'] = '';
        }
    } 
    
    echo json_encode($userArray);
    die();
?>



