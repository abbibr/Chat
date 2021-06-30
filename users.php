<?php
    session_start();
    if(!isset($_SESSION['unique_id']))
    {
        header("Location: login.php");
    }
?>

<?php include_once "header.php" ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>

                <?php

                    $conn=new mysqli('localhost','root','root','chat');
                    # $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
                    if($conn->connect_error)
                    {
                        die("Error".$conn->connect_error);
                    }

                    $sql="SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}";
                    $result=$conn->query($sql);

                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                    }

                ?>

                <div class="content">
                    <img src="php/images/<?php echo $row['img']; ?>" alt="image">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['surname']; ?> &nbsp;</span>
                        <p><?php echo $row['belgi']; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>

</body>
</html>