<?php 
	include 'inc/header.php'; 
	include ('config.php');
	include ('Database.php');
?>

<?php 
	$db = new Database();
	$query = "SELECT * FROM  tbluser";
	$read = $db->select($query);

	if (isset($_GET['msg'])) {
		echo "<span style='color:green'>". $_GET['msg'] ."</span>";
	}
?>
		
<table class="tblone">
	<tr>
		<th width="auto">Serial</th>
		<th width="auto">Name</th>
		<th width="auto">Email</th>
		<th width="auto">Skill</th>
		<th width="auto">Action</th>
	</tr>
	<?php if ($read) { ?>
		<?php while ($row = $read->fetch_assoc() ) { ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['skill']; ?></td>
		<td><a href="update.php?id=<?php echo urlencode($row['id']); ?>">Edit</a></td>
	</tr>
	<?php } ?> <!---end of while curly braces ---->
	<?php }else{ ?>
		<p>Data is not available </p>
	<?php } ?> <!---end of curly braces ---->
	<a href="create.php">Create</a>

</table>
		









		

<?php include 'inc/footer.php'; ?>