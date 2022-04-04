<?php
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
  header("Location: welcome.php");
}

if (isset($_POST['Submit'])){
  $username = $_POST['Username'];
  $usermail = $_POST['Username'];
  $userpass = $_POST['Password'];


  $sql = "SELECT * FROM pharma_login WHERE (username='$username' OR email = '$usermail') AND password='$userpass'";
  $result = $mysqli->query($sql);

  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
		$_SESSION['username'] = $row['username'];
		header("Location: ../site/MainPage.php");
  }else{
    echo "<script>alert('Woops! Email or Mot De Passe uncorrect.')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&family=Poppins:wght@300&display=swap"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>
  <body>
    <nav class="navBar">
      <div class="container">
        <ul class="flex-bar">
          <li><a href="register.php">Créer Un Compte</a></li>
        </ul>
      </div>
    </nav>
    <section class="container_login">
      <div class="myImg">
        <img src="./images/pharmacists.jpg" alt="" />
      </div>

      <div class="myLogin">
        <div class="myForm">
          <h2>Connecter</h2>
          <form action="" method="POST">
            <div class="inputs">
              <label for="user">Email ou Nom d'Utilisateur</label>
              <input
                type="text"
                name="Username"
                id="user"
                placeholder="Entrer Votre Email ou Nom d'Utilisateur"
		required
              />
            </div>
            <div class="inputs">
              <label for="password">Mot de Passe</label>
              <input
                type="password"
                name="Password"
                id="Password"
                placeholder="Entrer Votre Mot de Passe"
		required
              />
            </div>
            <div class="inputs">
              <input id="myBtn" type="submit" value="Connecter" name="Submit" />
            </div>
            <div class="inputs">
              <p>Vous n’avez pas de compte ?  <a href="register.php">Inscrivez-vous</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
