<?php
$servername = "localhost";
$username = "hostbusters";
$password = "itf";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$gebruikersnaam = mysqli_real_escape_string($conn, $_REQUEST['gebruikersnaam']);
$wachtwoord = mysqli_real_escape_string($conn, $_REQUEST['wachtwoord']);

$result = $conn->query("SELECT email FROM users WHERE gebruikersnaam = '$gebruikersnaam' AND wachtwoord = '$wachtwoord'");
if($result->num_rows == 0) {
    echo "error";
} else {
    $id =  $conn->query("SELECT id FROM users WHERE gebruikersnaam = '$gebruikersnaam'");
    $row = mysqli_fetch_array($id);
    $port = $row['id'] + 8000;

    header("Location: http://172.27.66.161:{$port}", true, 301);
    exit();
}

$conn->close();
?>