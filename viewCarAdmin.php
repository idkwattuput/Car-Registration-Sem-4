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
        form {
        text-align: center;
        margin-bottom: 20px;
    }

    input[type="text"] {
        padding: 5px;
        width: 250px;
        border: 1px solid #DDE6ED;
        border-radius: 4px;
        margin-right: 5px;
    }

    input[type="submit"] {
        padding: 5px 10px;
        background-color: #DDE6ED;
        border: none;
        color: #27374D;
        
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #526D82;
    }
    </style>
</head>
<body>
    <nav>
    <?php include 'navAdmin.php' ?>
    </nav>
    
    <?php
        session_start();
        include 'connection.php';
        
        $result = $conn->query("SELECT * FROM car_detail");
        $numCars = $result->num_rows; // Get the number of registered cars

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = "SELECT * FROM car_detail WHERE reg_number LIKE '%$search%'";
            $result = $conn->query($query);
        } else {
            $result = $conn->query("SELECT * FROM car_detail");
        }
    
        $numCars = $result->num_rows; // Get the number of registered cars
    ?>

    <h1>List Of Car</h1>
    <div class="no-cars">No of cars: <?php echo $numCars; ?></div> <!-- Display the number of registered cars -->
    <form action="" method="GET">
    <input type="text" name="search" placeholder="Search registration number">
    <input type="submit" value="Search">
</form>


    <table border="2">
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
                <td><a class="edit-btn" href="editAdmin.php?no=<?php echo $data['no']; ?>"><i class="fas fa-edit"></i></a></td>
                <td><a class="delete-btn" href="deleteAdmin.php?no=<?php echo $data['no']; ?>" onclick="return confirm('Are you sure want to delete?');"><i class="fas fa-trash-alt"></a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
