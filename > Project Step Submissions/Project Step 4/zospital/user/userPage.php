<?php
    session_start();
    $URL = "https://zospital-istanbul-default-rtdb.europe-west1.firebasedatabase.app/Chats.json";
    $username = $_SESSION["Name"];
    header("refresh: 60");

    function get_messages() { 
        global $URL;
        $ch = curl_init();
        curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                CURLOPT_POST => FALSE, // It will be a get request 
                                CURLOPT_RETURNTRANSFER => true, ]);
        $response = curl_exec($ch); 
        curl_close($ch);
        return json_decode($response, true); 
    }
    
    function send_msg($msg, $name) {
        if($msg != ""){
            global $URL;
            $ch = curl_init();
            $msg_json = new stdClass();
            $msg_json->msg = $msg;
            $msg_json->name = $name;
            $msg_json->toWho = "Admin";
            $msg_json->time = date('d M Y, H:i');
            $encoded_json_obj = json_encode($msg_json);
            curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                        CURLOPT_POST => TRUE,
                                        CURLOPT_RETURNTRANSFER => TRUE,
                                        CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                        CURLOPT_POSTFIELDS => $encoded_json_obj ));
            $response = curl_exec($ch);
            header("refresh: 1");
            return $response;
        }
    }

    $msg_res_json = get_messages();

    if (isset($_POST['usermsg'])) {
        $user_msg = $_POST['usermsg'];
        send_msg($user_msg, $username);
        //echo $user_msg;
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Zospital Istanbul</title>
        <link rel="stylesheet" href="../support_page.css">
    </head>
    <body>
        <header>
            <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
        </header>
        <div class="inner-page-head"><a href="index.php"><b>Support Page - User</b></a></div>
        <ol class="chat">
        <?php
            if($msg_res_json != NULL)
            {
                $keys = array_keys($msg_res_json);
                for ($i = 0; $i < count($keys); $i++){
                    $chat_msg = $msg_res_json[$keys[$i]];
                    $name = $chat_msg['name'];
                    $msg = $chat_msg['msg'];
                    $toWho = $chat_msg['toWho'];
                    $time = $chat_msg['time'];
                    if ($name == 'Admin') {
                        $from = 'other';
                    } else {
                        $from = 'self';
                    }
                    if($name == $username || ( $name == 'Admin' && $toWho == $username)){
                        echo  '
                        <li class="'.$from.'">
                        <div class="avatar">
                                    <img src="https://i.imgur.com/DY6gND0.png" draggable="false"/>
                                </div>
                                    <div class="msg">
                                        <p><b>'.$name.'</b></p>
                                        <p>'.$msg.'</p>
                                        <time>'.$time.'</time>
                                    </div>
                                </li>';
                    }
                }
            }
        ?>
        </ol>
        <form name="form" action = "userPage.php" method="POST">
            <input name="usermsg" class="textarea" type="text" placeholder="Type here!"/>
            <input type="submit" style="display: none" />
        </form>
    </body>
</html>
