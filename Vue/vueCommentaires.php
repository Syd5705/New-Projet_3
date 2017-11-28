
    <table>
    <?php foreach ($Commentaires as $commentaire):   ?>
        <tr>

            <td><a href="<?= "index.php?action=ListeTousCommentaires" . $commentaire->id ?>">
                <h3 class="titreCommentaire"><?= $commentaire->titre ?></h3>
                </a></td>
            <td><time><?= $commentaire->date ?></time></td>
            
      
            <td><p><?= $commentaire->contenu ?></p></td>
             <td><div id="modifier"><a href="<?= "index.php?action=SupprimerCommentaire&id=" . $commentaire->id ?>"><FONT COLOR="#f4c141">Supprimer</FONT></a></div></td>  
             <td><?php if ($commentaire->signaler == 1): ?> <img src="Contenu\images/triangle.png" class="img_triangle" alt="triangle" /><?php endif; ?></td>
            
 		</tr>
 		<?php endforeach; ?>
    </table>
    <div id="modifier"><a href="index.php?action=Admin"><FONT COLOR="#f4c141">Retour</FONT></a></div>
   
    <hr />



