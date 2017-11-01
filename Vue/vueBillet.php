<!-- on vient de créer la vue grâce au controleurbillet --> 


<?php $this->titre = "Jean Forteroche" . $billet['titre']; ?>

<article>
    <header>
        <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
        <time><?= $billet['date'] ?></time>
    </header>
    <p><?= $billet['contenu'] ?></p>  <!-- on va retrouver le contenu dans le gabarit. tout entre ligne 1 et 32 va se retrouver dans le gabarit (l'ensemble du fichier)-->
</article>
<hr />
<header>
    <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>   <!-- foreach parce que commentaire est un pdo statement  (le modele le retourne comme ça -> se comporte comme un array)-->

    <p>Le <?= $commentaire['date'] ?></p>
    <p><?= $commentaire['auteur'] ?> dit :</p>
    <p><?= $commentaire['contenu'] ?></p>
<?php endforeach; ?>
<hr />
<form method="post" action="index.php?action=commenter">
    <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo" 
           required /><br />
    <textarea id="txtCommentaire" name="contenu" rows="4" 
              placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
    <input type="submit" value="Commenter" />
</form>

