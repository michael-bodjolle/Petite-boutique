<!DOCTYPE html>
<htmL>

<head>
    <title>Boutique en ligne</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/bootstrap2.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>
    <header>
        <?php include("header.php"); ?>
    </header>

    <main>





        <h1 class="display-4 mb-5 mt-5 text-center  text-warning ">Vos commandes</h1>


        <div class="container-fluid mt-5    ">
            <div class="row ">


                <?php
                $connexionbdd = $bdd->connectDb();
                $query = $connexionbdd->prepare("SELECT produits.*, categorie.* FROM `produits`, categorie WHERE produits.categorie_id = categorie.id");
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);



                ?>

                <?php foreach ($results as $info) {  ?>

                    <div class=" card mx-5 mb-5" style="max-width: 400px;">

                        <div class="col-md-3">
                            <img src="images/<?php echo $info['images'] ?>" height="170" alt="">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $info['nom_produit'] ?></h5>
                            <strong>
                                <p class="mssg2"><?php echo $info['prix'] ?>€</p>
                            </strong>
                            <p class="mssg2" type="hidden"><?php echo $info['detail'] ?></p>
                            <p class="mssg2"><?php echo $info['nom'] ?></p>
                            <form method="POST" action="#">
                                <button type="submit" name="ajouter" value="supprimer" class="btn btn-warning">Ajouter au panier</button>
                            </form>

                        </div>
                    </div>


                <?php   } ?>

            </div>

        </div>


    </main>

    <footer>
        <?php include("footer.php"); ?>
    </footer>

</body>

</html>