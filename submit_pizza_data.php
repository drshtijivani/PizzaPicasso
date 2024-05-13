<?php
// Establish connection to MySQL database
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "pizza"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    // Iterate through each pizza and update availability in the database
    $pizzas = array("MARGHERITA", "MEXICAN_GREEN_WAVE", "DELUXE_VEGGIE", "VEG_EXTRAVAGANZA", "VEGGIE_PARADISE", "PANEER_VEGGIE", "PANEER_MAKHANI", "PEPPY_PANEER");
    
    foreach ($pizzas as $pizza) {
        // Check if the pizza's availability has been toggled
        $availability = isset($_POST[ $pizza]) ? 1 : 0;
        
        // Update the availability in the database for the current pizza
        $query = $conn->prepare("UPDATE pizza_detail SET $pizza = ?");
        $query->bind_param("i", $availability);
        $result = $query->execute();

        if ($result) {
            echo "<script>
                alert('Availability updated successfully');
                window.location = 'upizza.html'; 
            </script>";
        } else {
            echo "Error: " . $conn->error;
        }
        
        $query->close();
    }
}

// Close connection
$conn->close();
?>
