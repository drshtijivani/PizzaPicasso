<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "customer";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// User Registration
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "Name: $name, Email: $email, Password: $password";

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    mysqli_query($conn, $sql);
    
}


?>