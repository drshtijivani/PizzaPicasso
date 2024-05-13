<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "padmin";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else{
    echo "hii";
}

// User Authentication
if(isset($_POST['alogin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        session_start();
        $_SESSION['email'] = $email;
        // Redirect to dashboard or wherever you want
        header('Location: upizza.html'); // Corrected line
        exit();
    } else {
        // Login failed
        echo "Invalid email or password";
    }
}

?>