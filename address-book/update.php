<?php
include 'connection.php';

$id = $_GET['updateid'];

$sql = "SELECT * FROM info WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE info SET name='$name', email='$email' WHERE id='$id'";
    mysqli_query($conn, $sql);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Contact</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Update Contact</h1>

    <form action="" method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <input type="text" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
