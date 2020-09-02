<?php
include ('inc/header.php');
include ('config.php');
include ('Database.php');

$db = new Database();

if (isset($_POST['submit'])) {
	$name  = mysqli_real_escape_string($db->link, $_POST['name']);
	$email = mysqli_real_escape_string($db->link, $_POST['email']);
	$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
	if ($name == '' || $email == '' || $skill == '') {
		$error = "Field must be not empty!!";
	}else{
		$query = "Insert Into tbluser(name, email, skill) values('$name','$email','$skill')";
		$create = $db->insert($query);
	}
}



//error show
if (isset($error)) {
	echo "<span style='color:red'>". $error ."</span>";
}
?>

<form action="create.php" method="post">
<table class="tblone">
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" placeholder="name"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" placeholder="Email"></td>
	</tr>
	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill" placeholder="skill"></td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="submit" value="Submit">
			<input type="reset" value="Cancel">
		</td>
	</tr>
</table>
</form>
<a href="index.php">Go Back</a>