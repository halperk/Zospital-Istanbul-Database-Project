<head>
    <title>Zospital Istanbul</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><a href="index.php">Zospital Istanbul Healthcare</a></h1>
        <a><b>Filter Diseases:</b></a>
    </header>
    <div><form action="select_disease.php" method="POST">
        <div><a>Risk Group to be Filtered:
        <input type="text" id="dRisk" name="dRisk"></a></div>
        <input class="button" type="submit" value="Submit">
    </form></div>

<div id="navigator" style="padding-top:5em;">
    <h3>Navigation Menu:</h3>
    <div><a href="index.php">Main Page</a></div>
    <div><a href="disease_insertion.php">Insert a Disease</a></div>
    <div><a href="disease_deletion.php">Delete a Disease</a></div>
</div>
</body>
