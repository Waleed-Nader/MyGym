<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script language="javascript">
        function validation()
{
    var name = document.forms["form"]["name"].value;
    var lastname = document.forms["form"]["lastname"].value;
    var email = document.forms["form"]["email"].value;
    var password = document.forms["form"]["password"].value;
    var confpassword = document.forms["form"]["confpassword"].value;

 if(name=="")
 {
  alert("Please enter a value for the \"Name\".");
  return false;
 }
 if(lastname=="")
 {
  alert("Please enter a value for the \"Last Name\".");
  return false;
 }
 if(email=="")
 {
  alert("Please enter an email");
  return false;
 }
 if(password=="")
 {
  alert("Please enter a value for the \"Password\".");
  return false;
 }
 if(password!=confpassword)
 {
  alert("Fail to confirm password.");
  return false;
 }
 return true;
}
    </script>
</head>
<body>
<?php
    require('conn.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($conn, $username);

        $lastname= stripslashes($_REQUEST['lastname']);
        $lastname = mysqli_real_escape_string($conn, $lastname);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($conn, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        $query    = "SELECT * FROM users WHERE email= '$email'";
                     
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result)==0) {
            $query = "INSERT INTO users (name,surname,password,email)
            VALUES ('$username','$lastname', '" . md5($password) . "', '$email')";
            echo "<div class='form'>
            <h3>You have registered successfully.</h3><br/>
            <p class='link'>Click here to <a href='login.php'>Login</a></p>
            </div>";
         mysqli_query($conn, $query);
         mysqli_close($conn);
        // header("location:login.php");
            
        } else {
            echo "<div class='form'>
                  <h3>Email already Registered!!</h3><br/>
                  <p class='link'>Click here to try to <a href='registration.php'>register</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" name="form" method="request" onsubmit="return validation()">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="name" placeholder="Name">
        <input type="text" class="login-input" name="lastname" placeholder="Last Name">
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="password" class="login-input" name="password" placeholder="Password">
        <input type="password" class="login-input" name="confpassword" placeholder="Confirm Password">
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>