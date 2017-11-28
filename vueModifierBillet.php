  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', height : "480"});</script>

	
	<!-- <fieldset> sert à mettre un cadre autour -->

<article>
    
        

    <!--  <p><?= $billet['contenu'] ?></p> on va retrouver le contenu dans le gabarit. tout entre ligne 1 et 32 va se retrouver dans le gabarit (l'ensemble du fichier)-->

    <form method="post" action="index.php?action=enregistrerBillet">
    <input type='text' name='titre' value=<?=$billet['titre']?> class="titreBillet">
    <textarea id="txtBillet" name="contenu" rows="4" 
     required><?= $billet['contenu'] ?></textarea><br />
    <input type="hidden" name="id" value="<?= $billet['id'] ?>" />


    <input type="submit" value="Enregistrer" />
</form>
</article>




<!-- ??? On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=coursphp;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); -->