<?php foreach ($commentaires as $commentaires):   ?>
    <article>
        
            <a href="<?= "index.php?action=	ListeTousCommentaires" . $commentaire->id ?>">
                <h1 class="titreCommentaire"><?= $commentaire->titre ?></h1>
            </a>
            <time><?= $commentaire->date ?></time>
      
        <p><?= $commentaire->contenu ?></p>
    </article>
    
    <hr />
<?php endforeach; ?>
