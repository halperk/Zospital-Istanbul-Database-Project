<head>
    <link rel="stylesheet" href="styleIndex.css">
</head>

<body>

<?php

    $URL = "https://zospital-istanbul-default-rtdb.europe-west1.firebasedatabase.app/Users.json";

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
    
    $users_json = getUsers();
    
?>
  <header>
        <h1><a href="../index.php">Zospital Istanbul Healthcare</a></h1>
    </header>
    <div class="inner-page-head"><a href="index.php"><b>User Selection for Support</b></a></div>

    <div><form action="usernameHandle.php" method="POST">
    <div class= "inputI">
    <div style="margin-bottom: 2em;"><a>Select a user to chat:</a></div>
    <select name="name">
    <?php
        $keys = array_keys($users_json);
        for ($i = 0; $i < count($keys); $i++) {
            $user_list = $users_json[$keys[$i]];
            $name = $user_list['name'];?>
            <option value="<?php echo $name ?>"><?php echo $name ?></option>
    <?php  } ?>
    </select></div>

    <input class="button" type="submit" value="Submit">
    </form></div>


</body>
