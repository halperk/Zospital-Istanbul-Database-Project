<!DOCTYPE html>
<html>
    <head>
        <title>Zospital Istanbul</title>
        <link rel="stylesheet" href="../support_page.css">
    </head>
    <body style="text-align: center;">
        <header>
            <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
        </header>
        <div class="inner-page-head"><a href="index.php"><b>Support Page</b></a></div>

        <div class="inner-page-top" style="margin-bottom: 3em;"><a><b>~ User Support Page Error ~</b></a></br></div>

        <?php
            
            session_start();
            $URL = "https://zospital-istanbul-default-rtdb.europe-west1.firebasedatabase.app/Users.json";
            $URL_chat = "https://zospital-istanbul-default-rtdb.europe-west1.firebasedatabase.app/Chats.json";
            

            function getUsers(){
                global $URL;
                $ch = curl_init();
                curl_setopt_array($ch, [ CURLOPT_URL => $URL,
                                        CURLOPT_POST => FALSE, // It will be a get request
                                        CURLOPT_RETURNTRANSFER => true, ]);
                $response = curl_exec($ch);
                curl_close($ch);
                return json_decode($response, true);
            }

            function setUser($name){
                global $URL;
                $ch = curl_init();
                $user_json = new stdClass();
                $user_json->name = $name;
                $encoded_json_obj = json_encode($user_json);
                curl_setopt_array($ch, array(CURLOPT_URL => $URL,
                                            CURLOPT_POST => TRUE,
                                            CURLOPT_RETURNTRANSFER => TRUE,
                                            CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                            CURLOPT_POSTFIELDS => $encoded_json_obj ));
                $response = curl_exec($ch);
                return $response;
            }

            function checkUser($name){
                $all_users_json = getUsers();
                $keys = array_keys($all_users_json);
                for ($i = 0; $i < count($keys); $i++){
                    $user = $all_users_json[$keys[$i]];
                    if($name == $user['name']){
                        return true;
                    }
                }
                return false;
            }
            
            function sendMessage($name){
                global $URL_chat;
                $issue = $_POST["issue"];
                $ch = curl_init();
                $auto_msg = new stdClass();
                $auto_msg->msg = "Hi " . $name . "!";
                if($issue == "I cannot make an appointment"){
                    $auto_msg->msg = $auto_msg->msg . " I will help you to make your appointment. Please wait a minute for checking your information.";
                }
                if($issue == "I could not find a suitable time"){
                    $auto_msg->msg = $auto_msg->msg . " I will help you to find a suitable time. Please wait a minute for checking your information.";
                }
                if($issue == "Suggestion"){
                    $auto_msg->msg = $auto_msg->msg . " I cannot wait to hear your suggestions.";
                }
                $auto_msg->name = "Admin";
                $auto_msg->toWho = $name;
                $auto_msg->time = date('d M Y, H:i');
                $encoded_json_obj = json_encode($auto_msg);
                curl_setopt_array($ch, array(CURLOPT_URL => $URL_chat,
                                            CURLOPT_POST => TRUE,
                                            CURLOPT_RETURNTRANSFER => TRUE,
                                            CURLOPT_HTTPHEADER => array('Content-Type: application/json' ),
                                            CURLOPT_POSTFIELDS => $encoded_json_obj ));
                $response = curl_exec($ch);
                return $response;
            }

            if (!empty($_POST['Name'])){
                $tempName = $_POST['Name'];
                $_SESSION['Name'] = $tempName;
                if(!checkUser($tempName)){
                    setUser($tempName);
                }
                sendMessage($tempName);
                header("Location: userPage.php");
                exit();
            }
            else
            {
                echo "<a>You did not enter a name.</a>";
            }

        ?>

        <div id="navigator" style="margin-top: 1em;">
            <div><a href="chat_welcome_page.php">Return to User Support Page</a></div>
        </div>
    </body>
</html>
