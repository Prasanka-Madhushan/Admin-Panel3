<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Green Captain</title>
   
    <!--Icons link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!--Style sheet link-->
    <link rel="stylesheet" href="indexstyle.css">

</head>
<body>

    <div class="container">
        <input type="checkbox" id="check">
        <label for="check" class="open">
          <i class="fas fa-bars"></i>
        </label>
      
        <div class="sidebar-wrapper">
          <div class="sidebar">
            <div class="avatar-wrapper">
      
              <label for="check" class="close">
                <i class="fas fa-times"></i>
              </label>
              <img class="avatar" src="https://www.linkpicture.com/q/admin.jpg" alt="avatar">

            </div>
            
            <nav>
              <ul class="menu">
                
                <li>
                  <a href="#"><i class="fas fa-map"></i>
                  Map</a>
                </li>
      
                <li>
                  <a href="#"><i class="fas fa-trash-alt"></i>
                  Garbage</a>
                </li>

                <li class=logout>
                  <a href="login.php"><i class="fas fa-sign-out-alt fa-rotate-180"></i>
                  Log Out</a>
                </li>

              </ul>
            </nav>
          </div>
        </div>
      </div>

      
      <div>
        <h1>Green Captain</h1>
      

        <table class="table">
        <thead>
            <tr>
                <th>ID NO</th>
                <th>NAME</th>
                <th>CONTACT</th>
                <th>ADDRESS</th>
                <th>ACTION</th>
            </tr>
        </thead>

      
        <tbody>
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "mystore";

              // Create connection
              $connection = new mysqli($servername, $username, $password, $database);

                    // Check connection
              if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
              }

                    // read all row from database table
              $sql = "SELECT * FROM employees";
              $result = $connection->query($sql);

                    if (!$result) {
                die("Invalid query: " . $connection->error);
              }

                    // read data of each row
              while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["first_name"] . "</td>
                            <td>" . $row["phone"] . "</td>
                            <td>" . $row["address"] . "</td>
                            <td>
                                <a class='btn1' href='Accept'>Accept</a>
                                <a class='btn2' href='Reject'>Reject</a>
                            </td>
                        </tr>";
                    }

                    $connection->close();
          ?>
        </tbody>
    </table>
      </div>
</body>
</html>