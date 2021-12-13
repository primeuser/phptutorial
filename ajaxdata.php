<?php
include_once 'config/db_conn.php';

$sqlquery = "SELECT * FROM blog;";

$data = mysqli_query($conn, $sqlquery);

$result = "";


foreach ($data as $unitdata): 
		$content = $unitdata['content'];
		
		# check if the data inside blog content or not 
		{if ( empty($content) ){
			$result .= "<tr>
					<td>{$unitdata["id"]}</td>
					<td>{$unitdata["title"]}</td>
					<td>No description is available in this blog</td>
				</tr>";

	}
	else{
		
		# truncate characters in php 

		$rem_new_line = preg_replace('/\s+/', ' ', $content);

		$truncate_text = mb_substr($rem_new_line, 0, mb_strpos($rem_new_line, " ", 100));

		$output = trim(mb_substr($truncate_text, 0, mb_strrpos($truncate_text, " ")));


		$result .= "<tr>
					<td>{$unitdata["id"]}</td>
					<td>{$unitdata["title"]}</td>
					<td>{$output}</td>
				</tr>";
			echo $result;
 

	}

}


 endforeach ; 
 ?>