<?php
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("Location: login.php");
    }
?>

<style type="text/css">
		#lbOuter
		{
			position: fixed;
			top: 0;
			left: 0;
			width: 100vw;
			height: 100vh;
			background: rgba(0, 0, 0, 0.5);
			opacity: 0;
			visibility: hidden;
			transition: all ease 0.3s;
		}
		#lbOuter.show
		{
			opacity: 1;
			visibility: visible;
		}
		#lbInner
		{
			text-align: center;
			position: relative;
			top: 50%;
			transform: translateY(-50%);
		}
		#lbInner img
		{
			height: 350px;
            width: 350px;
            border-radius: 1%;
		}
</style>
<script type="text/javascript">
		var gallery = 
		{
			hide : function ()
			{
				document.getElementById("lbOuter").classList.remove("show");
			},
			show : function (img)
			{
				var clone = img.cloneNode(),
				front = document.getElementById("lbInner"),
				back = document.getElementById("lbOuter");

				front.innerHTML = "";
				front.appendChild(clone);
				back.classList.add("show");
			}
		};
</script>

<?php include_once "header.php" ?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php

                $conn=new mysqli('localhost','root','root','chat');
                # $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
                if($conn->connect_error)
                {
                    die("Error".$conn->connect_error);
                }

                $user_id=$_GET['user_id'];

                $sql="SELECT * FROM users WHERE unique_id = {$user_id}";
                $result=$conn->query($sql);

                if($result->num_rows>0)
                {
                    $row=$result->fetch_assoc();
                }

            ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                
                <div id="lbOuter" onclick="gallery.hide()">
                    <div id="lbInner"></div>
                </div>

                <div id="gallery">
                    <img src="php/images/<?php echo $row['img']; ?>" onclick="gallery.show(this)">
                </div>

                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['surname']; ?> &nbsp;</span>
                    <p><?php echo $row['belgi']; ?></p>
                </div>
            </header>
            <div class="chat-box">
                
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>
</html>