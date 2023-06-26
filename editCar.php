

<?php
include "connection.php";
$no = $_GET['no'];
$result = $conn->query("SELECT * FROM car_detail WHERE no = '$no'");
$data = $result->fetch_assoc();
if(isset($_POST['Submit'])){
    $reg_number = $_POST['reg_number'];
    $brand = $_POST['brand'];
  
    $edit = $conn->query("UPDATE car_detail SET reg_number = '$reg_number', brand = '$brand' WHERE no = '$no'");
    if(!$edit){
        echo $conn->error;
    }
    else{
        header("location:viewCar.php");       
    }
}
?>
<head>
  <title>Ikhwan Ashraf Eza</title>
  <link rel="icon" href="car.png" type="image/x-icon">

</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #27374D;
    margin: 0;
    padding: 0;
  }

  section {
         display: flex;
         justify-content: center;
         align-items: center;
         height: 100vh;
      }

  .form-container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #526D82;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    color: #DDE6ED;
  }

  h3 {
    text-align: center;
    margin-top: 0;
  }

  label {
    display: block;
    margin-bottom: 10px;
  }

  input[type="text"] {
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
</style>

<body>
    

<section>
<div class="form-container">
  <h3>Edit</h3>
  <form method="POST">
    <label for="reg_number">Register Number:</label>
    <input type="text" name="reg_number" value="<?php echo $data['reg_number'];?>" required>

    <label for="brand">Brand:</label>
    <input type="text" name="brand" value="<?php echo $data['brand'];?>" required>

    <input type="submit" name="Submit" value="Submit">
  </form>
</div>
</section>
</body>
