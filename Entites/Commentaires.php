<?php

require_once 'Modele/Modele.php';



class Commentaires extends Modele 
{

    /** Renvoie la liste des billets du blog
     * 
     * return PDOStatement La liste des billets
     */
    public function getCommentaires() 
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' order by COM_ID desc';
        $Commentaires = $this->executerRequete($sql);
       
        return $Commentaires;
    }

    /** Renvoie les informations sur un commentaire
     * 
     * param int $id L'identifiant du commentaire
     * return array Le commentaire
     * throws Exception Si l'identifiant du commentaire est inconnu
     */
   
}