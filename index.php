<?php
    session_start();
    if(isset($_SESSION['unique_id']))
    {
        header("Location: users.php");
    }

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

    require_once "lang/".$_SESSION['lang'].".php";

?>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="navbar.css">

<!-- <style type="text/css">
		.footer
		{
			font-size: 20px;
			color: blue;
			right: 1%;
			top: 1%;
			position: absolute;
			bottom: 0;
			height: 39px;
			width: 260px;
			border-radius: 7px;
			text-align: center;
			background-color: grey;
		}
        .a
        {
            top: 7px;
            position: relative;
        }
        span
        {
            top: 5px;
            position: relative;
        }
</style> -->

<?php include_once "header.php" ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Chat Box</header>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label><?php echo $lang['name']; ?></label>
                        <input type="text" name="fname" placeholder="<?php echo $lang['name']; ?>" required autocomplete="off">
                    </div>
                    <div class="field input">
                        <label><?php echo $lang['surname']; ?></label>
                        <input type="text" name="lname" placeholder="<?php echo $lang['surname']; ?>" required autocomplete="off">
                    </div>
                </div>
                <div class="field input">
                    <label><?php echo $lang['email']; ?></label>
                    <input type="text" name="email" placeholder="<?php echo $lang['email']; ?>" required autocomplete="off">
                </div>
                <div class="field input">
                    <label><?php echo $lang['password']; ?></label>
                    <input type="password" name="password" placeholder="<?php echo $lang['password']; ?>" required autocomplete="off">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label><?php echo $lang['img']; ?></label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="<?php echo $lang['button']; ?>">
                </div>
            </form>
            <div class="link"><?php echo $lang['royxat']; ?><a href="login.php"><b><?php echo $lang['profil']; ?></b></a></div>
        </section>
    </div>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars" id="i"></i>
        </label>
        <label class="logo">Chat Box</label>
        <ul>
            <li class="li"><a class="a" href="index.php?lang=en">English</a></li>
            <li class="li"><a class="a" href="index.php?lang=ru">Russian</a></li>
            <li class='li'><a class="a" href="index.php?lang=uz">Uzbek</a></li>
        </ul>
    </nav>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>

</body>
</html>