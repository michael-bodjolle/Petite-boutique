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
        if (isset($_POST['submit']) && $results['statut'] == 1) {

            $prod->Ajout($_POST['nom_produit'], $_POST['images'], $_POST['prix'], $_POST['detail'], $_POST['categorie_id'], $_POST['stock']);
        }

        if (isset($_POST['supprimer']) && $results['statut'] == 1) {

            $prod->Delete($_POST['id']);

            echo "Votre produit a été supprimé";
        }
        $results = $prod->getCategories();
        ?>
    </header>
        
    <main>
        <!-- justify-content-center mx-5 d-flex -->
        <div class="container">
            <div class="row d-flex justify-content-center  col-md-lg-xs-8  ">

                <form method="post" action="" class="w-50 p-3 mt-5  bg-dark text-white">
                    <h2 class="panel-titles text-center mt-5 text-warning ">Gestion de produits </h2>
                    <div class="mb-3">
                        <label class="form-label">Produit</label>
                        <input type="nom_produit" name="nom_produit" class="form-control">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="images" class="form-control" />

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prix</label>
                        <input type="number" name="prix" class="form-control" />

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Détail</label>
                        <textarea name="detail" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Catégorie</label>
                        <select name="categorie_id">
                            <?php foreach ($results as $result) {  ?>
                                <option value="<?= $result['id'] ?>"> <?= $result['nom'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control">

                    </div>

                    <button type="submit" name="submit" class="btn btn-warning">Ajouter</button>
                </form>
                <?php
                $connexionbdd = $bdd->connectDb();
                $query = $connexionbdd->prepare("SELECT *, produits.id as produit_id, categorie.id as categorie_id FROM produits INNER JOIN categorie  ON  produits.categorie_id = categorie.id");
                //SELECT produits.*, categorie.* FROM `produits`, categorie WHERE produits.categorie_id = categorie.id
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);


                ?>


                
                <div class="row mt-5">

                    <table class="table ">

                        <thead>
                            <tr>
                                <th scope="col">Nom produits</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Stock</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                
                            </tr>
                        </thead>
                        <?php foreach ($results as $info) {  ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $info['nom_produit'] ?>
                                    </th>
                                    <td> <img src="images/<?= $info['images'] ?>" height="75" alt="">
                                    </td>
                                    <td><?= number_format($info['prix'], 2, ',', ' ') ?>€
                                    </td>
                                    <td><?= $info['nom'] ?>
                                    </td>
                                    <td><?= $info['stock'] ?>
                                    </td>
                                    <td><a href="reediter.php?produit_id=<?= $info['produit_id'] ?>"><img src="images/icons8-modifier-24.png" alt=""></a></td>

                                    <form method="POST" action="#">
                                        <td><button type="submit" name="supprimer" value="supprimer" class="btn btn-warning">Supprimer</button>
                                            <input type="hidden" name="id" class="form-control" id="id" value="<?= $info['produit_id'] ?>" />
                                        </td>
                                    </form>
                                </tr>

                            <?php   } ?>
                            </tbody>
                    </table>
                </div>

            </div>





        </div>
        </div>




    </main>

    <footer>
        <?php include("footer.php"); ?>
    </footer>

</body>

</html>