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
    
    .login-form {
      background-color: #DDE6ED;
      border-radius: 8px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      width: 100%;
    }
    
    .login-form h3 {
      text-align: center;
      margin-bottom: 20px;
      color: #27374D;
    }
    
    .login-form table {
      width: 100%;
    }
    
    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #9DB2BF;
      border-radius: 4px;
      margin-bottom: 10px;
      box-sizing: border-box;
      font-size: 14px;
    }
    
    .login-form input[type="submit"] {
      background-color: #526D82;
      color: #DDE6ED;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
    }
    
    .login-form input[type="submit"]:hover {
      background-color: #27374D;
    }
    
    .login-form a {
      color: #27374D;
      text-decoration: none;
    }
    
    .login-form a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="login-form">
      <h3>LOGIN</h3>
      <form method="POST">
        <table>
          <tr>
            <td><input type="text" placeholder="Username" name="username" autofocus required></td>
          </tr>
          <tr>
            <td><input type="password" placeholder="Password" name="password" required></td>
          </tr>
          <tr>
            <td colspan="2"><input type="submit" name="submit" value="Login"></td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr>
            <td colspan="2"><p style="text-align: center;">Don't have an account? <a href="register.php" style="color: #27374D;">Sign Up</a></p></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>
</html>


<?php
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $customerQuery = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $customerResult = $conn->query($customerQuery);

    if ($customerResult && $customerResult->num_rows == 1) {
        // Customer login
        $customer = $customerResult->fetch_assoc();
        $_SESSION['customer_id'] = $customer['id'];
        $_SESSION['username'] = $customer['username'];
        header("Location: registerCar.php");
        exit();
    } else {
        $adminQuery = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $adminResult = $conn->query($adminQuery);

        if ($adminResult && $adminResult->num_rows == 1) {
            // Admin login
            $admin = $adminResult->fetch_assoc();
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['username'] = $admin['username'];
            header("Location: viewCarAdmin.php");
            exit();
        } else {
            echo "<script>alert('Incorrect username or password');</script>";
        }
    }
}
?>







