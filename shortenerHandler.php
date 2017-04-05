<?php

//retrieve submitted URL from $_POST function
$URL = $_POST["mytext"];

 
$servername = "10.16.16.1";
$username = "bench-hu1-u-109501";
$password = "nDfMr^hnK";
 
 
//assign variable to open connection function
$conn = mysqli_connect($servername, $username, $password);
 
 
//test if db exists, returns boolean
$db_found = mysqli_select_db($conn, $username);


if ($db_found) {
   
    //assign add entry statement, insert $URL retrieved from $_POST
    $SQL = "INSERT INTO url_list (URL)
    VALUES ('$URL')";
   
    
    //run query function
    $result = mysqli_query($conn, $SQL);
   
    
    //close connection to db
    mysqli_close($conn);
   
    
    //confirm to user
    print "Records added";
   
} else {
   
    //error finding db
    print "Database not found";
   
}

?>