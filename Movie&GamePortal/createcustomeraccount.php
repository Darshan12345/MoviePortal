
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "gmshop");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$number = mysqli_real_escape_string($link, $_REQUEST['number']);
$customer_id= rand(111111, 999999);
 
// attempt insert query execution
$sql = "INSERT INTO customer (c_id, c_name, c_phone) VALUES ('$customer_id', '$name', '$number')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>