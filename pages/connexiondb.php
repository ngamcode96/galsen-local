 <?php
 function connexion(){
      
      
      try {
        $conn = new PDO("mysql:dbname=nom_base_de_donnees;host=localhost",'root','');

        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
      } 

      catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
      }   
      return null;  
    }
    $bdd = connexion();
    ?>
