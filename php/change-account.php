<?php
    $host = "localhost";
    $user = "X34851531";
    $pw = "X34851531";
    $dbname = "X34851531";

    $userID = $_POST['userID'];
    $password = $_POST['password'];

    $mysqli = new mysqli($host, $user, $pw, $dbname);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "UPDATE Accounts SET
                         userPassword = '$password'
                   WHERE userID = '$userID'";

    if ($mysqli->query($query) === TRUE) {
        $response = "Account changed successfully!";
    } else {
        $response = "Failed to change the account!";
    }

    $mysqli->close();
    echo $response;
?>
