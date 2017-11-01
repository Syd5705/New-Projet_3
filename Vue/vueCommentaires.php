
<?php $this->titre = "Jean Forteroche" . $commentaire['titre']; ?>

<article>
    <header>
        <h1 class="titreCommentaire"><?= $commentaire['titre'] ?></h1>
        <time><?= $commentaire['date'] ?></time>
    </header>
    <p><?= $commentaire['contenu'] ?></p>  <!-- on va retrouver le contenu dans le gabarit. tout entre ligne 1 et 32 va se retrouver dans le gabarit (l'ensemble du fichier)-->
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $commentaire['titre'] ?></h1>
</header>

<?php foreach ($commentaires as $commentaire): ?>   <!-- foreach parce que commentaire est un pdo statement  (le modele le retourne comme ça -> se comporte comme un array)-->

    <p>Le <?= $commentaire['date'] ?></p>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />

