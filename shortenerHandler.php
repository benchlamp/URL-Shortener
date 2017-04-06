<?php

//retrieve submitted URL from $_POST function
$URL = $_POST["mytext"];

//require "../configure.php"
 
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
    mysqli_query($conn, $SQL);
   
    $ID = $conn->insert_id;
    
    //close connection to db
    mysqli_close($conn);
   
    
    $returnObj->original_url = $URL;
    $returnObj->short_url = "http://www.benchlamp.co.uk/URLreturn.php?" . $ID;
    
    $returnJSON = json_encode($returnObj, JSON_UNESCAPED_SLASHES);
    
    //confirm to user
    print $returnJSON;
   
} else {
   
    //error finding db
    print "Database not found";
   
}

?>