<html>
<head>
	<title>Blogs</title>
	<style type="text/css">
		table{
		    rules: all;
		    rule-style: dotted solid;
		    rule-width: 5pt 2pt;
		    rule-color: green white;
		    /* How to suppress the rule below the thead? */
		}
		td {
		    border-style: none none solid none;
		    border-width: thick;
		    border-color: red;
		    margin: 4pt;
		}
	</style>

</head>
<body>

<div>
<h3>Welcome</h3>
<!-- <p>Post</p> -->
<?php

	echo form_open('login/create'); 

	echo "<p>Title: ";
	echo form_input('title');
	

	echo "Content";
	echo form_input('content');
	echo "</p>";

	echo form_submit('post_submit','Create'); 
?>
<hr />
<h2>BLogs</h2>
	<table>
		<tr>
		<?php if(isset($rec)) : foreach($rec as $row) : ?>
			<td><?php echo anchor("login/delete/$row->id",'delete '); echo $row->title; ?></td>
			<td><?php echo $row->content; ?></td>
		</tr>
		<?php endforeach; ?>

	</table>
	<?php else: ?>
	<p>No records were returned.</p>
	<?php endif; ?>



</div>


<id id="footer">

<a href="<?php echo base_url('login/logout'); ?>">Log Out</a>
</id>
</body>
</html>