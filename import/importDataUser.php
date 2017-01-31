<?php
//load the database configuration file
require_once "../config/config.php";

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
    // print '<pre>';
    //     print_r($_FILES);
    // print '</pre>';die;
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
                $prevQuery = "SELECT id FROM user_mongo_data WHERE mongo_id = '".$line[0]."'";
                $prevResult = $conn->query($prevQuery);

                $line0 = mysqli_real_escape_string($conn, $line[0]);
                $line1 = mysqli_real_escape_string($conn, $line[1]);
                $line2 = mysqli_real_escape_string($conn, $line[2]);
                $line3 = mysqli_real_escape_string($conn, $line[3]);
                $line4 = mysqli_real_escape_string($conn, $line[4]);
                $line5 = mysqli_real_escape_string($conn, $line[5]);
                $line6 = mysqli_real_escape_string($conn, $line[6]);
                $line7 = mysqli_real_escape_string($conn, $line[7]);
                $line8 = mysqli_real_escape_string($conn, $line[8]);
                $line9 = mysqli_real_escape_string($conn, $line[9]);
                $line10 = mysqli_real_escape_string($conn, $line[10]);

                if($prevResult->num_rows > 0){
                    //update member data
                    $conn->query("UPDATE user_mongo_data SET mongo_id = '".$line0."', username = '".$line1."', displayName = '".$line2."', provider = '".$line3."',  created = '".$line4."', roles = '".$line5."', profileImageURL = '".$line6.", email = '".$line7."', lastName = '".$line8."', firstName = '".$line9.", mobile = '".$line10."  WHERE mongo_id = '".$line0."'");
                }else {
                    //insert member data into database
                    $conn->query("INSERT INTO user_mongo_data (mongo_id, username, displayName, provider, created, roles, profileImageURL, email, lastName, firstName, mobile) VALUES ('".$line0."','".$line1."','".$line2."','".$line3."','".$line4."','".$line5."','".$line6."','".$line7."','".$line8."','".$line9."','".$line10."')");
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
header("Location: user.php".$qstring);