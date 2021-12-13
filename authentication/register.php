<?php

if (isset($_POST['register'])) {

include_once '../config/student_db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];


		if (empty($username) || empty($email) || empty($password) || empty($repassword)) {
			header("Location: ../registrationform.php?error=fields_are_empty");
			exit();

		}
		elseif ((!filter_var($email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[a-zA-Z0-9]*$/", $username))) {
			header("Location: ../registrationform.php?error=email_and_username_is not valid");
			exit();
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../registrationform.php?error=email is not valid");
			exit();
		}
		elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
			header("Location: ../registrationform.php?error=username is not valid");
			exit();
		}
		elseif ($password !== $repassword) {
			header("Location: ../registrationform.php?error=password_did_not_match");
			exit();
		}
		else {
			$query = "SELECT username FROM student WHERE username =?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $query)) {
				header("Location: ../registrationform.php?error=prepared statement error");
				exit();
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt); // if you need to access the information of data from data base
				$checkresult = mysqli_stmt_num_rows($stmt);

				if ($checkresult > 0) {
					header("Location: ../registrationform.php?error=user already registered");
					exit();
				}
				else{

					$query = "INSERT INTO student (username, email, password) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $query)) {
						header("Location: ../registrationform.php?errror=prepared statement error 2");
						exit();
					}
					else{
						$encpassword = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $encpassword);
						mysqli_stmt_execute($stmt);
						// mysqli_stmt_store_result($stmt); // not necessary
						header("Location:../index.php?action=registration completed successfully");
						exit();
					}
				}
			}
		}

mysqli_stmt_close($stmt);
mysqli_close($conn);

}

else{
	header("Location:../registrationform.php?error=register the user first");
	exit();
}


// prepared statement:

//1. Preparing the prepared statements: statement template
// $query = "INSERT INTO student (username, email, password) VALUES (?, ?, ?)";
// ? are the paramenters used for variable binding

//2. Prepare or bind the statement template with the DBMS
// $stmt = $conn->prepare($sql);
// $stmt->bind_param('sss', $username, $email, $encpassword); 

// By telling mysql what type of data to expect, we minimize the risk of SQL injections.
// s for string
// i for integer 
// d for decimal
// b for blob

//3. Execution of the prepared statement
// $stmt ->execute();