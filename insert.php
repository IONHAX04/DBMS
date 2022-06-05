<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "portfolio");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect " . mysqli_connect_error());
}
 
// Escape user inputs for security
$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);

// Attempt insert query execution
$sql = "INSERT INTO portfolio (fname,lname,email,message) VALUES ('$fname','$lname','$email','$message')";
if(mysqli_query($link, $sql)){
    echo "Message sent successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>