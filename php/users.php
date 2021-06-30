<?php

session_start();

$conn=new mysqli('localhost','root','root','chat');
# $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
if($conn->connect_error)
{
    die("Error".$conn->connect_error);
}

$outgoing_id = $_SESSION['unique_id'];

$sql="SELECT * FROM users WHERE NOT unique_id = {$outgoing_id}";
$result=$conn->query($sql);
$output="";

if($result->num_rows == 1)
{
    $output.="No users are available to chat";
}
elseif($result->num_rows > 0)
{
    include "data.php";
}

echo $output;

?>