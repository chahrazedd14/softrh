<?php
require_once "views/header.html.php";
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <?php

            foreach ($films as $film) {

            ?>
                <div>
                    <p><strong>Titre: </strong><?php echo $film['titre']; ?></p>
                    <p><strong>Année de sortie: </strong><?php echo $film['annee']; ?></p>
                    <p><a href="/films/detail/<?php echo $film['id']; ?>">Voir la fiche</a></p>
                </div>
            <?php
            }
            ?>


        </div>

    </div>



    <?php
    require_once "views/footer.html.php";
    ?>