<?php
include 'connection.php';

$id = $_GET['deleteid'];

$sql = "DELETE FROM info WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: index.php");
?>
