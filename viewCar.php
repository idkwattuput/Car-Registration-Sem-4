<!DOCTYPE html>
<html>
<head>
    <title>Ikhwan Ashraf Eza</title>
    <link rel="icon" href="car.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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

        h1 {
            text-align: center;
            color: #DDE6ED;
        }

        .no-cars {
            text-align: center;
            color: #DDE6ED;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #DDE6ED;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #DDE6ED;
        }

        th {
            background-color: #526D82;
        }

        .edit-btn, .delete-btn {
            color: #DDE6ED;
            
        }

        .edit-btn:hover, .delete-btn:hover {
            text-decoration: underline;
        }
       
    </style>
</head>
<body>
    <nav>
        <?php include 'nav.php' ?>
    </nav>

    <?php
    session_start();
    include 'connection.php';

    // Check if the customer is logged in
    if (!isset($_SESSION['customer_id'])) {
        // Redirect the user to the login page if not logged in
        header("Location: login.php");
        exit();
    }

    // Retrieve the customer ID from the session
    $customer_id = $_SESSION['customer_id'];

    $result = $conn->query("SELECT * FROM car_detail WHERE customer_id = $customer_id");
    $numCars = $result->num_rows; // Get the number of registered cars
    ?>

    <h1>List Of Car</h1>
    <div class="no-cars">No of cars: <?php echo $numCars; ?></div> <!-- Display the number of registered cars -->

    <table>
        <tr>
            <th>No</th>
            <th>Reg Number</th>
            <th>Brand</th>
            <th>Reg. Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        while ($data = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $data['no']; ?></td>
                <td><?php echo $data['reg_number']; ?></td>
                <td><?php echo $data['brand']; ?></td>
                <td><?php echo $data['reg_date']; ?></td>
                <td><a class="edit-btn" href="editCar.php?no=<?php echo $data['no']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="delete-btn" href="deletCar.php?no=<?php echo $data['no']; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
