<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>De Viaje</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/site.css"/>
</head>
<body>

	<h1>Registro</h1>
		<fieldset>
		<legend>Informacion personal</legend>
		<?php
			echo form_open('home/create_member');
			echo form_input('first_name', set_value('first_name', 'First Name'));
			echo form_input('last_name', set_value('last_name', 'Last Name'));
			echo form_input('email_address', set_value('email_address', 'Email Address'));
		?>
		</fieldset>

		<fieldset>
		<legend>Informacion usuerio</legend>
		<?php
			echo form_input('username', set_value('username', 'Username'));
			echo form_input('password', set_value('password', 'Password'));
			echo form_input('password2', 'Password Confirm');
			echo form_submit('submit', 'Create Acccount');
		?>

		<?php echo validation_errors('<p class="error">'); ?>
		</fieldset>

<br><br><br><br>
	
	

</body>
</html>
