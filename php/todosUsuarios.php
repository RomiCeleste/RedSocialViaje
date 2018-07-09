<h3><?php echo("nombre completo: ". $usuario1['nombre_completo']) ?></h3>
<h3><?php echo("nombre usuario: " . $usuario1['usuario']) ?></h3>
<h3><?php echo("email: " . $usuario1['email']) ?></h3>
<br>
<div><img src="<?php echo($usuario1['avatar']) ?>" width="85"></div>
<form method="post">
	<input type="hidden" name="email" value="<?php echo $usuario1['email'] ?>">
	<input type="submit" value="borrar usuario">
</form>
<br><br><br>
