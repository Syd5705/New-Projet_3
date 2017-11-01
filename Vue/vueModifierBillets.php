	<form method="post" action="">
	<fieldset>
	
	<?php $this->titre = "Jean Forteroche"; ?>

<?php foreach ($billets as $billet):   ?>
    <tr>
        
           <td> <a href="<?= "index.php?action=billet&id=" . $billet->id ?>">
                <h1 class="titreBillet"><?= $billet->titre ?></h1> </a></td>
           <td> <time><?= $billet->date ?></time></td>
      
       	   <td> <p><?= $billet->contenu ?></p></td>
       	   
   </tr>
    
    <hr />
<?php endforeach; ?>

// remettre fonction MODIFIER BILLETS
