<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>De Viaje</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/site.css"></link>
	<link rel="stylesheet" href="<?php echo base_url();?>css/menu_style.css"></link>
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.2.js"></script>
	
</head>
<body>


		<ul id="menu">
			<li><?php echo anchor('home/', 'HOME'); ?></li>
			<li><?php echo anchor('home/destinos', 'DESTINOS'); ?></a></li>
			<li><?php echo anchor('home/', 'REPORTAJES'); ?></a></li>
			<li><?php echo anchor('home/', 'FOTOS'); ?></a></li>
			<li><?php echo anchor('home/', 'NOTICIAS'); ?></a></li>
			<li><?php echo anchor('home/', 'FORO'); ?></a></li>
			<li><?php echo anchor('home/opiniones', 'OPINIONES'); ?></a></li>
		</ul>

	<br>		
	<?php
			
		if ($this->session->userdata('is_logged_in'))
		{
	?>	
		<h4>
			<?php 	echo anchor('home/', 'HOME');
					echo anchor('home/logout', 'SALIR');
			?>
		</h4>
		
		 
		
		
	
		<h2 style='clear: both;'>Hola <?php echo $this->session->userdata('username'); ?>!</h2>
		<p>This section represents the area that only logged in members can access.</p>
		
		
		<h2>Estos son tus diarios</h2>
		
		<button id="btnOcultar">Ocultar</button>
		
		<div id="diarios">
		<?php 			
			foreach ( $diarios as $diario ) 
			{
		?>
				<h3>Titulo - <?php echo $diario->title;?></h3>
				<?php echo anchor('home/editarDiario/'.$diario->id,'Editar'); ?>
				<p style='padding-left: 20px;'><?php echo $diario->description; ?></p>
				
		<?php
			}
		?>
		</div>
		
		<script>
		$("#btnOcultar").click(function () 
		{
			$("#diarios").slideToggle("fast");
		});
		</script>
		
		<div id="body_wrap">
			<div id="header" style="border: 1px solid black; display: inline-block; width: 960px">
				<div style="float: left;">
					<h2>Nuevo diario</h2>
				</div>
				<div>
					<div id="login_form">
						<?php 
							echo form_open('home/creardiario');
							echo form_input('titulo', 'titulo');
							echo form_textarea('descripcion','descripcion');
							echo form_submit('submit', 'Comenzar el diario!');
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



<br>


<br><br><br><br>
	
	

	

</body>
</html>
