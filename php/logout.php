<?php

session_start();

if(isset($_SESSION['unique_id']))
{
    $conn=new mysqli('localhost','root','root','chat');
    # $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
    if($conn->connect_error)
    {
        die("Error".$conn->connect_error);
    }

    $logout_id=$_GET['logout_id'];
    if(isset($logout_id))
    {
        $status="Offline";
        $sql="UPDATE users SET belgi = '$status' WHERE unique_id = {$logout_id}";

        if($conn->query($sql) === true)
        {
            session_unset();
            session_destroy();
            header("Location: ../login.php");
        }
    }
    else
    {
        header("Location: ../users.php");
    }
}
else
{
    header("Location: ../login.php");
}

?>