<?php ob_start(); ?>

<p> Il y a <?= $requete->rowCount() ?> realisateurs </p>

<h2> Liste des Realisateurs</h2>
<table>
    <thread>
        <tr>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
    </thread>
    <tbody>
        <?php
        foreach ($requete->fetchAll() as $realisateur) {
        ?>
            <tr>
                <td><img src="<?= $realisateur["photo"] ?>">
                <td><a href="index.php?action=detailRealisateur&id=<?= $realisateur["id_realisateur"] ?>"><?= $realisateur["reali"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<p>Ajouter un nouveau realisateur : </p>

<form action=index.php?action=addRealisateur method="post">
    <input type="text" name="prenom" maxlength="50" placeholder="prenom">
    <input type="text" name="nom" maxlength="50" placeholder="nom">
    <div class="formInput">
        <label for="photo" name="photo" id="photo">Photo </label>
            <input type="url" name="photo" id="photo" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="submit" value="Ajouter">

    <?php

    $titre = "Liste des realisateurs";
    $titre_secondaire = "Liste des realisateurs";
    $contenu = ob_get_clean();
    require "view/template.php";
