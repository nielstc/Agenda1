<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/overons.css">
    <title>Hackerman - Over ons</title>
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
    <center><h1>Over ons</h1></center>
    <div>
        <h3>Marten</h3>
        <div id="border1">
            <p>
                Gewerkt aan de frontend van de website.
            </p>
        </div>
    </div>
    <div id="rechts">
        <h3>Kevin</h3>
        <div id="border1">
            <p>
                Gewerkt aan de backend van de website met php.
            </p>
        </div>
    </div>
    <div>
        <h3>Niels</h3>
        <div id="border1">
            <p>
                Gewerkt aan de backend van de website met php.
            </p>
        </div>
    </div>
    <div id="rechts">
        <h3>Thijmen</h3>
        <div id="border1">
            <p>
                Heeft de software voor op de pi geschreven met python.
            </p>
        </div>
    </div>
    <div>
        <h3>Jelle</h3>
        <div id="border1">
            <p>
                Database gemaakt en aan frontend van de website gewerkt.
            </p>
        </div>
    </div>
    <div id="rechts">
        <h3>Nick</h3>
        <div id="border1">
        <p>
            Gewerkt aan de frontend van de website.
        </p>
        </div>
    </div>
</body>
</html>