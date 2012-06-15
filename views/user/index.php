<h1>User</h1>

<form method=post action=<?php echo URL; ?>user/create>
	<label>Login</label><input type=text name=login /><br />
	<label>Password</label><input type=text name=password /><br />
	<label>Role</label>
		<select name=role>
			<option value=default>Default</option>
			<option value=admin>Admin</option>
		</select><br />
	<label>&nbsp;</label><input type=submit />
</form>
<hr />
<table>
<tr>
<?php
foreach($this->userList as $key => $value) {
	echo '<tr>';
	echo '<td>' . $value['login'] . '</td>';
	echo '<td>' . $value['role'] . '</td>';
	echo '<td><a href="'.URL.'user/edit/'.$value['id'].'">Edit</a> <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></td>';
	echo '</tr>';

}
//print_r($this->userList);
?>
</tr>
</table>