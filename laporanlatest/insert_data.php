<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include_once "db_connection.php";

    // Get form data
    $location = $_POST["location"];
    $area = $_POST["area"];
    $zone = $_POST["zone"];
    $dun = $_POST["dun"];
    $parlimen = $_POST["parlimen"];

    // Prepare and execute SQL query to insert data into DatabaseReport table
    $sql = "INSERT INTO DatabaseReport (Location, Area, Zone, DUN, Parlimen) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $location, $area, $zone, $dun, $parlimen);
    
    if ($stmt->execute()) {
        // Data inserted successfully
        echo "Data inserted successfully.";
    } else {
        // Error inserting data
        echo "Error inserting data: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to the form page if accessed directly without submitting the form
    header("Location: form.html");
    exit();
}
?>
