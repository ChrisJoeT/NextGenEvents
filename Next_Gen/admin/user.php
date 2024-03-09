<?php
$con = mysqli_connect("localhost", "root", "", "Next_Gen");
if (!$con) {
    echo "Can't connect";
    exit();
}

$sql_select = "SELECT * FROM user";
$result = mysqli_query($con, $sql_select);

if (!$result) {
    echo "Error fetching data: " . mysqli_error($con);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Booking Data</title>
    <link rel="stylesheet" href="user.css">
</head>

<body style="background-color:#c3ccd7">
<center>
    <h2>Users</h2>
    <table border="1" class="fixed_headers">
        <thead>
            <tr>

                <th>Customer Name</th>
                <th>Email</th>
                <th></th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the results and display each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>

                   
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="sino" value="<?php echo $row['sino']; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <?php


    if (isset($_POST['delete'])) {
        $sino = $_POST['sino'];
        $select = "DELETE FROM user WHERE sino = '$sino'";
        $result = mysqli_query($con, $select);
    }

    mysqli_close($con);
    ?>

<a href="index.php"><button class="back-2-admin">to Admin home</button></a>
    </center>
</body>


</html>
