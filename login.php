<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$AdminName = $_POST['AdminName'];
		$AdminPassword = $_POST['AdminPassword'];

		if(!empty($AdminName) && !empty($AdminPassword) && !is_numeric($AdminName))
		{

			//read from database
			$query = "select * from adminlogin where AdminName = '$AdminName' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['AdminPassword'] === $AdminPassword)
					{

						$_SESSION['Id'] = $user_data['Id'];
						header("Location: index.php");
						die;
					}
				}
			}
			$message = "Wrong Username or Password!";
				echo "<script type='text/javascript'>alert('$message');</script>";
		}else
		{
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}

?>



<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="myform">
            <form method="POST">
                <h2>ADMIN LOGIN</h2>

                <input type="text" placeholder="Admin Name" name="AdminName" required>
                <input type="password" placeholder="Password" name="AdminPassword" required>
                <button type="submit" name="Login">LOGIN</button>
            </form>
            
        </div>
        <div class="image">
            <img src="images/download.jpg" width="300px">
        </div>
    </div>
    
</body>
</html>