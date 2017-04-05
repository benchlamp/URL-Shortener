<?php
//retrieve submitted URL from $_POST function
$ID = $_SERVER["QUERY_STRING"];
$targetURL;
 
$servername = "10.16.16.1";
$username = "bench-hu1-u-109501";
$password = "nDfMr^hnK";
 
 
//assign variable to open connection
$conn = mysqli_connect($servername, $username, $password);
 
 
//test if db exists, returns boolean
$db_found = mysqli_select_db($conn, $username);
 
 
if ($db_found) {
   
    //search for $ID, return URL
    $SQL = "SELECT URL FROM url_list
    WHERE ID = '$ID'";
   
    
    //run query function
    $result = mysqli_query($conn, $SQL);
   
    while ($row = mysqli_fetch_array($result)) {
        $targetURL = $row["URL"];
    }
   
    echo $targetURL;
   
    //close connection to db
    mysqli_close($conn);
   
    
    //confirm to user
    print "";
   
    
} else {
   
    //error finding db
    print "Database not found";
   
}
?>