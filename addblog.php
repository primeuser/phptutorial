<?php

include 'includes/header.php';

?>


<form method="post" action="config/insert_in_db.php">
<label>Title: <input type="text" name="titleee"></label>
<br><br>
<label>Content: <input type="text" name="contenttt"></label>
<br> <br>
<button type="submit" name="submit">Create Blog</button>

</form>

<?php

include 'includes/footer.php';

?>
