<?php
include 'connection.php';

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO info (name, email) VALUES ('$name', '$email')";



if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
