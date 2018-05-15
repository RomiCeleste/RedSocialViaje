  <!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Group Trip</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <div class="container">
      <section class="left">
        <header>
          <div class="header-class">
            <h1><img src="img/avion1-50.jpg">    Group Trip</h1>
          </div>
          <nav class="nav">
            <ul>
              <li>Quienes Somos</li>
              <li>Proximos Viajes</li>
              <li>Contacto</li>
              <li><a href="faq.php" class="btn"> F.A.Q.</li></a>
            </ul>
          </nav>
        </header>
        <main>
          <section class="content">
            <h2>No tendrás un viaje aburrido!!</h2>
            <p class="intro"> Red Social que permite comunicarse con otras personas con mismos intereses y  posibilidades de viajar a distintas ciudades del mundo.</p>
            <p>Completá tus datos y ponete en contacto con gente cerca tuyo que quieren ir a dónde vas vos.</p>
            <h3 class="conectate">Conectate al mundo</h3>
          </section>
          <section class="login registrado">
            <form class="" method="post" action="usuario.php">
              <label for="inputEmail" >Usuario</label>
              <input type="text" id="inputEmail" name="usuario" placeholder="Usuario" pattern="[A-Za-z_-0-9]{1,20}" required autofocus>

              <label for="inputPassword" >Contraseña</label>
              <input type="password" id="inputPassword" name="contrasena" placeholder="Contraseña" pattern="[A-Za-z_-0-9]{1,20}" required>

              <input type="checkbox" id="acordate" value="remember-me" name="acordate">
              <label for="acordate">Recuérdame</label>

              <br>
              <br>

              <button type="submit" name="loguear" class="btn">Log In</button>

            </form>
            <br>
            <br>
            <div class="registrarse">
              <a href="registro.php" class="btn">Registrarse</a>
            </div>
          </section>
        </main>
      </section>
      <aside class="right">
      </aside>
    </div>
  </body>

</html>
