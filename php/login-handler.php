<?php
$host = "localhost";
$user = "X34851531";
$pw = "X34851531";
$dbname = "X34851531";

$username = $_POST['username'];
$password = $_POST['password'];

$mysqli = new mysqli($host, $user, $pw, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$query = "SELECT userType, userPassword FROM Accounts WHERE userName = ?";
$statement = $mysqli->prepare($query);
$statement->bind_param("s", $username);
$statement->execute();
$statement->bind_result($userType, $userPassword);

$response = array();

if ($statement->fetch()) {
    if($userPassword === $password){
        $response['userType'] = $userType;
    }
    else{
        $response['userType'] = 'Incorrect Password';
    }

}

$statement->close();
$mysqli->close();

echo json_encode($response);
?>
