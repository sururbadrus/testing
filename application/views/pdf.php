<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
   
</head>
<body>
	<div id="outtable">
	  <table width="500" border="1" cellpadding="0" cellspacing="0">
	  	<thead>
	  		<tr>
	  			<th class="short">NO</th>
	  			<th class="normal">First Name</th>
	  			<th class="normal">Last Name</th>
	  			<th class="normal">Username</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php $no=1; ?>
	  		<?php foreach($users as $user): ?>
	  		  <tr>
	  			<td width="30" align="center"><?php echo $no; ?></td>
	  			<td width="100"><?php echo $user['firstname']; ?></td>
	  			<td width="120"><?php echo $user['lastname']; ?></td>
	  			<td width="70"><?php echo $user['email']; ?></td>
	  		  </tr>
	  		<?php $no++; ?>
	  		<?php endforeach; ?>
	  	</tbody>
	  </table>
	 </div>
</body>
</html>