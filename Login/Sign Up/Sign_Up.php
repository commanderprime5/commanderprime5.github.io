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

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$gebruikersnaam = mysqli_real_escape_string($conn, $_REQUEST['gebruikersnaam']);
$wachtwoord = mysqli_real_escape_string($conn, $_REQUEST['wachtwoord']);

$sql = "INSERT INTO users (email, gebruikersnaam, wachtwoord)
VALUES ('$email', '$gebruikersnaam', '$wachtwoord')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>