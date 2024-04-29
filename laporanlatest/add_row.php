<?php
$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn, 'laporan');

$sql = "SELECT Area FROM DatabaseReport"; 
$result = mysqli_query($conn, $sql);

echo "<select name='Area'>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Area'] . "'>" . $row['Area'] . "</option>";
}
echo "</select>";

mysqli_close($conn); // Close the database connection when done
?>
