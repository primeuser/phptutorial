<?php 
include_once 'config/db_conn.php';
include 'includes/header.php';
?>

<h3>Blog List Table</h3>
<input type="button" id="show-blog" value="Show Blog">

<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
    </tr>
  </thead>
  <tbody>
    <tr id="ajax-data">

	</tr>
  </tbody>
</table>


<script type="text/javascript" src="js/jquery-3.6.0.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	// body...
	$("#show-blog").on("click", function(e){

		$.ajax({
			url : "ajaxdata.php",
			type : "POST",
			success : function(ajaxdata){
				$("#ajax-data").html(ajaxdata);
			}
		});
	});
});

</script>


<?php 

 include 'includes/footer.php'

?>