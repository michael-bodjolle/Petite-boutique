<?php

require "class/config.php";

if (isset($_SESSION['id'])) {

    $connexionbdd = $bdd->connectDb();

    $ssid = $_SESSION['id'];
    $recupid = $connexionbdd->prepare("SELECT * FROM utilisateurs WHERE id ='$ssid'");
    $recupid->execute();
    $results = $recupid->fetch(PDO::FETCH_ASSOC);
}








if (isset($_POST['disconnect'])) {
    $user->Disconnect();
}



?>
<?php if (isset($_SESSION['id']) && $results['statut'] == 0) : ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand text-warning" >Hat Mode Sphere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <div class="navbar-nav">

                <a class="nav-link text-warning" href="index.php">Accueil</a>
                    <a class="nav-link text-warning" href="profil.php">Profil</a>
                    
                    <a class="nav-link text-warning " href="panier.php">Panier</a>
                </div>
            </div>
            <form method="POST" action="">
                <button type="disconnect" name="disconnect" class="btn btn-warning ml-5">Deconnexion</button>
            </form>


    </nav>
    </div>


<?php elseif (isset($_SESSION['id']) && $results['statut'] == 1) : ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">

        <div class="container-fluid">
            <a class="navbar-brand text-warning" >Hat Mode Sphere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <div class="navbar-nav">

                    <a class="nav-link text-warning" href="index.php">Accueil</a>
                    <a class="nav-link text-warning" href="profil.php">Profil</a>
                  
                    <a class="nav-link text-warning " href="gestionproduit.php">Gestion de produits</a>
                    <a class="nav-link text-warning " href="gestioncategorie.php">Gestion des categories</a>
                    
                    <a class="nav-link text-warning " href="panier.php">Panier</a>

                </div>
            </div>
            <form method="POST" action="">
                <button type="disconnect" name="disconnect" class="btn btn-warning ml-5">Deconnexion</button>
            </form>



    </nav>
    </div>
<?php else : ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-warning" >Hat Mode Sphere</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                     <a class="nav-link text-warning" href="index.php">Accueil</a>
                    <a class="nav-link text-warning" href="connexion.php">Connexion</a>
                    <a class="nav-link text-warning " href="inscription.php">Inscription</a>

                </div>
            </div>
        </div>
    <?php endif ?>
    </nav>