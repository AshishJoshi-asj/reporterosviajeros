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
			<?php echo anchor('home/logout', 'Cerrar sesion'); ?>
		</h4>
	<?php } ?>


		<div>
			<?php 
				echo form_open('home/anadirlugar');
				echo form_input('nombre', 'nombre');
				
				$listaRubros = array();
				
				foreach ($rubros as $rubro) 
				{
					log_message('debug', $rubro);					
				}
		
                echo form_dropdown('rubro', $rubros, $rubros[3]['name']);
				echo form_input('tipo', 'tipo');
				echo form_input('localizacion', 'localizacion');
				echo form_input('contacto', 'contacto');
				echo form_submit('submit', 'Enviar');
				echo form_close();
			?>
		</div>	
<br>


<br><br><br><br>
	
	

	

</body>
</html>
