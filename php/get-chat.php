<?php

session_start();

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

<?php

if(isset($_SESSION['unique_id']))
{
    $conn=new mysqli('localhost','root','root','chat');
    # $conn=new mysqli("localhost","id17148314_abbibr","u*Hw2zU[cMsc8AV%","id17148314_chat");
    if($conn->connect_error)
    {
        die("Error".$conn->connect_error);
    }

    $outgoing_id=mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id=mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output="";

    $sql="SELECT * FROM messages 
          LEFT JOIN users ON users.unique_id = messages.incoming_msg_id
          WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
          OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC";

    $query=$conn->query($sql);
    if($query->num_rows>0)
    {
        while($row=$query->fetch_assoc())
        {
            if($row['outgoing_msg_id'] === $outgoing_id)
            {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
            }
            else
            {
                ?> <div id="lbOuter" onclick="gallery.hide()">
                        <div id="lbInner"></div>
                   </div>
            <?php $output .= '<div class="chat incoming">
                                <div id="gallery">
                                    <img src="php/images/'. $row['img'] .'" onclick="gallery.show(this)">
                                </div>
                                <div class="details">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
}
else
{
    header("../login.php");
}

?>