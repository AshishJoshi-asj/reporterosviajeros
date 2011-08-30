<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>De Viaje</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/site.css"/>
</head>
<body>
	<?php
	
		if ($this->session->userdata('is_logged_in'))
		{
		
		echo anchor('home/','home');
		
	
	?>
		<h2>Hola <?php echo $this->session->userdata('username'); ?>!</h2>
		<p>This section represents the area that only logged in members can access.</p>
		<h4><?php echo anchor('home/logout', 'Logout'); ?></h4>
		
		<div id="body_wrap">
			<div id="header" style="border: 1px solid black; display: inline-block; width: 960px">
				<div>				
					<h2>Bien!, tu diario "<?php echo $newDiarioTitulo; ?>" ya está creado</h2>
				</div>
				<div>
					<div id="login_form">
						<?php 
							echo form_open('home/addDiaryChapter');
							echo form_input('titulo', 'titulo');
							echo form_input('lugar','lugar');
							echo form_input('fecha','fecha');
							echo form_textarea('relato','relato');
							echo form_submit('submit', 'Añadir capítulo!');
							echo form_close();
						?>
					</div><!-- end login_form-->

				</div>
			</div>
		</div>
		
	
	<?php
	
		}
		else
		{
	
	?>

		<div id="body_wrap">
			<div id="header" style="border: 1px solid black; display: inline-block; width: 960px">
				<div style="float: left;">
					<h2>Title</h2>
				</div>
				<div style="float: right;">
					
					<div id="login_form">
						<?php 
							echo validation_errors();
						
							echo form_open('home/validate_credentials');
							echo form_input('username', 'Username');
							echo form_password('password', 'Password');
							echo form_submit('submit', 'Login');
							echo anchor('home/signup', 'Create Account');
							echo form_close();
						?>
					</div><!-- end login_form-->

				</div>
			</div>
		</div>
	<?php
	
		}
	
	?>

<br><br><br><br>
	
	

	

</body>
</html>
