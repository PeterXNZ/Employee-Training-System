<?php
	include_once '../_header.php'; 

	//answers:
	$_SESSION['question1'] = "no";
	$_SESSION['question2'] = "0.7";
 ?>

 <a href="course_1.php">Back</a>



<body>
	
	<form align=left action="quiz_result.php" method="GET">
		<h4>1. Do we need to disable SSL v3?</h4>
		<select name="question1">
			<option>Select your options</option>
  			<option value="yes">Yes</option>
  			<option value="no">No</option>
		</select>

		<h4>2. Libssl version should be greater than</h4>
		<select name="question2">
			<option>Select your options</option>
  			<option value="0.7">0.7</option>
  			<option value="0.8">0.8</option>
 			<option value="0.9">0.9</option>
  			<option value="1.0">1.0</option>
		</select>

		<br><br><br><br><br>
		<button>Submit</button>
	</form>


</body>
