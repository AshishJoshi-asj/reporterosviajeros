<html>
<head>
    
	<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.6.2.js"> </script>
	
	<script>
	$(document).ready(function()
	{
		$("#boton").click(function() 
		{
			$('#book').slideDown('slow', function() 
					{

				  });
	});
	
	</script> 
</head>

<body>
	<div id="boton">
		<p>pulsame</p>
	</div>

	<div id="div1" style='line-height: 5px; visibility: hidden;'>
		Esto es lo que estaba oculto
	</div>
</body>
</html>