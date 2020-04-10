<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="css/style2.css" />
</head>
<body>
<?php
	require('db.php');
    
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); 
		$username = mysqli_real_escape_string($con,$username); 
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div class="form">
<h1>SignUp Page</h1>
Enter Username, Password, and Email ID to register.
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required /><br />
<input type="email" name="email" placeholder="Email" required /><br />
<input type="password" name="password" placeholder="Password" required /><br />
<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
Already a User? Login from <a href="login.php">here</a>
<?php } ?>
</body>
</html>