<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #27374D;
      margin: 0;
      padding: 0;
    }
    
    .navbar {
      background-color: #526D82;
      padding: 10px;
    }
    
    .navbar ul {
      display: flex;
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    
    .navbar li {
      margin-left: 10px;
    }
    
    .navbar li a {
      color: #DDE6ED;
      text-decoration: none;
      padding: 5px;
      border-radius: 5px;
    }
    
    .navbar li a:hover {
      background-color: #9DB2BF;
    }
    
    .navbar .logout-link {
      color: #27374D;
      font-weight: bold;
    }
  </style>

<div class="navbar">
  <ul>
    <li><a href="viewCarAdmin.php">View Car</a></li>
    <li><a href="logout.php" class="logout-link">Logout</a></li>
  </ul>
</div>
