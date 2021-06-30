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

    $outgoing_id=$_POST['outgoing_id'];
    $incoming_id=$_POST['incoming_id'];
    $message=$_POST['message'];

    if(!empty($message))
    {
        $sql=$conn->prepare("INSERT INTO messages(incoming_msg_id, outgoing_msg_id, msg)
                        VALUES(?, ?, ?)");

        $sql->bind_param("iis", $incoming_id, $outgoing_id, $message);
        $sql->execute();
    }

}
else
{
    header("../login.php");
}

?>