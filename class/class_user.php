<?php

class User
{
   
    private $bdd;
    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function Inscription($login, $prenom, $nom, $password, $repeatpassword)
    {

        $connexionbdd = $this->bdd->connectDb();

       
        if (!empty($login) && !empty($prenom) && !empty($nom) && !empty($password) && !empty($repeatpassword)) {

            $logexist = $connexionbdd->prepare("SELECT id from utilisateurs WHERE login='$login'");
            $logexist->execute();
            if ($logexist->rowCount()) {
                echo "<p class='text-danger'>ce login existe déjà<p>";
            } else {

                if ($password == $repeatpassword) {
                    if (preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{5,15})$#', $password)) {
                        $statut = 1;

                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $query = $connexionbdd->prepare("INSERT INTO utilisateurs (login,nom,prenom,password,statut) VALUES ('$login', '$prenom','$nom', '$password',0)");
                        $query->execute(array($login, $prenom, $nom, $password, $statut));
                       
                        header('location:connexion.php');
                    }
                } else echo "<p class='text-danger'> de 5 à 15 caractères <br>
                au moins une lettre minuscule <br>
                au moins une lettre majuscule <br>
                au moins un chiffre <br>
                au moins un de ces caractères spéciaux: $ @ % * + - _ !<br>
                aucun autre caractère possible: pas de & ni de { par exemple)<p>";
            }
        } else echo "veuillez saisir tous les champs";
    }



    public function Connexion($login, $password)
    {

        $connexionbdd = $this->bdd->connectDb();

        if ($login && $password) {
            $query = $connexionbdd->prepare('SELECT * FROM utilisateurs WHERE login = "' . $login . '"');
            $query->execute();
            $results = $query->fetch(PDO::FETCH_ASSOC);
            if (!empty($login) && password_verify($password, $results['password'])) {

                $_SESSION['id'] = $results['id'];
                header('location:index.php');
            } else echo "nom d'utilisateur ou mot de passe incorrect";
        } else echo "veuillez saisir tout saisir les champs";
    }





    public function Update($login, $prenom, $nom, $password, $newpassword, $id)
    {

        $connexionbdd = $this->bdd->connectDb();
        $id_user = intval($id);



        if (!empty($login)) {

            $logexist = $connexionbdd->prepare("SELECT id from utilisateurs WHERE login='$login'");
            $logexist->execute();

            if ($logexist->rowCount()) {
                echo "ce login existe déjà";
            } else {

                $query = $connexionbdd->prepare("UPDATE `utilisateurs` SET `login`= '$login' WHERE id = $id_user");
                $query->execute();
                echo "votre login a été mis a jour";
            }
        }

        if (!empty($prenom)) {

            $queryusername = $connexionbdd->prepare("UPDATE `utilisateurs` SET `prenom`= '$prenom' WHERE id = $id_user");
            $queryusername->execute();
            echo "votre prenom a été mis a jour";
            

        }

        if (!empty($nom)) {

            $queryname = $connexionbdd->prepare("UPDATE `utilisateurs` SET `nom`= '$nom' WHERE id = $id_user");
            $queryname->execute();
            echo "votre nom a été mis a jour";
            

        }

        if ($password == $newpassword) {
            if (preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{5,15})$#', $password)) {

                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 15]);
                $querypass = $connexionbdd->prepare("UPDATE `utilisateurs` SET `password`= '$password' WHERE id = $id_user");
                $querypass->execute(array($password));
                echo "mot de passe modifié";
            }
        } else echo "mot de passe erroné";
    }

    public function Disconnect()
    {
        session_unset();
        session_destroy();
        header('location:connexion.php');
    }
}
