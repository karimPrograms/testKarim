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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier les informations:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  <form>
        <div class="form-group">
           <label for="nameInput">Nom de pharmacie:</label>
           <input type="text" name="pharmName" class="form-control" id="nameInput" placeholder="Enter Name">
        </div>
     <div class="form-group">
          <label for="InputNumber1">Contact Number1:</label>
          <input type="Number" name="pharmNum1" class="form-control" id="InputNumber1" placeholder="Contact Number1">
    </div>
    <div class="form-group">
          <label for="InputNumber2">Contact Number2:</label>
          <input type="Number" name="pharmNum2" class="form-control" id="InputNumber2" placeholder="Contact Number2">
    </div>
    <div class="form-group">
          <label for="Adresse">Adresse:</label>
          <input type="text" name="pharmAdr" class="form-control" id="Adresse" placeholder="Tapez l'adresse">
    </div>
    <div class="form-group">
    <label for="Email">Email:</label>
    <input type="email" name="pharmEmail" class="form-control" id="Email" placeholder="Enter email">
  </div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="submit" name="EditInfo" class="btn btn-primary">Sauvgarder</button>
      </div>
  </form>
    </div>
  </div>
</div>
    <nav class="navBar">
      <div class="container">
        <ul class="flex-bar">
          <li><button type="button" class="btn btn-primary editInfo" data-toggle="modal" data-target="#editModal" id="navBtn">About Us</button></li>
          <li><a href="../login/logout.php">Logout</a></li> 
        </ul>
      </div>
    </nav>
    
  <div class="flexTable">
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
        <form action="" method="post">   
         <div class="searching">
    <input class="form-control mr-sm-2" type="search" placeholder="rechercher par nom" name="Rechercher" id="searchBox" />
    <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="searchsub" value="rechercher" />
         </div>
         </form>
         <table class="Table">
         
            <?php    
          
            $PharmaID = $_SESSION['username'];
          if (isset($_POST['searchsub'])){
           $valueToSearch = $_POST['Rechercher'];
           if($valueToSearch==""){
            $query= "SELECT Med_Id, Type, Nom, Miligramme, Prix, Disponible FROM medicament where pharma_Id='$PharmaID'";
            $search_result=filtrerTable($query);
           }
           else{
           $query ="SELECT Med_Id, Type, Nom, Miligramme, Prix, Disponible FROM medicament where Nom LIKE '%$valueToSearch%'";
           $search_result=filtrerTable($query);
           }
         }
            else{
               $query= "SELECT Med_Id, Type, Nom, Miligramme, Prix, Disponible FROM medicament where pharma_Id='$PharmaID'";
               $search_result=filtrerTable($query);
            }
     
            function filtrerTable($query)
            { include '../login/config.php';
              
              $filtrer=$mysqli->query($query);
              if($filtrer->num_rows > 0){
               echo "   
               <thead>
               <tr>
                 <th>Type</th>
                 <th>Nom</th>
                 <th>Milligramme</th>
                 <th>prix</th>
                 <th>Disponible</th>
                 <th>supprimer</th>
                 <th>modifier</th>
               </tr>
             </thead>";
                while($row = $filtrer->fetch_assoc()){
                  echo "<tr>
                  <td>". $row["Type"]. "</td>
                  <td>". $row["Nom"]. "</td>
                  <td>". $row["Miligramme"]."</td>
                  <td>". $row["Prix"]."</td>
                  <td>". $row["Disponible"]."</td>
                  <td><a href='delete.php?id=". $row["Med_Id"]."' id='btn'><ion-icon name=trash-outline></ion-icon></a></td>
                  <td> <button type='button' id=". $row["Med_Id"]." class='btn btn-success editbtn'> <ion-icon name=create-sharp></ion-icon> </button></td>
                  </tr>";
                }
                echo "</table>";
              }else{
                echo "
                <div class=mainresult>
                <div class=resultat>
                  le nom n'exist pas !
                </div>
                </div>";
              }
              return $filtrer;
            }
            ?>
          </table>
          
        </div>
      </div>
  </div>
     <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
     <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Modifier Les Informations </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                          <div class="radioInput">
                            <label for="type" class='labelname'> Type de Produit:</label>

                            <label class="radiochoice"> Médicament 
                              <input type="radio" id="typeP1" name="typeD" value="Medicament" class="form-control"/>
                              <span class="checkmark"></span>
                            </label>

                            <label class="radiochoice"> Matérial Pharmaceutique
                              <input type="radio" name="typeD" id="typeP2" value="Material Pharmaceutique" class="form-control"/>
                              <span class="checkmark"></span>
                            </label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="NomP">Nom de Produit:</label>
                            <input
                              type="text"
                              name="NomD"
                              id="NomP"
                              placeholder="Tapez le nom"
                              class="form-control"
                              required
                            />
                        </div>

                        <div class="form-group">
                          <label for="mili"> Millgramme :</label>
                            <input
                              type="number"
                              name="MilligrammeD"
                              id="miliP"
                              placeholder="Tapez les milligrammes"
                              class="form-control"
                              required  
                            />
                        </div>

                        <div class="form-group">
                          <label for="Prix"> Prix:</label>
                            <input
                              type="number"
                              name="PrixD"
                              id="PrixP"
                              placeholder="Tapez le prix"
                              class="form-control"
                              required     
                            />
                        </div>

                        <div class="radioInput">
                          <label for="Dispo" class='labelname'>Disponible:</label>

                          <label class="radiochoice"> Oui 
                            <input type="radio" id="typeD1" name="DispoD" value="Oui" class="form-control"/>
                            <span class="checkmark"></span>
                          </label>

                          <label class="radiochoice"> Non
                            <input type="radio" id="typeD2" name="DispoD" value="Non" class="form-control"/>
                            <span class="checkmark"></span>
                          </label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Modifier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="./index.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                var selectedVal = "";
                var selected = $("input[type='radio'][name='typeP']:checked");
                if (selected.length > 0) {
                    selectedVal = selected.val();
                }
                if (data[0] == "Medicament"){ $("#typeP1").prop("checked", true);}
                else{$("#typeP2").prop("checked", true);}
                $('#NomP').val(data[1]);
                $('#miliP').val(data[2]);
                $('#PrixP').val(data[3]);
                if(data[4] == "Oui"){$("#typeD1").prop("checked", true);}
                else{$("#typeD2").prop("checked", true);}
                $('#update_id').val(event.srcElement.id);
            });
        });
    </script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
