<!DOCTYPE html>
<htmL>

<head>
    <title>Gestion de produit</title>
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
        <?php include("header.php");
        if (isset($_POST['ajouter']) && $results['statut'] == 1) {

            $prod->AjoutCategorie();
        }

        

        if (isset($_POST['supprimer']) && $results['statut'] == 1) {
            $prod->DeleteCat($_POST['id']);
            echo "categorie supprimé";
        }

        ?>
    </header>

    <main>


        <div class="container-fluid">
            <div class="row mx-5 d-flex justify-content-center ">

                <form method="post" action="" class="w-50 p-3 mt-5  bg-dark text-white">
                    <h2 class="panel-titles text-center mt-5 text-warning ">Gestion de categorie </h2>
                    <div class="mb-3">
                        <label class="form-label">nom</label>
                        <input type="text" name="nom" class="form-control">

                    </div>

                    <div class="mb-3">
                        <label class="form-label">ordre d'affichage</label>
                        <input type="number" name="affichage_order" class="form-control">

                    </div>
                    <button type="submit" name="ajouter" class="btn btn-warning">Ajouter</button>
                </form>


            </div>
            <div class="row">
                <div class="col-md-4 mt-5">
                    <?php
                    $results = $prod->getCategories()
                    


                    ?>

                    <?php foreach ($results as $info) {  ?>
                    

                            <h3> <?php echo $info['nom'] ?></h3>
                            <form method="POST" action="#">
                                <button type="supprimer" name="supprimer" value="supprimer" class="btn btn-warning">Supprimer</button>
                                <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $info['id'] ?>" />
                            </form>
                       
                    <?php } ?>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <?php include("footer.php"); ?>
    </footer>

</body>

</html>