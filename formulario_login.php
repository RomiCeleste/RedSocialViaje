<form class="" method="post" action="">
  <label for="inputEmail" >Usuario</label>
  <input type="text" id="inputEmail" name="email" placeholder="Usuario" pattern="[A-Za-z_-0-9]{1,20}"  value="<?php include_once 'formulario_value_login_email.php'; ?>">

  <label for="inputPassword" >Contraseña</label>
  <input type="password" id="inputPassword" name="password" placeholder="Contraseña" pattern="[A-Za-z_-0-9]{1,20}"  value="<?php //if(isset($_COOKIE['password'])){echo($_COOKIE['password']);} ?>">

  <input type="checkbox" id="acordate" value="acordate" name="acordate" <?php //if (isset($_COOKIE['email'])) { ?> checked <?php} ?>>
  <label for="acordate">Recuérdame</label>
  <br>
  <span id='register_email_errorloc' class='error'><?php //echo isset($errores["email"])? $errores["email"]:"";?></span>
  <br>
  <span id='register_email_errorloc' class='error'><?php //echo isset($errores["password"])? $errores["password"]:"";?></span>
  <br>
  <br>

  <button type="submit" name="loguear" class="btn">Log In</button>

</form>


<?php 
//https://github.com/RomiCeleste/RedSocialViaje.git
 ?>

