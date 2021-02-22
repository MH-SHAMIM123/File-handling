<!DOCTYPE html>
<html>
<head>
	<title>Registration Form Self</title>
</head>
<body>

	<?php 

		$firstName = $lastName  = $username = $Email=  "";
		$firstNameErr = $lastNameErr = $usernameErr = "";

		if($_SERVER['REQUEST_METHOD'] == "POST") {

			if(empty($_POST['fname'])) {
				$firstNameErr = "Please fill up the firstname";
			}
			else {
				$firstName = $_POST['fname'];
			}

			if(empty($_POST['lname'])) {
				$lastNameErr = "Please fill up the lastname";
			}
			else {

				$lastName = trim($_POST['lname']);
				$lastName = htmlspecialchars($_POST['lname']);
			}

			if(empty($_POST['username'])) {
				$usernameErr = "Please fill up the username";
			}
			else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$_POST['username'])) {
  				$usernameErr = "Invalid URL";
			}
			else {
				$username = $_POST['username'];
			}

			if($firstNameErr == "" && $lastNameErr == "" && $usernameErr == "") {
				echo "Successful " . $firstName . " " . $lastName . " " . $username;
			}
		}

		$filePath = "a.txt";

		echo readfile($filePath);

		echo "<br>";


		$f1 = fopen($filePath, "a");

		fwrite($f1,  $firstName , $lastName );

		fclose($f1);




	?>

	<p>Basic Information</p>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

		<label for="firstName">First Name:</label>
		<input type="text" id="firstName" name="fname" value="<?php echo $firstName ?>">
		<p><?php echo $firstNameErr; ?></p>

		<br>
		
		<label for="lastName">Last Name:</label>
		<input type="text" id="lastName" name="lname" value="<?php echo $lastName ?>">
		<p><?php echo $lastNameErr; ?></p>

		<br>

        Gender:
            <input type="radio" name="gender" value="Male" > Male 
            <input type="radio" name="gender" value="Female" > Female
            <input type="radio" name="gender" value="Other" > Other <br><br>


            Email Address:
            <input type="email" name="email"  > <br>


            <p>User Account Information</p>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

    <label for="UserName">username</label>
    <input type="text" id="username" name="uname" value="<?php echo $username ?>">
    <p><?php echo $usernameErr; ?></p>

    <br>
    
    <label for="pass">Password</label>
		<input type="password" id="pass" name="passw">

		

    <br><br>

        Recovery Email Address:
        <input type="email" name="email"  > <br>



		<br>

		<input type="submit" value="Submit">

	</form>

</body>
</html>