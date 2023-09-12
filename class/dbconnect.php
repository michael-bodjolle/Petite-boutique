
<?php

class ConnectBdd
{
    private $connec_host = 'localhost';
    private $connec_dbname = 'boutique_hat';
    private $connec_pseudo = 'root';
    private $connec_mdp = '';

    public function connectDb() {
        try {
            $bdd = new PDO('mysql:host='.$this->connec_host.';dbname='.$this->connec_dbname, $this->connec_pseudo, $this->connec_mdp);
            $bdd->exec("SET CHARACTER SET utf8"); 
            
            $bdd->exec("SET NAMES utf8");
        }
        catch(PDOException $e) {
            die('<h3>Erreur!</h3>');
        }
        return $bdd;
    }
    
}



 ?>


