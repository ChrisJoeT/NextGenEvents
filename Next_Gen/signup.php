<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Signup Page</title>


<style>*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.login{
    height: 100vh;
    background: url(loginimg.jpg);
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container{
    border-radius: 8px;
    background-color: transparent;
    display: flex;
    flex-direction: column;
    width: 330px;
    height: 400px;
    justify-content: center;
    align-items: center;
}

input{
    padding: 10px 36px;
    margin: 5px;
    width: 210px;
}

.lgn{
    margin-top: 30px;
    margin-bottom: 30px;
}
#login{
    padding: 12px 46px;
    text-decoration: none;
    background: linear-gradient(to right,blueviolet, rgb(184, 2, 169));
    color: white;
}

#pass{
    margin-bottom: 10px;
}
#signup{
    padding: 10px 46px;
    text-decoration: none;
    color: white;
    background: linear-gradient(to right,blueviolet, rgb(184, 2, 169));;
}

#fgpass{
    text-decoration: none;
    color: purple;
}

#loginBtn{
    padding: 10px 143px;
    text-decoration: none;
    background: linear-gradient(to right,blueviolet, rgb(184, 2, 169));
    color: rgb(255, 255, 255);
    border-radius: 8px;
    margin-top: 15px;
    margin-bottom: 15px;
    outline: none;
}

.sgnUp{
    display: flex;
}

#member{
    margin-right: 5px;
}

#sgn_now{
    text-decoration: none;
    color: purple;
}

</style>




</head>
<body>
    <section class="login">
        <div class="container">
            <h1>Login Form</h1>
            <div class="lgn">
                <a href="#" id="login" >Login</a>
                <a href="#" id="signup" class="hover_btn">SignUp</a>
            </div>
            <form action="" method="POST">
            <input type="text" id="name" name="name" placeholder="Full Name">
            <input type="text" id="email" name="email" placeholder="Email Adress">
            <input type="password" id="pass" name="password" placeholder="Password">
            <input type="password" id="pass" name="confirmpassword" placeholder="Confirm Password">

                <input type="submit" id="loginBtn"  class="hover_btn" value="Signup" name="submit">


           
            <div class="sgnUp">
                <p id="member">Already have an account?</p>
                <a href="login.php" id="sgn_now">Login Now</a>
            </div>
            </form>

            


    <?php

if(isset($_POST['submit'])){

  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];



 
$conn=mysqli_connect("localhost","root","","Event");
if(!$conn)
echo "can't connect";

    if ($password !== $confirmpassword) {
        echo "Passwords do not match.";

    } else {
       
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            echo "Username already loged. Please choose a different one.";

        } else {

            $insertQuery = "INSERT INTO user (sino,password, email, name) VALUES ('', '$password' , '$email', '$name')";
            if ($conn->query($insertQuery) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
} 





?>
        </div>
    </section>




















</body>
</html>