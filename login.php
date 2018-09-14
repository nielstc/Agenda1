<?php
session_start();
$conn = mysqli_connect("localhost","agenda","Agenda","agenda");

$message="";
if(!empty($_POST["login"])) {
    $result = mysqli_query($conn,"SELECT * FROM Users WHERE username='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
        $_SESSION["user_id"] = $row['userid'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if(!empty($_POST["logout"])) {
    $_SESSION["user_id"] = "";
    session_destroy();
}
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/ruimtes.css">
    <title>Hackerman - login</title>
    <style>
        #frmLogin {
            padding: 20px 60px;
            background: #B6E0FF;
            color: #555;
            display: inline-block;
            border-radius: 4px;
        }
        .field-group {
            margin:15px 0px;
        }
        .input-field {
            padding: 8px;width: 200px;
            border: #A3C3E7 1px solid;
            border-radius: 4px;
        }
        .form-submit-button {
            background: #cf9ef0;
            border: 0;
            padding: 8px 20px;
            border-radius: 4px;
            color: #FFF;
            text-transform: uppercase;
        }
        .member-dashboard {
            padding: 40px;
            background: #D2EDD5;
            color: #555;
            border-radius: 4px;
            display: inline-block;
            text-align:center;
        }
        .logout-button {
            color: #3472bf ;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0px;
            cursor: pointer;
        }
        .error-message {
            text-align:center;
            color:#FF0000;
        }
        .demo-content label{
            width:auto;
        }
    </style>
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
        <?php if(empty($_SESSION["user_id"])) { ?>
            <form action="" method="post" id="frmLogin">
                <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
                <div class="field-group">
                    <div><label for="login">Gebruikersnaam</label></div>
                    <div><input name="user_name" type="text" class="input-field"></div>
                </div>
                <div class="field-group">
                    <div><label for="password">Wachtwoord</label></div>
                    <div><input name="password" type="password" class="input-field"> </div>
                </div>
                <div class="field-group">
                    <div><input type="submit" class="myButton1"name="login" value="Inloggen" ></span></div>
                </div>
            </form>
            <?php
        } else {
        $result = mysqlI_query($conn,"SELECT * FROM Users WHERE userid='" . $_SESSION["user_id"] . "'");
        $row  = mysqli_fetch_array($result);
        ?>
        <form action="" method="post" id="frmLogout">
            <div class="member-dashboard">Welcome <?php echo ucwords($row['display_name']); ?>, You have successfully logged in!<br>
                Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
        </form>
    </div>
</div>
<?php } ?>
</body></html>