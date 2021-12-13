<?php 
include_once 'config/db_conn.php';
include 'includes/header.php';
?>


<?php


//getting id from url

$id = $_GET['id'];

$sqlquery = "SELECT * FROM blog WHERE id=$id;";

$data = mysqli_query($conn, $sqlquery);


while($result = mysqli_fetch_array($data))
{
	$id = $result['id'];
	$title = $result['title'];
	$content = $result['content'];
}
?>

<h5>Blog id : 
		<?php
		echo $id; ?> 
	</h5>
<h5>Blog id : 
		<?php
		echo $title; ?> 
	</h5>
<h5>Blog id : 
		<?php
		echo $content; ?> 
	</h5>
<?php 

 include 'includes/footer.php'

?>