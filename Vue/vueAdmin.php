<?php $this->titre = "Jean Forteroche"; ?>

<ul>
                        <li><a href="index.php?action=Billets">Articles</a></li>
                        <li><a href="index.php?action=Commentaires">Commentaires</a></li>
                                               
 </ul>
 

<table>
 
<?php foreach ($billets as $billet):   ?>

    <tr>		 
        
            <td><a href="<?= "index.php?action=billet&id=" . $billet->id ?>">
            <h1 class="titreBillet"><?= $billet->titre ?></h1>
            </a></td>

            <td><time><?= $billet->date ?></time></td>
      
        	<td><p><?= substr($billet->contenu, 0, 30)?>...</p></td>
        	<td><div id="modifier"><a href="index.php?action=ModifierBillets"><FONT COLOR="#f4c141">Modifier</FONT></a></div><a href="index.php?action=SupprimerBillets">Supprimer</a></td> 	

        	<!--  créer une nouvelle vue pour modifier -> comme pour afficher le billet ou supprimer -> afficher un pop-up 'voulez-vous vraiment supprimer cet article ?' -->
    </tr>
    
   


 <?php endforeach; ?> 
</table>


