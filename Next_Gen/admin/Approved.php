<?php
$con = mysqli_connect("localhost", "root", "", "Next_Gen");
if (!$con) {
    echo "Can't connect";
    exit();
}

// Perform a SELECT query to retrieve all data from the booking table
$sql_select = "SELECT * FROM booking WHERE booking_status='Approved'";
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
    <title> Booking Data</title>
    <link rel="stylesheet" href="Approved.css">
</head>

<body style="background-color:#c3ccd7">
    <center>
    <h2>Approved Booking Data</h2>
    <table border="1" class="fixed_headers">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Place</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the results and display each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['cu_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['place']; ?></td>
                    <td><?php echo $row['booking_status']; ?></td>
                
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="si_number" value="<?php echo $row['si_number']; ?>">
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
        $si_number = $_POST['si_number'];
        $select = "DELETE FROM booking WHERE si_number = '$si_number'";
        $result = mysqli_query($con, $select);
    }

    mysqli_close($con);
    ?>

<a href="index.php"><button class="back-2-admin">to Admin home</button></a>
    </center>
</body>

</html>
