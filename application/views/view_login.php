<!DOCTYPE html>
<html>
<head>
	<title>Simple BLOG</title>
</head>
<body>
<div id="container">
	<h1>Blogger</h1>

	<div id='login'>
		<?php
			echo form_open('login/login_validation');
			echo validation_errors();

			echo "<p>Username: ";
			echo form_input('username','a');
			echo "</p>";

			echo "<p>Password: ";
			echo form_password('password','a');
			echo "</p>";

			echo form_submit('login_submit','Enter');

			echo form_close();
		?>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>



</div>

</body>
</html>