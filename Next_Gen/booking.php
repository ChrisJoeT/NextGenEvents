<?php
$con = mysqli_connect("localhost", "root", "", "Next_Gen");
if (!$con)
    echo "can't connect";


    $id = $_GET["id"];

    $id = urldecode($id);
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Signup Form</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <div class="main">
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="POST" action="">
          <h2 class="form_title title">Booking Form</h2>



            Selected Plan
        <input type="text" class="form__input" name="id" readonly="readonly" value="<?php echo $id ?>">
        User name
        <input type="text" class="form__input" name="cu_name" placeholder="Name">
        Email Address
        <input type="text" class="form__input" name="email" placeholder="Email">
        Phone Number
        <input type="text" class="form__input" name="phone_number" placeholder="Phn">
        Place
        <input type="text" class="form__input" name="place" placeholder="Place">

        <input type="hidden" class="form__input" name="booking_status" readonly="readonly" value="Pending">
        <input type="submit" class="form__button button" name="submit" value="Book">
    

        </form>


        <?php
if (isset($_POST['submit'])) {
    $cu_name = $_POST['cu_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number']; 
    $place = $_POST['place'];
    $booking_status = $_POST['booking_status'];

    $sql_insert = "INSERT INTO booking (id, cu_name, email, phone_number, place, booking_status) VALUES ('$id', '$cu_name', '$email', '$phone_number', '$place', '$booking_status')";

    if (mysqli_query($con, $sql_insert)) {?>










      </div>
      </div>


      <?php
        // echo  '<p class="success-message">Record inserted successfully</p>';
        echo '<script>alert("Booking successful. We will call for further details.")</script>'; 

    } else {
        echo "Error inserting record: " . mysqli_error($con);
        echo '<p class="error-message">Error inserting record: ' . mysqli_error($con) . '</p>';

}
}
?>
    </div>






</body>
</html>
</body>






</html>
