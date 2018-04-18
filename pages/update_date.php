<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT equip_id, creation_date, due_date FROM product_mod WHERE LENGTH(creation_date)<10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["equip_id"]. " - Created: " . $row["creation_date"]. " - Expired: " . $row["due_date"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>