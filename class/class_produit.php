<?php

class Produits
{
   
    private $bdd;

    public function __construct($bdd)
    {

        $this->bdd = $bdd;
    }


    public function Ajout($nomproduit, $image, $prix, $detail, $categorie, $stock)
    {



        $connexionbdd = $this->bdd->connectDb();

        $price = intval($prix);
        $stocks = intval($stock);

        if (!empty($nomproduit) && !empty($image) && !empty($prix) && !empty($detail) && !empty($categorie) && !empty($stock)) {


            $query = $connexionbdd->prepare("INSERT INTO produits (nom_produit, images, prix, detail, categorie_id, stock) 
            VALUES (:nom_produit, :images, :prix, :detail, :categorie, :stock)");
            $query->execute(
                array(
                    ':nom_produit' => $nomproduit,
                    ':images' => $image,
                    ':prix' => $price,
                    ':detail' => $detail,
                    ':categorie' => $categorie,
                    ':stock' => $stocks,
                )

            );
            echo "Votre produit a bien été  ajouté";
              

            
        }
    }

    public function Delete($id)
    {

        $connexionbdd = $this->bdd->connectDb();

        echo $id;

        $query = $connexionbdd->prepare("DELETE FROM produits WHERE id= ? ");
        $query->execute(array($id));
    }
    public function getCategories()
    {
        $connexionbdd = $this->bdd->connectDb();
        $query = $connexionbdd->prepare("SELECT * FROM `categorie` ORDER BY affichage_order");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function AjoutCategorie()
    {
        $nom = $_POST['nom'];

        $affichageOrder = $_POST['affichage_order'];
        $connexionbdd = $this->bdd->connectDb();
        $error = [];
        if (empty($nom)) {
            $error[] = 'Il faut un nom';
        }

        if (empty($error)) {
            $query = $connexionbdd->prepare("INSERT INTO categorie (`nom`, `affichage_order`) 
            VALUES (?,?)");
            $query->execute(
                array(
                    $nom, $affichageOrder,
                )

            );
        }

        return $error;
    }
    public function UpdateProduit($nomproduit, $image, $prix, $detail, $categorie, $stock, $id)
    {

        $connexionbdd = $this->bdd->connectDb();

        $idproduit = intval($id);


        if (!empty($nomproduit)) {

           


                $query = $connexionbdd->prepare("UPDATE produits SET nom_produit = '$nomproduit' WHERE id = $idproduit ");
                $query->execute();
               
                echo "votre nom de produit a été mis a jour";
            
            
            
        }

        if (!empty($image)) {

            $queryimage = $connexionbdd->prepare("UPDATE `produits` SET `images`= ? WHERE id =? ");
            $queryimage->execute(array($image,$idproduit));
            echo "votre image a été mis a jour";
          
        }

        if (!empty($prix)) {

            $queryprice = $connexionbdd->prepare("UPDATE `produits` SET `prix`= ? WHERE id =?");
            $queryprice->execute(array($prix,$idproduit));
            echo "votre prix a été mis a jour";
            //header('location:profil.php');
            
        }
        if (!empty($detail)) {

            $querydet = $connexionbdd->prepare("UPDATE `produits` SET `detail`= ? WHERE id =?");
            $querydet->execute(array($detail,$idproduit));
            echo "vos details ont été mis a jour";
            //header('location:profil.php');

        }
        if (!empty($categorie)) {

            $querycat = $connexionbdd->prepare("UPDATE `produits` SET `categorie`= ? WHERE id =?");
            $querycat->execute(array($categorie,$idproduit));
           
            //header('location:profil.php');

        } else {
            echo'<p>rien <p>';
        }
        if (!empty($stock)) {

            $querystock = $connexionbdd->prepare("UPDATE `produits` SET `stock`= ? WHERE id =?");
            $querystock->execute(array($stock,$idproduit));
            echo "votre prix a été mis a jour";
            //header('location:profil.php');

        } 
        
    }

    public function DeleteCat($id)
    {

        $connexionbdd = $this->bdd->connectDb();


        $query = $connexionbdd->prepare("DELETE FROM categorie WHERE id= $id ");
        $query->execute(array());
        
    }
}
