<?php include '../login/config.php'?>

<div class="MedicaleTable">
        <div class="Mytable">
        <form action="" method="post">   
         <div class="searching">

        <?php $search = (isset($_POST['Rechercher'])) ? htmlentities($_POST['Rechercher']) : ''; ?>

    <input class="form-control mr-sm-2" type="search" placeholder="rechercher par nom" name="Rechercher" id="searchBox" value="<?= $search ?>"/>
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
            $var1 = 1;
            $search_result=filtrerTable($query, $var1);
           }
           else{
           $query ="SELECT Med_Id, Type, Nom, Miligramme, Prix, Disponible FROM medicament where (Nom LIKE '%$valueToSearch%' and pharma_Id='$PharmaID')";
           $var1 = 0;
           $search_result=filtrerTable($query, $var1);
           }
         }
            else{
               $query= "SELECT Med_Id, Type, Nom, Miligramme, Prix, Disponible FROM medicament where pharma_Id='$PharmaID'";
               $var1 = 1;
               $search_result=filtrerTable($query, $var1);
               
            }
     
            function filtrerTable($query, $var1)
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
              }elseif($var1 == 0){
                echo "
                <div class=mainresult>
                <div class=resultat>
                  le nom n'exist pas !
                </div>
                </div>";
              } else{
                echo "
                <div class=mainresult>
                <div class=resultat>
                  Il ne y'a Aucun medicament dans la base de donnée 
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