
<?php
while($row = mysqli_fetch_assoc($querydata)){
    $newquery = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
    OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
    OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $newquery);
    $getquery = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $getquery['messages'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if(isset($getquery['outgoing_msg_id'])){
        ($outgoing_id == $getquery['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }
    ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
    ($row['active_status'] == "Offline now") ? $offline = "offline" : $offline = "";
    $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'" hidden>
    <div class="content">
    <img src="resources/user_images/'. $row['image'] .'" alt="">
    <div class="details">
        <span>'. $row['fname']. " " . $row['lname'] .'</span>
        <p> '. $you . $msg .' </p>
    </div>
    </div>
    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
</div>';
}
?>