<?php

session_start();

if(!isset($_SESSION['lang']))
    $_SESSION['lang']='en';
elseif (isset($_GET['lang'])&&$_SESSION['lang']!=$_GET['lang']&&!empty($_GET['lang']) ) {
    if($_GET['lang'] == 'en')
        $_SESSION['lang']='en';
    elseif ($_GET['lang'] == 'uz')
        $_SESSION['lang']='uz';
    elseif ($_GET['lang'] == 'ru')
        $_SESSION['lang']='ru';
}
    
require_once "../lang/".$_SESSION['lang'].".php";

$conn=new mysqli('localhost','root','root','chat');
# $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
if($conn->connect_error)
{
    die("Error".$conn->connect_error);
}

$email=$_POST['email'];
$password=$_POST['password'];

if(!empty($email) && !empty($password))
{
    $sql="SELECT * FROM users WHERE email = '{$email}' AND parol = '{$password}'";
    $result=$conn->query($sql);
    if($result->num_rows>0) // if users credentials matched
    {
        $row=$result->fetch_assoc();

        $status="Online";
        $sql2="UPDATE users SET belgi = '$status' WHERE unique_id = {$row['unique_id']}";

        if($conn->query($sql2) === true)
        {
            $_SESSION['unique_id']=$row['unique_id'];
            echo "success";
        }
    }
    else
    {
        echo $lang['err2'];
    }
}
else
{
    echo $lang['err'];
}

?>