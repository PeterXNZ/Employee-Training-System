<?php
	include_once '../_header.php'; 
 ?>
 <a href="../courses.php">Back</a>

<br><br>

<h2>Course one:</h2>




 <h3>Steps to be undertaken:</h3>
 <a href="https://www.thesslstore.com/knowledgebase/ssl-install/nginx-ssl-installation" target="_blank">SSL installation</a>
 <p>After read information above, you can <a href="quiz_1_1.php">take a quiz</a> now!</p>
<?php 
	if(isset($_SESSION['status'])){
		echo $_SESSION['status'];
	}
 ?>




<br><br>
 <h3>Download the CA Bundle</h3>
<a href="https://www.thesslstore.com/knowledgebase/ssl-support/ca-bundle" target="_blank">CA Bundle</a>
<p>After read information above, you can <a href="quiz_1_2.php">take a quiz</a> now!(Not available now)
</p>