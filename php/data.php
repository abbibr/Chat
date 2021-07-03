<?php

while($row=$result->fetch_assoc())
{
    $sql2="SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
           OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
           OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2=$conn->query($sql2);
    $row2=$query2->fetch_assoc();

    if($query2->num_rows > 0)
    {
        $resultt = $row2['msg'];
    }
    else
    {
        $resultt = "No message available";
    }

    (strlen($resultt) > 17) ? $msg = substr($resultt, 0, 17).'...' : $msg = $resultt;

    // check the user is online ir offline
    ($row['belgi'] == 'Offline') ? $offline="offline" : $offline="";

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].' ">
    <div class="content">
        <img src="php/images/' . $row['img'] .'">
        <div class="details">
            <span>' . $row['fname'] . " ". $row['surname'] . '</span>
            <p>'.$msg .'</p>
        </div>
    </div>
    <div class="status-dot '.$offline.' "><i class="fas fa-circle"></i></div>
</a>';
}

?>