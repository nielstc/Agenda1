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
    }else {}
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
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();

?>
