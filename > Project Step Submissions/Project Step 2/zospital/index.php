<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Welcome to Zospital Istanbul</h1>
        <h2>#1 Health Care Institution in the Globe!</h2>
        <a><b>Diseases in Our Database:</b></a>
    </header>

    <div id="diseases">
    <?php
    
    include "config.php"; // Makes mysql connection

    $sql_statement = "SELECT * FROM Diseases";

    $result = mysqli_query($db, $sql_statement); // Executing query

    while($row = mysqli_fetch_assoc($result)) { // Iterating the result
        $dCode = $row['dCode'];
        $dName = $row['dName'];
        $dRisk = $row['dRisk'];
        $dType = $row['dType'];
        echo "<div class=\"disease\"><a class=\"dCode\">(" . $dCode . ")</a><b><a class=\"dName\">" . $dName . "</a></b><a class=\"dType\">(" . $dType . ")</a><a class=\"dRisk\">Risk: " . $dRisk . "</a></div>";
    }

    ?>
    </div>

    <div id="navigator">
        <h3>Navigation Menu:</h3>
        <div><a href="disease_selection.php">Filter Diseases</a></div>
        <div><a href="disease_deletion.php">Delete a Disease</a></div>
        <div><a href="disease_insertion.php">Insert a Disease</a></div>
    </div>
</body>
