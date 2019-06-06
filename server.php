<?php 
    session_start();
     // initialize variables
	$name = "";
	$address = "";
	$email = "";
	$mobileno = "";
	$gender = "";
	$id = 0;
	$edit_state = false;
	
	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// if save button is clicked
 	if (isset($_POST['save'])){
		$name = $_POST['name'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$mobileno = $_POST['mobileno'];
		$gender = $_POST['gender'];
		
		mysqli_query($db, "INSERT INTO info (name, address, email, mobileno, gender) VALUES ('$name', '$address','$email','$mobileno','$gender')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}
	    // update records
	if (isset($_POST['update'])) {
	         $name = $_POST['name'];
	         $address = $_POST['address'];
			 $email = $_POST['email'];
		     $mobileno = $_POST['mobileno'];
		     $gender = $_POST['gender'];
			 $id = ($_POST['id']);

	         mysqli_query($db, "UPDATE info SET name='$name', address='$address', email='$email', mobileno='$mobileno', gender='$gender' WHERE id=$id");
	         $_SESSION['message'] = "Address updated!"; 
	          header('location: index.php');
		
}
         // delete records
        if (isset($_GET['del'])) {
	        $id = $_GET['del'];
	        mysqli_query($db, "DELETE FROM info WHERE id=$id");
	        $_SESSION['message'] = "Address deleted!"; 
	        header('location: index.php');
}
	    // retrieve records
         $results = mysqli_query($db, "SELECT * FROM info"); 

?>




   
