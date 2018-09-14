<?php

// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();


$tijd = date("H:i");
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $servername = "localhost";
    $username = "agenda";
    $password = "Agenda";
    $database = "agenda";
// Create connection
    $conn = new mysqli($servername, $username, $password, $database);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
    }
    $date = date("Y-m-d");
    $lokaalid = $_POST['ruimte'];
    $startTijd1 = $_POST['start'];
    $startTijd2 = $date . $startTijd1;
    $eindTijd1 = $_POST['end'];
    $eindTijd2 = $date . $eindTijd1;
    $gebruik = $_POST ['gebruik'];
    $eindTijd = date("Y-m-d H:i:s", strtotime($eindTijd2));
    $startTijd = date("Y-m-d H:i:s", strtotime($startTijd2));


    $sql = "INSERT INTO Agenda(lokaalid, startTijd, eindTijd, gebruik) VALUES('$lokaalid', '$startTijd', '$eindTijd', '$gebruik')";
    if ($conn->query($sql) === TRUE) {
        echo "Vergaderkamer $lokaalid is Gereseveerd van $startTijd1 tot $eindTijd1 op $date.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/reserveren.css">
    <title>Hackerman - Reseveren</title>

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
<div class="main">
    <div class="main-1">

        <img src="IMG/hackerman.gif"/>
        <?php if ( isset( $_SESSION['user_id'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages

        ?>
            <div class="reserveren">

                <form method="post" action="reserveren.php">
                    <label >Ruimte</label>
                    <select name="ruimte" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>

                    <label>Van</label>
                    <input type="time" name="start" min="<?php echo "$tijd";?>" max="18:00:00" value="<?php echo "$tijd";?>" required>
                    <label>tot</label>
                    <input type="time" name="end" min="<?php echo "$tijd";?>" max="18:00:00" value="<?php echo "$tijd";?>"required>
                    <label>gebruik</label>
                    <select name="gebruik" required>
                        <option>Vergadering</option>
                        <option>Schoonmaak</option>
                        <option>Anders</option>
                    </select>

                    </br>
                    <input type="submit" name="Reserveren" class="submit"></div>
        <?php

        if ($tijd > strtotime('18:00:00')) {
        echo "Het is $tijd u kunt niet meer reseveren";
        echo "<br>";
        echo "Reseveren kan vanaf 8:00 tot max 18:00";
        }


                         ?>
         </form>

        </div>
   <?php } else {
    // Redirect them to the login page
       echo "<br>";
       echo "Om te reseveren moet u even inloggen";
       echo "<a href='login.php' >login</a>";


    }
    ?>
    <div class="main-2">
        </div>
        <div class="main-2-2">
            <table class="table">
                <tr>
                    <th class="table-head">Ruimte</th>
                    <th class="table-head">plaatsen</th>
                    <th class="table-head">Eigenschappen</th>
                </tr>
                <tr>
                    <td class="table-input">1</td>
                    <td class="table-input">6</td>
                    <td class="table-input">
                        <li>Beamer</li>
                    </td>
                </tr>
                <tr>
                    <td class="table-input">2</td>
                    <td class="table-input">10</td>
                    <td class="table-input">
                        <li>Beamer</li>
                        <li>White board</li>
                    </td>
                </tr>
                <tr>
                    <td class="table-input">3</td>
                    <td class="table-input">20</td>
                    <td class="table-input">
                        <li>Beamer</li>
                        <li>Whiteboard</li>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>