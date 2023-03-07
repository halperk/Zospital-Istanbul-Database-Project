<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Disease Filter Result:</b></a>
    </header>
    <div>
    <?php

    include "config.php";

    $targetDRisk = $_POST['dRisk'];

    $sql_command = "SELECT dCode, dName, dType, dRisk FROM Diseases WHERE dRisk = '$targetDRisk'";

    $myresult = mysqli_query($db, $sql_command);

    while($row = mysqli_fetch_assoc($myresult)) {
        $dCode = $row['dCode'];
        $dName = $row['dName'];
        $dRisk = $row['dRisk'];
        $dType = $row['dType'];
        echo "<div class=\"disease\"><a class=\"dCode\">(" . $dCode . ")</a><b><a class=\"dName\">" . $dName . "</a></b><a class=\"dType\">(" . $dType . ")</a><a class=\"dRisk\">Risk: " . $dRisk . "</a></div>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Main Page</a></div>
        <div><a href="disease_selection.php">Filter Another Risk Group</a></div>
    </div>
</body>
