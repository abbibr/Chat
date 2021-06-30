<?php

$conn=new mysqli('localhost','root','root','chat');
if($conn->connect_error)
{
    die("Error".$conn->connect_error);
}

?>