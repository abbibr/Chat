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

// include_once "config.php";
$conn=new mysqli('localhost','root','root','chat');
# $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
if($conn->connect_error)
{
    die("Error".$conn->connect_error);
}

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];

if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password))
{
    // let`s check user email is valid or not
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) // if email is valid
    {
        // let`s check that email already exist in the database or not
        $sql="SELECT email FROM users WHERE email = '{$email}'";
        $result=$conn->query($sql);
        if($result->num_rows>0) // if email already exist
        {
            echo $email ." - ". $lang['err3'];
        }
        else
        {
            // let`s check user upload file or not
            if(isset($_FILES['image'])) // if file is uploaded
            {
                $img_name=$_FILES['image']['name'];
                # $img_type=$_FILES['image']['type'];
                $tmp_name=$_FILES['image']['tmp_name'];
                
                // let`s explode image and get the last extension like jpg png
                $img_explode=explode('.',$img_name);
                $img_ext=end($img_explode); // here we get extensions of an user uploaded img file 

                $extensions=['png','jpeg','jpg'];
                if(in_array($img_ext, $extensions) === true)
                {
                    $time=time(); // this will return current time

                    $new_img_name=$time.$img_name;
                    if(move_uploaded_file($tmp_name, "images/".$new_img_name))
                    {
                        $status="Online";
                        $random_id=rand(time(), 10000000);

                        // let`s insert all user data inside table
                        $sql2=$conn->prepare("INSERT INTO users(unique_id, fname, surname, email, parol, img, belgi)
                        VALUES(?, ?, ?, ?, ?, ?, ?)");

                        $sql2->bind_param("issssss", $random_id, $fname, $lname, $email, $password, $new_img_name, $status);
                        $sql2->execute();
                        
                        if($sql2)
                        {
                            $sql3=("SELECT * FROM users WHERE email = '{$email}'");
                            $result2=$conn->query($sql3);
                            if($result2->num_rows>0)
                            {
                                $row=$result2->fetch_assoc();
                                $_SESSION['unique_id']=$row['unique_id'];
                                echo "success";
                            }
                        }
                        else
                        {
                            echo $lang['err4'];
                        }
                    }
                }
                else
                {
                    echo $lang['err5'];
                }
            }
            else
            {
                echo $lang['err7'];
            }
        }
    }
    else
    {
        echo $email." - ".$lang['err6'];
    }
}
else
{
    echo $lang['err'];
}

?>