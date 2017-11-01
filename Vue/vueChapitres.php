<?php $this->titre = "Jean Forteroche"; ?>

<?php foreach ($billets as $billet):   ?>
    <article>
        
            <a href="<?= "index.php?action=billet&id=" . $billet->id ?>">
                <h1 class="titreBillet"><?= $billet->titre ?></h1>
            </a>
            <time><?= $billet->date ?></time>
      
        <p><?= $billet->contenu ?></p>
    </article>
    
    <hr />
<?php endforeach; ?>
