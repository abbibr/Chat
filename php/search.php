<?php

session_start();

$conn=new mysqli('localhost','root','root','chat');
# $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
if($conn->connect_error)
{
    die("Error".$conn->connect_error);
}

$outgoing_id = $_SESSION['unique_id'];

$searchTerm=$_POST['searchTerm'];
$output="";

$sql="SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR surname LIKE '%{$searchTerm}%')";
$result=$conn->query($sql);

if($result->num_rows>0)
{
    include "data.php";
}
else
{
    $output .= "No user found related to your search term";
}

echo $output;

?>