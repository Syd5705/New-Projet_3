<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Contenu/teststyle.css" />
       <!-- <title><?= $titre ?></title> -->
        <title>Jean Forteroche</title>
        <link rel="icon" type="image/x-icon" href="Contenu\images/favi.ico" />

    </head>
    <body>
       
            <header>
                                    
               
                     <h1><div id="#titre_principal"> Bienvenue sur mon blog !</div></h1>    
                   <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?action=Quisuisje">Qui suis-je ?</a></li>
                        <li><a href="index.php?action=chapitres">Les Chapitres</a></li>

                      <?php
                        if(!isset($_COOKIE["PHPSESSID"]))
                        {
                            session_start();
                        }
                        
                         if (isset($_SESSION) && $_SESSION['admin'])  // vérification de la variable admin qui existe si MDP correct et si variable session existe
                         { 
                             echo '<li><a href="index.php?action=Admin">Admin</a></li>';

                         }                        
                                         
                        ?>
       
                        
                    </ul>
                </nav>
                
            </header>


            <div id="contenu">
                <?= $contenu ?>
            </div>  
            <footer>
            <div id="Administration">
                <a href="index.php?action=Connexion"><FONT COLOR="#f4c141">Espace Administrateur</FONT></a>
                </div>

            </footer>
        </div> 
    </body>
</html>

