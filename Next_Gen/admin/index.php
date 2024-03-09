<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<header>
  <a href="#" class="logo">Next Gen Admin</a>
  <nav>
    <ul>
      <!-- <li><a href="user.php">Users</a></li> -->
      <li><a href="view_booking.php">Bookings</a></li>
      <li><a href="pending.php">Pending</a></li>
      <li><a href="Approved.php">Approved</a></li>
      <li><a href="message.php">Opinions</a></li>
    </ul>

  </nav>

</header>

<span>
<button onclick="redirectToPage()">
      <p>Back to HomePage</p>
    </button>

    <script>
    function redirectToPage() {
      // Redirect to the desired page
      window.location.href = 'http://localhost/next_gen1/Next_Gen/index.php'; // Replace 'path/to/your/page.html' with the actual path
}
</script>
</span>
 <span class="spTwo"></span>

 </body>
</html>