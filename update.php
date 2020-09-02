<?php
	include('inc/header.php');
	include('config.php');
	include('Database.php');


	$id = $_GET['id'];
	$db = new Database();
	$query = "SELECT * FROM tbluser WHERE id=$id";
	$read = $db->select($query);
	$getData = $db->select($query)->fetch_assoc();

	if (isset($_POST['submit'])) {
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if ($name == '' || $email == '' || $skill == '') {
			$error = "Field must be not Empty!";
		} else{
			$query = "Update tbluser 
			SET 
			name = '$name', email = '$email', skill = '$skill' WHERE id = $id
			";
			$update = $db->update($query);
		}
	}


	if (isset($error)) {
		echo "<span style='color:yellow'>".$error."</span>";
	}
	?>

	<?php
	if (isset($_POST['delete'])) {
		$query = "DELETE FROM tbluser WHERE id=$id";
		$deleteData = $db->delete($query);
	}
	?>

<form action="update.php?id=<?php echo $id; ?>" method="post">
<table class="tblone">
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" value="<?php echo $getData['name'] ?>"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo $getData['email'] ?>"></td>
	</tr>
	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill" value="<?php echo $getData['skill'] ?>"></td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="submit" value="Update">
			<input type="reset" value="Cancel">
			<input type="submit" name="delete" value="Delete">
		</td>
	</tr>
</table>
</form>
<a href="index.php">Go Back</a>