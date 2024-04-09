<!DOCTYPE html>
<html>
<head>
    <title>Address Book</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="main">
        <div class="address-book">
            <h1 >Address Book</h1>
    
            <form action="insert.php" method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="submit" value="Add Contact">
            </form>
        </div>
    
        <div class="search-by-contact">
            <h2 >Contacts</h2>
    
            <form action="index.php" method="POST">
                <input type="text" name="search" placeholder="Search by name or email">
                <input type="submit" name="Search" value="Search">
            </form>
        </div>
    
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php
                include 'connection.php';

                $result = mysqli_query($conn,"SELECT * FROM info");

                if (isset($_POST['Search'])) {                              // Search Operatino Handeled
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM info WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);

                }

                while($row = mysqli_fetch_assoc($result)):                   //devide each row seperately
                
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>                       <!-- Showing value from database -->
                <td><?php echo $row['email'] ?></td>

                <td><button><a href="delete.php?deleteid=<?php echo $row['id']; ?>">Delete</a></button></td>
                <td><button><a href="update.php?updateid=<?php echo $row['id']; ?>">Update</a></button></td>
                
            </tr>

            <?php endwhile; ?>
        </table>
    </div>

    <script>

    </script>
</body>
</html>
