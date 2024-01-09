<?php
require "../config.php";
require "../libs/Form.php";
require "../libs/Database.php";


if (isset($_REQUEST['run'])){
	try{
		$form = new Form();

		$form	->post('name')
				->val('minlength', 2)
				
				->post('age')
				->val('minlength', 2)
				->val('digit')
				
				->post('gender');
		
		$form	->submit();
		
		$data = $form->fetch();	
		
		echo "<pre>";
		
		print_r($data);
		
		$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		
		$db->insert('parson', $data);
		echo "</pre>";
	}catch(Exception $e){
		echo $e->getMessage();
	}

}

?>

<form method="post" action="?run">
	<label>Name</label><input type="text" name="name" />
	<label>Age</label><input type="text" name="age" />
	<label>Gender</label><select name="gender">
						<option value="m">Male</option>
						<option value="f">Female</option>
						</select>
	<input type="submit" />

</form>