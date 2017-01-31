<?php
//load the database configuration file
require_once "../config/config.php";
 
    $sqlSelect = "SELECT u.id, u.username, u.displayName, u.provider, u.profileImageURL, u.email, u.mobile, u.lastName, u.firstName, u.mongo_id, m.user_id, m.documents_type, m.documents_image, m.documents_message, m.documents_video  FROM user_mongo_data u
                  INNER JOIN member_message m
                  ON u.mongo_id = m.user_id
                  WHERE m.documents_type != 'text'
                  order by u.id desc";
    $result = $conn->query($sqlSelect);
     die('stop');
    if ($result->num_rows > 0) {
        foreach($result as $rs) {

            $documents="";
            if($rs['documents_type'] == 'image') {
                $documents=$rs['documents_image'];
            } else {
                $documents=$rs['documents_video'];
            }

            $message=mysqli_real_escape_string($conn, $rs['documents_message']);

            $conn->query("INSERT INTO user_all_data (user_id, firstName, lastName, displayName, email, userName, provider, mobile, ip_address, profileImageURL, documents_type, document_message, document) VALUES ('".$rs['user_id']."', '".$rs['firstName']."','".$rs['lastName']."','".$rs['displayName']."','".$rs['email']."','".$rs['username']."','".$rs['provider']."','".$rs['mobile']."','','".$rs['profileImageURL']."','".$rs['documents_type']."','".$message."','".$documents."')");

            echo $rs['id'].' - '. $rs['user_id'];

            echo '<br />';

           //  print '<pre>';
           //      print_r($rs);
           //  print '</pre>';
            
           //  echo "INSERT INTO user_all_data (user_id, firstName, lastName, displayName, email, userName, provider, mobile, ip_address, profileImageURL, documents_type, document_message, document) VALUES ('".$rs['user_id']."', '".$rs['firstName']."','".$rs['lastName']."','".$rs['displayName']."','".$rs['email']."','".$rs['username']."','".$rs['provider']."','".$rs['mobile']."','','".$rs['profileImageURL']."','".$rs['documents_type']."','".$message."','".$documents."')";
            
           //  echo '<br />';
           
           // die('ss');

            
        }
    }
 ?>