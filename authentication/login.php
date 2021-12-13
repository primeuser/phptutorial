<?php 


if(isset($_POST['login'])){

include_once '../config/student_db.php';

$loginname = $_POST['loginname'];
$password = $_POST['password'];

	if (empty($loginname) || empty($password)){
			header("Location: ../loginform.php?error=fields_are_empty");
			exit();
		}

	else{
		$query = "SELECT * FROM student WHERE username =? OR email =?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $query)) {
				header("Location: ../loginform.php?error=prepared statement error");
				exit();
			}
		else {
				mysqli_stmt_bind_param($stmt, "ss", $loginname, $loginname);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					$validatepassword = password_verify($password, $row['password']);
					if ($validatepassword == false ){
						header("Location: ../loginform.php?error=password_incorrect");
						exit();
					}
					else {
						session_start();
						$_SESSION['loginname'] = $row['username'];

						header("Location: ../index.php?action=login successfully");
						exit();
					}
				}

		}

	}

}
else{

	header("Location:../loginform.php?error=login first");
	exit();
}

?>




//   $sql = "SELECT * FROM blog;";
//   // $result = $conn->query($sql);
//   $result = mysqli_query($conn, $sql);

// 	if(mysqli_num_rows($result)>0)
// 		{
//   		while($row = mysqli_fetch_assoc($result)){
//     	$id = $row['id'];
// 	    $title = $row['title'];
// 	    $content = $row['content'];
    
//     echo "$id. <br>".$title."<br> <p>".$content."</p>";
//     }
// }