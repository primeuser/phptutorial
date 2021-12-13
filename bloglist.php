<?php 
include_once 'config/db_conn.php';
include 'includes/header.php';
?>

<h3><a href="addblog.php">Create New Blog</a></h3>
<?php
$sqlquery = "SELECT * FROM blog;";
$data = mysqli_query($conn, $sqlquery);

foreach ($data as $unitdata): ?>
	<h5>Blog id : 
		<?php
		echo $unitdata['id']; ?> 
	</h5>
	<h1>
		<?php
		echo $unitdata['title']; ?> 
	</h1>
	<p>
		<?php
		$content = $unitdata['content'];

		# check if the data inside blog content or not 
		{if ( empty($content) ){

			echo 'No description is available in this blog';

	}
	else{
		
		# truncate characters in php 

		$rem_new_line = preg_replace('/\s+/', ' ', $content);

		$truncate_text = mb_substr($rem_new_line, 0, mb_strpos($rem_new_line, " ", 100));

		$output = trim(mb_substr($truncate_text, 0, mb_strrpos($truncate_text, " ")));

		echo $output; 

	}

}
	echo "<a href=\"blogdetail.php?id=$unitdata[id]\">Read More</a>";
		?> 
	</p>

<?php endforeach ; ?>

<?php 

 include 'includes/footer.php'

?>