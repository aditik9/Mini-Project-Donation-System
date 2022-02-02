<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobno = $_POST['mobno'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $password = $_POST['password'];

	// Database connection
	$conn = mysqli_connect('localhost','root','','donationsystem');
	if($conn){
		$stmt = $conn->prepare("insert into user(username,email,mobno,address,country,age,gender,dob,password) 
                                values(?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssississs", $username,$email,$mobno,$address,$country,$age,$gender,$dob,$password);
		$stmt->execute();
		echo "<script>alert('User Registration Successfull!')</script>";
		echo "<button onclick=\"window.location.href='SignIn.html'\">Log In</button> to continue";
		$stmt->close();
		$conn->close();
	}
    else {
        echo "Connection failed";
	}
?>