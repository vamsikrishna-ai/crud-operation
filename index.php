﻿<?php  include('server.php'); 
       // fetch the record
      if (isset($_GET['edit']))
    {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db, "SELECT * FROM info WHERE id=$id");
        $record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$address = $record['address'];
		$email = $record['email'];
		$mobileno = $record['mobileno'];
		$gender = $record['gender'];		
		$id = $record['id'];
				
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
	<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>
<table> <center>
	<thead>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Email</th>
			<th>Mobileno</th>
			<th>Gender</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
	     <?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['mobileno']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td>
				<a class="edit_btn" href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a class="del_btn" href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	</center>
   </tbody>
</table>  
<center>
  <form method="post" action="server.php" >
  <input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="<?php echo $address; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>Mobileno</label>
			<input type="text" name="mobileno" value="<?php echo $mobileno; ?>">
		</div>
		<div class="input-group">
			<label>Gender</label>
			<input type="text" name="gender" value="<?php echo $gender; ?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
			<button type="submit" name="update" class="btn">update</button>
			<?php endif ?>
		</div>
	</form>
     </center>
</body>

</html>