<?php

 session_start();

 $title = 'Data Barang';
 include_once 'konek.php';

 if (isset($_POST['submit']))
 {
 $user = $_POST['user'];
 $password = $_POST['password'];

 $sql = "SELECT * FROM user WHERE username = '{$user}' AND password = md5('{$password}') ";
 
 $result = mysqli_query($conn, $sql);

 if ($result && mysqli_affected_rows($conn) != 0)
 {
 	$_SESSION['isLogin'] = true;
 	$_SESSION['user'] = mysqli_fetch_array($result);

 	header('location: home.php');
 } else
 $errorMsg = "<p style=\"color:red;\">Gagal Login,silakan ulangi lagi.</p>";
}
include_once "header.php";
if (isset($errorMsg)) echo $errorMsg;
?>
<br/>
<!-- login -->
<div class="blogin">
<h2 style="text-align: center; color: white;">Login</h2>

<form method="post" >
	<div class="login">
		<label style="color: white">Username</label><br/>
		<input type="text" name="user" />
	</div>

<br/>

	<div class="login">
		<label style="color: white">Password </label><br/>
		<input type="password" name="password" />
	</div>

<br/>

	<div class="logsubmit">
		<input type="submit" name="submit" value="Login" />
	</div>

</form>
</div>
<!-- login -->
<?php
include_once 'footer.php';
?>

