<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/ruimtes.css">
    <title>Ruimtes</title>
</head>
<body>
<div class="nav">
    <ul>
        <li><a class="myButton" href="index.php">Home</a></li>
        <li><a class="myButton" href="ruimtes.php">Ruimtes</a></li>
        <li><a  class="myButton" href="reserveren.php">Reserveren</a></li>
        <li><a  class="myButton"href="overons.php">Over ons</a></li>
        <li><a  class="myButton" href="login.php"><?php if(empty($_SESSION["user_id"])) { echo "login";}else {echo "Logout";}?></a></li>

    </ul>
</div>
<!--Dit zijn de vergader kamers. -->
<div class="mainblockconf"> <!-- main block voor de ruimtes-->
    <div class="ruimtetitel"><h1>Vergaderruimte 1</h1></div>
    <div class="textnaastfoto">
        <a>Dit is de vergaderkamer op de 1e verdieping<br>
            De kamer heeft beschikking over een TV<br> met aansluitingen voor een HDMI verbinding<br>
            Verder heeft de kamer 6 vergaderstoelen<br> <br>
            <img src="IMG/vergaderzaal1.jpg" height="250" width="500"/>
        </a>
    </div>
</div>
</div>
<div class="mainblockconf">
    <div class="ruimtetitel">
        <h1>Vergaderruimte 2</h1>
        <div class="textnaastfoto">
            <a>Dit is de grote vergaderruimte<br>
                In deze ruimte is er plek voor 16 personen<br>
                geliefde deze ruimte alleen te reserveren voor groepsvergaderingen<br><br>
                <img src="IMG/16stoelen.jpg" height="250" width="500"/>
            </a>
        </div>
    </div>
</div>
<div class="mainblockconf">
    <div class="ruimtetitel">
        <h1>Vergaderruimte 3</h1>
        <div class="textnaastfoto">
            <a>Dit is de grote vergaderruimte<br>
                In deze ruimte is er plek voor 20 personen<br>
                geliefde deze ruimte alleen te reserveren voor groepsvergaderingen<br><br>
                <img src="IMG/20stoelen.jpg" height="250" width="500"/>
            </a>
        </div>
    </div>
</div>
</body>
</html>