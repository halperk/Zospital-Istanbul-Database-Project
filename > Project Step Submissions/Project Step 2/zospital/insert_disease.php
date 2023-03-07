<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Disease Insertion Result:</b></a>
    </header>
    <div>
    <?php

    include "config.php";

    if (!empty($_POST['dName'])){
        $diseaseName = $_POST['dName'];
        $diseaseType = $_POST['dType'];
        $diseaseRisk = $_POST['dRisk'];
        $sql_statement = "INSERT INTO Diseases(dName, dType, dRisk) VALUES ('$diseaseName', '$diseaseType', '$diseaseRisk')";

        $result = mysqli_query($db, $sql_statement);
        if($result == 1) {
            echo "<a>Success</a>";
        } else {
            echo "<a>Error</a>";
        }
    }
    else
    {
        echo "<a>You did not enter the name of the disease.</a>";
    }

    ?>

    <div id="navigator" style="margin-top:3em;">
        <div><a href="index.php">Return to Main Page</a></div>
        <div><a href="disease_deletion.php">Insert Another Disease</a></div>
    </div>
</body>
