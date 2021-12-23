<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("Sorry connection was not successful " . mysqli_connect_error());
}
// else{
//     echo "Connection was successful.";
// }


?>