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
    public function getCommentaires($idBillet) 
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
                . ' where COM_ID=?';
        $Commentaire = $this->executerRequete($sql, array($idCommentaire));
        if ($Commentaire->rowCount() > 0)
            return $Commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCommentaire'");
    }

}