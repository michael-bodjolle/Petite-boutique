<?php

class panier
{

    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }
    public function AjoutPanier($idproduit, $iduser)
    {

        $connexionbdd = $this->bdd->connectDb();

        if (!empty($idproduit) && !empty($iduser)) {

          
            $query = $connexionbdd->prepare("SELECT stock FROM produits WHERE id = ?");
            $query->execute(array($idproduit));
            $results = $query->fetch();
            
         

            $quantite = 1;
            if ($results['stock'] > 0) {

                $query = $connexionbdd->prepare("INSERT INTO panier (id_produit, id_utilisateur,quantite) VALUES (?, ?,?)");
                $query->execute(array($idproduit, $iduser, $quantite));
                echo "votre produit a été ajouter au panier";
            } else {
                echo "le produit n'est plus en stock";
            }
        }








        


    }
}
