<!DOCTYPE html>
<html>
<head>
  <title>Ikhwan Ashraf Eza</title>
  <link rel="icon" href="car.png" type="image/x-icon">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #27374D;
      margin: 0;
      padding: 0;
    }
    
    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .form-wrapper {
      background-color: #DDE6ED;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
    
    .form-wrapper h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #27374D;
    }
    
    .form-wrapper label {
      color: #27374D;
      font-weight: bold;
    }
    
    .form-wrapper input[type="text"],
    .form-wrapper input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #9DB2BF;
      border-radius: 4px;
      margin-bottom: 10px;
      box-sizing: border-box;
      font-size: 14px;
    }
    
    .form-wrapper input[type="submit"] {
      background-color: #526D82;
      color: #DDE6ED;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
    
    .form-wrapper input[type="submit"]:hover {
      background-color: #27374D;
    }
    
    .form-wrapper a {
      color: #27374D;
      text-decoration: none;
    }
    
    .form-wrapper a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-wrapper">
      <h3>CREATE ACCOUNT</h3>
      <form method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <label for="repeatPassword">Repeat Password:</label>
        <input type="password" name="repeatPassword" required><br><br>
        <input type="submit" name="Submit" value="Sign Up">
      </form>
      <p>Already have an account? Just <a href="login.php" style="color: #27374D;">Login</a></p>
    </div>
  </div>
</body>
</html>

<?php
include "connection.php";

if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    if ($password != $repeatPassword) {
        echo "<script> alert('Password did not match!')</script>";
        echo $conn->error;
    } else {
        $insert = $conn->query("INSERT INTO customer (username, password) VALUES ('$username', '$password')");
        if (!$insert) {
            echo $conn->error;
        } else {
            echo '<script>alert("Data has been successfully inserted!");</script>';
        }
    }
}
?>
