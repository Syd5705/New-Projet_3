<?php

require_once 'Modele/Modele.php';
require_once 'Entites/Commentaires.php';

class CommentaireManager extends Modele 
{

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) 
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, SIGNALER as signaler from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $Commentaires = $this->executerRequete($sql, array($idBillet));
        return $Commentaires;
    }


     // Affiche tous les commentaires
    public function getAllCommentaires()
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu, SIGNALER as signaler from T_COMMENTAIRE';
                
        $statement = $this->executerRequete($sql, array());     
       // return $Commentaires;
        $commentaires=array();

        foreach ($statement->fetchAll() as $ligne) 
        { 
            
            $commentaire=new Commentaires();   /** on instancie un objet de la classe commentaire */
            $commentaire->id=$ligne['id'];       
            $commentaire->date=$ligne['date'];
            $commentaire->titre=$ligne['auteur'];
            $commentaire->contenu=$ligne['contenu'];
            $commentaire->signaler=$ligne['signaler'];

            $commentaires[]=$commentaire;  /** on stock l'instance $billet. billetS est un tableau regroupant tous les commentaires */
        }

        return $commentaires;
    }


    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet) 
    {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }


 public function SupprimerCommentaire($idCommentaire)
    {
    $sql = 'delete FROM T_COMMENTAIRE WHERE COM_ID = :COM_ID';
                
      $this->executerRequete($sql, array(':COM_ID' => $idCommentaire));  // Va supprimer toute la ligne avec l'id qu'on a passé en parametre car l'ID est une clé primaire          
               
    }

 public function SignalerCommentaire($idCommentaire)
    {
    $sql = "UPDATE T_COMMENTAIRE SET SIGNALER='1' WHERE COM_ID = :COM_ID";
                

         $this->executerRequete($sql, array(':COM_ID' => $idCommentaire));  // Va supprimer toute la ligne avec l'id qu'on a passé en parametre car l'ID est une clé primaire          
               
    }


}

