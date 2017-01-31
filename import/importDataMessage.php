<?php
//load the database configuration file
require_once "../config/config.php";

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    print '<pre>';
        print_r($_FILES);
    print '</pre>';die;
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // print '<pre>';
                //     print_r($line);
                // print '</pre>';
                // die;
                //check whether member already exists in database with same email
                $prevQuery = "SELECT id FROM member_message WHERE mongo_id = '".$line[0]."'";
                $prevResult = $conn->query($prevQuery);

                $line0 = mysqli_real_escape_string($conn, $line[0]);
                $line1 = mysqli_real_escape_string($conn, $line[1]);
                $line2 = mysqli_real_escape_string($conn, $line[2]);
                $line3 = mysqli_real_escape_string($conn, $line[3]);
                $line4 = mysqli_real_escape_string($conn, $line[4]);
                $line6 = mysqli_real_escape_string($conn, $line[6]);
                $line7 = mysqli_real_escape_string($conn, $line[7]);
                $line8 = mysqli_real_escape_string($conn, $line[8]);
                $line9 = mysqli_real_escape_string($conn, $line[9]);

                if($prevResult->num_rows > 0){
                    //update member data
                    $conn->query("UPDATE member_message SET mongo_id = '".$line0."', user_id = '".$line1."', updated = '".$line2."', created = '".$line3."', documents_type = '".$line4."', documents_image = '".$line6."',  documents_message = '".$line7."', documents_video = '".$line8."', documents_frame = '".$line9."  WHERE mongo_id = '".$line0."'");
                }else{ 
                    //insert member data into database
                    $conn->query("INSERT INTO member_message (mongo_id, user_id, updated, created, documents_type, documents_image, documents_message, documents_video, documents_frame) VALUES ('".$line0."','".$line1."','".$line2."','".$line3."','".$line4."','".$line6."','".$line7."','".$line8."','".$line9."')");
                } 
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: index.php".$qstring);