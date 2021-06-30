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

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="navbar.css">

<?php include_once "header.php" ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat Box</header>
            <form action="#">
                <div class="error-txt">
                </div>
                <div class="field input">
                    <label><?php echo $lang['email']; ?></label>
                    <input type="text" name="email" autocomplete="off" placeholder="<?php echo $lang['email']; ?>">
                </div>
                <div class="field input">
                    <label><?php echo $lang['password']; ?></label>
                    <input type="password" name="password" autocomplete="off" placeholder="<?php echo $lang['password']; ?>">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="<?php echo $lang['button']; ?>">
                </div>
            </form>
            <div class="link"><?php echo $lang['royxatmas']; ?><a href="index.php"><b><?php echo $lang['kir']; ?></b></a></div>
        </section>
    </div>

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars" id="i"></i>
        </label>
        <label class="logo">Chat Box</label>
        <ul>
            <li class="li"><a class="a" href="login.php?lang=en">English</a></li>
            <li class="li"><a class="a" href="login.php?lang=ru">Russian</a></li>
            <li class='li'><a class="a" href="login.php?lang=uz">Uzbek</a></li>
        </ul>
    </nav>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>

</body>
</html>