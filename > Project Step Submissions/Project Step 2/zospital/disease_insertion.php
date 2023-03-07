<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Insert a Disease:</b></a>
    </header>
    <div><form action="insert_disease.php" method="POST">
        <div class= "inputI"><a>Disease Name:
        <input type="text" id="dName" name="dName"></a></div>
        <div class= "inputI"><a>Disease Type:
        <input type="text" id="dType" name="dType"></a></div>
        <div class= "inputI"><a>Disease Risk:
        <input type="text" id="dRisk" name="dRisk"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

    <div id="navigator" style="padding-top:5em;">
        <h3>Navigation Menu:</h3>
        <div><a href="index.php">Main Page</a></div>
        <div><a href="disease_selection.php">Filter Diseases</a></div>
        <div><a href="disease_deletion.php">Delete a Disease</a></div>
    </div>
</body>
