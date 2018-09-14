<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/reserveren.css">
    <title>Hackerman - Home</title>

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
        <table class="table">
            <tr>
                <th class="table-head">Ruimte</th>
                <th class="table-head">Status</th>
                <th class="table-head">BeginTijd</th>
                <th class="table-head">EindTijd</th>
                <th class="table-head">Gebruik</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "agenda";
            $password = "Agenda";
            $database = "agenda";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }else {echo "";}

            $sql = "SELECT DISTINCT lokaalNaam, Agenda.lokaalId, Agenda.startTijd, eindTijd, Agenda.gebruik FROM Agenda,locatie where locatie.lokaalId = Agenda.lokaalId and  eindTijd >= now()  GROUP by Agenda.eindTijd ORDER BY Agenda.eindTijd DESC limit 3";
            $result = $conn->query($sql);


            while($row = mysqli_fetch_array($result))
            {
               $gebruik = $row['gebruik'];
                $date = date( 'Y-m-d H:i:s');
                $firstTime =  date("H:i:s",strtotime($row['eindTijd']));
                $secondTime =  date("H:i:s",strtotime($row['startTijd']));

                if($firstTime < time() and $secondTime < time() ){
                    $status = "bezet";

                }else
                {$status = "Beschikbaar";
                $timeDiff = "Vrij";
                $gebruik = "Niet in gebruik";
                }
                $tijdsduur = $timeDiff;
                echo "<tr>";
                echo "<td class='table-input table-first'>" . $row['lokaalNaam'] . "</td>";
                echo "<td>" .$status . "</td>";
                echo "<td>" .$secondTime . "</td>";
                echo "<td>" .$firstTime."</td>";
                echo "<td>" . $gebruik."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </table>
    </div>
    <div <class="main-2">
    </div>
</div>
</div>
</body>
</html>