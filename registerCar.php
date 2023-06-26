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

      nav {
         background-color: #526D82;
         padding: 10px;
      }

      nav ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
         display: flex;
      }

      nav ul li {
         margin-right: 10px;
      }

      nav ul li a {
         text-decoration: none;
         color: #DDE6ED;
      }

      section {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

      form {
         width: 300px;
         padding: 20px;
         background-color: #526D82;
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      }

      h3 {
         text-align: center;
         margin-top: 0;
         color: #DDE6ED;
      }

      fieldset {
         border: none;
         padding: 0;
         margin: 0;
      }

      legend {
         font-weight: bold;
         margin-bottom: 10px;
         color: #DDE6ED;
      }

      input[type="text"],
      input[type="date"] {
         width: 100%;
         padding: 8px;
         border: 1px solid #DDE6ED;
         border-radius: 4px;
         box-sizing: border-box;
         margin-bottom: 15px;
         background-color: #DDE6ED;
         color: #27374D;
      }

      input[type="submit"] {
         width: 100%;
         background-color: #9DB2BF;
         color: white;
         padding: 10px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
      }

      input[type="submit"]:hover {
         background-color: #27374D;
      }

      .error {
         color: red;
         font-weight: bold;
      }
   </style>
</head>
<body>
   <nav>
      <?php include 'nav.php'; ?>
   </nav>
   
   <section>
      <form method="POST">
         <fieldset>
            <legend><h3>Register Car</h3></legend>
            <?php if (!empty($error)) { ?>
               <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <p><input type="text" placeholder="Reg Number" name="reg_number" required></p>
            <p><input type="text" placeholder="Brand" name="brand" required></p>
            <p><input name="reg_date" type="date" required></p>
            <input type="submit" name="Submit" value="Submit">
         </fieldset>
      </form>
   </section>
</body>
</html>




<?php
include "connection.php";

// Check if the customer is logged in
session_start();
if (!isset($_SESSION['customer_id'])) {
    // Redirect the user to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve the customer ID from the session
$customer_id = $_SESSION['customer_id'];

$error = ""; // Variable to store form validation error message

if (isset($_POST['Submit'])) {
    $reg_number = $_POST['reg_number'];
    $brand = $_POST['brand'];
    $reg_date = $_POST['reg_date'];

    // Perform form validation
    if (empty($reg_number) || empty($brand) || empty($reg_date)) {
        $error = "All fields are required.";
    } else {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO car_detail (reg_number, brand, reg_date, customer_id) VALUES (?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters with the corresponding values
        $stmt->bind_param("sssi", $reg_number, $brand, $reg_date, $customer_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Data has been successfully inserted!");</script>';
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>


