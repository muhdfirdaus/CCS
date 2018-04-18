<?php
session_start();
include('../dist/includes/dbcon.php');

if(isset($_POST['check_id'])){
    echo "woi";
}
else{
    echo"tak jadi";
}

    // $dude = $_POST['check_id'];
// var_dump($dude);

/*
// sql to delete a record
$sql = "DELETE FROM MyGuests WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
*/
?>