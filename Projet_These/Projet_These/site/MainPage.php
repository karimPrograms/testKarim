<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="mystyle.css" />
    <title>Welcome</title>
  </head>
  <body>
    <nav class="navBar">
      <div class="container">
        <ul class="flex-bar">
          <li><a href="../login/logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
    <div class="myWebSite">
      <div class="formulaire">
        <div class="titre"><h1>Formulaire</h1></div>
        <form action="#" method="post">
          <div class="radioInput">
            <label for="type"> Type de produit:</label>
            Médicament
            <input type="radio" id="type" name="typeP" />
            MatérialPharm
            <input type="radio" name="typeP" id="type" />
          </div>
          <div class="dataInput">
            <label for="NomP">Nom de Produit:</label>
            <input
              type="text"
              name="NomP"
              id="NomP"
              placeholder="Tapez le nom"
              required
            />
          </div>
          <div class="dataInput">
            <label for="mili"> Millgramme :</label>
            <input
              type="text"
              nom="Milligramme"
              id="mili"
              placeholder="Tapez les milligramme"
            />
          </div>
          <div class="dataInput">
            <label for="Prix"> Prix:</label>
            <input
              type="number"
              nom="Prix"
              id="Prix"
              placeholder="Tapez le prix"
              required     
            />
          </div>
          <div class="radioInput">
            <label for="Dispo">Disponible:</label>
            <span>oui </span> <input type="radio" name="Dispo" id="Dispo" />
            <span>non</span>
            <input type="radio" name="Dispo" id="Dispo" />
          </div>
          <div class="dataInput">
            <input type="submit" value="Registrer" id="myBtn" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
