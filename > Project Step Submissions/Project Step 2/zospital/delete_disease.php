<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Disease Deletion Result:</b></a>
    </header>
    <div>
    <?php

    include "config.php";

    if(!empty($_POST['ids']))
    {
        $dCode = $_POST['ids'];
        $sql_statement = "DELETE FROM Diseases WHERE dCode = $dCode";
        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success</a>";
        } else {
            echo "<a>Error</a>";
        }
    }

    ?>
    </div>

    <div id="navigator" style="margin-top:3em;">
    <div><a href="index.php">Return to Main Page</a></div>
    <div><a href="disease_deletion.php">Delete Another Disease</a></div>
    </div>
</body>
