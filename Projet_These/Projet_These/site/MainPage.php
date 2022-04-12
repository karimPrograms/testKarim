<?php
include '../login/config.php'; 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}

if (isset($_POST['Submit'])){
  $Nom = $_POST['NomP'];
  $Prix = $_POST['Prix'];
  $Dispo = $_POST['Dispo'];
  $Type = $_POST['typeP'];
  $PharmaID = $_SESSION['username'];

  if($Type == 'Material Pharmaceutique'){
    $mili = 0;
  }else{
    $mili = $_POST['Milligramme'];
  }

  $sql2 = "INSERT INTO medicament (pharma_Id, Type, Nom, Miligramme, Prix, Disponible)
            VALUES ('$PharmaID ', '$Type', '$Nom', '$mili', '$Prix', '$Dispo')";
  $result2 = $mysqli->query($sql2);
  if ($result2){
    $Nom = "";
    $Prix = "";
    $Dispo = "";
    $Type = "";
    header("Location: MainPage.php");
  }else{
    echo"<script>alert('oops! erreur')</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      <?php
        include 'mystyle.css'
      ?>
    </style>
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
        <div class="titre"><h2>Formulaire</h2></div>

        <form action="#" method="post">

          <div class="radioInput">
            <label for="type" class='labelname'> Type de Produit:</label>

            <label class="radiochoice"> Médicament 
              <input type="radio" id="type" name="typeP" value="Medicament" checked="checked"/>
              <span class="checkmark"></span>
            </label>

            <label class="radiochoice"> Matérial Pharmaceutique
              <input type="radio" name="typeP" id="type" value="Material Pharmaceutique"/>
              <span class="checkmark"></span>
            </label>
          </div>

          <div class="dataInput">
            <label for="NomP">Nom de Produit:</label>
            <input
              type="text"
              name="NomP"
              id="Nom"
              placeholder="Tapez le nom"
              required
            />
          </div>

          <div class="dataInput">
            <label for="mili"> Millgramme :</label>
            <input
              type="number"
              name="Milligramme"
              id="mili"
              placeholder="Tapez les milligrammes"
              required  
            />
          </div>

          <div class="dataInput">
            <label for="Prix"> Prix:</label>
            <input
              type="number"
              name="Prix"
              id="Prix"
              placeholder="Tapez le prix"
              required     
            />
          </div>

          <div class="radioInput">
            <label for="Dispo" class='labelname'>Disponible:</label>

            <label class="radiochoice"> Oui 
              <input type="radio" id="type" name="Dispo" checked="checked" value="Oui"/>
              <span class="checkmark"></span>
            </label>

            <label class="radiochoice"> Non
              <input type="radio" id="type" name="Dispo" value="Non"/>
              <span class="checkmark"></span>
            </label>
          </div>

          <div class="dataInput">
            <input type="submit" value="Ajouter" id="myBtn" name="Submit" />
          </div>

        </form>
      </div>
    </div>

    <div class="MedicaleTable">
        <div class="Mytable">
          <table class="Table">
            <thead>
              <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Milligramme</th>
                <th>prix</th>
                <th>Disponible</th>
              </tr>
            </thead>

            <?php
            $PharmaID = $_SESSION['username'];
            $sql = "SELECT Type, Nom, Miligramme, Prix, Disponible FROM medicament where pharma_Id='$PharmaID'";
            $result = $mysqli->query($sql);

            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo "<tr><td>". $row["Type"]. "</td><td>". $row["Nom"].
                "</td><td>". $row["Miligramme"]."</td><td>". $row["Prix"].
                "</td><td>". $row["Disponible"]."</td></tr>";
              }
              echo "</table>";
            }else{
              echo "0 Results";
            }
            ?>
          </table>
        </div>
      </div>

    <script src="./index.js"></script>
  </body>
</html>
