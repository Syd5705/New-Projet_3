<?php

require_once 'Modele/Modele.php';

class CommentaireManager extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet) {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where BIL_ID=?';
        $commentaires = $this->executerRequete($sql, array($idBillet));
        return $commentaires;
    }

    // Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $idBillet, $date) {
        $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID)'
            . ' values(?, ?, ?, ?)';
        $date = date("Y-m-d H:i:s");  // Récupère la date courante
        $this->executerRequete($sql, array($auteur, $contenu, $idBillet, $date));
    }

    // Affiche tous les commentaires --------------------------------------------------------NE FCT PAS
   // public function listerCommentaires()
   // {
  //       $sql = 'select COM_ID as id, COM_DATE as date,'
  //              . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE';
  //      $commentaires = $this->executerRequete($sql, array());
  //      return $commentaires;
  //  }


}

