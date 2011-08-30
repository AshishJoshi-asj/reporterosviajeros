<html>
<head>
    

    
   	<style>
   		body{
   			font-family: Arial;
   			width: 900px;
   			background: #909090;
   			margin: auto;
   		}
   	
   		#header_wrap {
   			/*display: block;*/
   		}
   		
   		#header_wrap input {
   			width: 85px;
   			color: gray;
   			font-size: 10px;
			font-family: Tahoma, "Free Serif", "Lucida Grande", "Lucida Sans Unicode",sans-serif;			
   		}
   		
   		#login_box {
   			float: left;
   			font-family: Arial;
   			font-size: 10px;   			
   		}
   		
   		p { border: 1px green solid; line-height: 40px; }
   		
  		.divAsP { border: 2px green solid; line-height: 40px; }
   	</style>
</head>

<body>

	<p>
		Estoy dentro de un p�rrafo (P1) y aqu� dentro voy abrir un nuevo p�rrafo (P2). Escribo m�s texto para poder llegar a ocupar m�s de una l�nea y ver lo que ocurre
		<p>Ahora estoy en el nuevo p�rrafo (P2) y lo cierro ya.</p>
		Sigo escribiendo dentro del p�rrafo P1 y lo cierro ya
	</p>
	
	Estoy fuera del P1, directamente en el elemento body. El haber metido un p�rrafo dentro de otro, me genera una l�nea al final del P1 un poco rara
	
<hr>

	<div class="divAsP">
		Estoy dentro de un DIV(1) y aqu� dentro voy abrir un nuevo DIV(2). Escribo m�s texto para poder llegar a ocupar m�s de una l�nea y ver lo que ocurre
		<div>Ahora estoy en el nuevo DIV(2) y lo cierro ya.</div>
		Sigo escribiendo dentro del DIV(1) y lo cierro ya
	</div>
	
	Estoy fuera del DIV(1), directamente en el elemento body. Pero el meter un DIV dentro de otro no me genera problemas de altura

<hr>	
	
	<p>Segundo p�rrafo <a href="http://google.com">enlace a GOOGLE dentro del segundo p�rrafo</a> continuaci�n del segundo parrafo</p>

	
<hr>

	<a href="#">Un enlance es un elemento en l�nea</a>	
	<a href="#"> por lo tanto si lo siguiente es otro enlace aparecera en la misma l�nea</a>
<hr>
	
	<h3 style="margin: 0px; border: 1px solid green;">Los elementos heading (H3) son de tipo block</h3>
	<h1>Da igual su tama�o (H1)</h1>
	<h5>Da igual su tama�o (H5)</h5>
	
<hr>	
	
	<div style="border: 4px solid white;" >
		Estoy dentro de un DIV(1), escribiendo texto y voy a meter otro DIV(2)
		<div style="border: 2px dashed blue;">Ya estoy dentro del nuevo DIV(2). En una nueva l�nea, por lo tanto un DIV es un elemento de tipo block</div>	
		
		Ya he cerrado el DIV(2) y sigo escribiendo texto dentro del DIV(1). Ahora voy a meter un nuevo DIV(3) exactamente igual que el DIV(2), pero
		voy a modificar su estilo asi (display: inline)
		
		<div style="border: 2px dashed red; display: inline;">Ya estoy dentro del nuevo DIV(3). Pero no dentro de una nueva l�nea</div>

		Ya he cerrado el DIV(3) y voy a a�adir una imagen que son por defecto de tipo "inline"		
		
		<img alt="Texto alternativo de la image" src="http://cdn.viajeros.com/img/logo_homepage.gif">
			Si dentro de una imagen escribimos texto, aparecer� despu�s de la imagen.
		</img>
		
		Y si lo escribimos despu�s de la imagen, tambi�n aparece como <i>inline</i>
		Aora vamos a meter una nueva imagen:		
		 
		<img alt="Texto alternativo de la image" src="http://cdn.viajeros.com/img/logo_homepage.gif">			
			Pero si ahora estando dentro de una image a�adimos un p�rrafo <p>todo se jode</p> Bueno, ya estamos fuera del p�rrafo, pero seguimos dentro de la imagen.
			Si ahora metemos un DIV
			<div style="border: 1px red solid;">
				Estoy dentro del DIV, pasa lo mismo que con el p�rrafo, pero los m�rgenes son diferentes 
			</div>

			Ya estoy fuera del DIV, pero seguimos dentro de la imagen. Voy a meter un nueva p�rrafo (a�n dentro de la imagen)
			
			<p style="margin: 0; border: 1px red solid;">
				A este p�rrafo le he modificado el estilo asi (margin: 0px). Ahora se ve igual que el DIV 
			</p>
		</img>
		
		
	</div>
	
<hr>
	
	<a>
		Esto es un link. Y ahora voy a meter un DIV 
		<div style="border: 1px dotted;">
			estoy dentro del div. Vemos que el DIV es de tipo block, porque estamos en una nueva l�nea
		</div>
		Aunque hayamos cerrado el DIV y sigamos dentro del link, estamos en una nueva l�nea, ya que los elementos block ocupa
		hasta el final de la l�nea, aunque no tengan texto suficiente. Seguimos dentro del link y metemos una imagen
		<img>--IMAGEN--</img>
		Seguimos dentro del link.
	</a>
	
<hr>	

	<div style="width: 100%; margin: auto; border: 1px solid red;">
		<div style="display: inline; margin: auto;">
		1	
		</div>
		<div style="display: inline; margin: auto;">
		2	
		</div>
		<div style="display: inline; margin: auto; float: right;">
			<h2 style="float: right; font-family: Arial; font-size: 16px;">
		    	Inicia sesi�n 
		    	<span>�</span>
		    	<a href="#">Registrate gratis </a> 
		    	
		    </h2>
		    <form>
		        <input id="username" type="text" name="username" value="Nombre de usuario"/>
		        <input id="password" type="password" name="password" value="Contrase�a"/>
		        <button name="submit" type="submit">Iniciar sesi�n</button> 
		    </form>
		    
		   	<a href="site/login">Entrar</a>
		</div>				
	</div>

<hr>
	
	
	
	
	<a>qwe</a>
		<a>
			<img style="display: block;" src="http://cdn.viajeros.com/img/logo_homepage.gif"/>
		</a>
	<a>qwe</a>
		<h3 style="display: inline;" >asd</h3>
	<a>asd</a>

	<div id="header_wrap">
	
		<a href="http://www.viajeros.com/" title="Ir al inicio de Viajeros.com">
			<img src="http://cdn.viajeros.com/img/logo_homepage.gif" />
		</a>
		<a>asd</a>
		<p>kk</p>

		<h1 class="invis">Viajeros.com</h1>
		<p class="sel-pais">
			<span class="flag-small flag-small-ES">&nbsp;</span>
			<span class="pais">Espa&ntilde;a</span>
		</p>
		<h2 class="slogan titulo">La comunidad m�s grande de viajeros de habla hispana.</h2>
				
	    
	    <div id="login_box">
		    <h2>
		    	Inicia sesi�n 
		    	<span>�</span>
		    	<a href="#">Registrate gratis </a> 
		    	
		    </h2>
		    <form>
		        <input id="username" type="text" name="username" value="Nombre de usuario"/>
		        <input id="password" type="password" name="password" value="Contrase�a"/>
		        <button name="submit" type="submit">Iniciar sesi�n</button> 
		    </form>
		    
		   	<a href="site/login">Entrar</a>
		</div>
	    
    </div>
    
    <div id="content_wrap">
    
    </div>
    
    
    <div id="footer_wrap">
    
    
    </div>
</body>
</html>