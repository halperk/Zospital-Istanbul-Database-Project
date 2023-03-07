<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Delete a Disease:</b></a>
    </header>

    <?php

    include "config.php";

    ?>

    <form action="delete_disease.php" method="POST">
    <div><select name="ids">

    <?php

    $sql_command = "SELECT dCode, dName, dType, dRisk FROM Diseases";

    $myresult = mysqli_query($db, $sql_command);

        while($id_rows = mysqli_fetch_assoc($myresult))
        {
            $dCode = $id_rows['dCode'];
            $dName = $id_rows['dName'];
            $dType = $id_rows['dType'];
            $dRisk = $id_rows['dRisk'];
            echo "<option value=$dCode>". $dName . " (" . $dType . ") - Risk: " . $dRisk . "</option>";
        }

    ?>

    </select></div>
    <div><button class="button">DELETE</button></div>
    </form>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Main Page</a></div>
        <div><a href="disease_selection.php">Filter Diseases</a></div>
        <div><a href="disease_insertion.php">Insert a Disease</a></div>
    </div>
</body>
