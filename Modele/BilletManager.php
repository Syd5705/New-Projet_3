<?php

require_once 'Modele/Modele.php';
require_once 'Entites/Billet.php';


class BilletManager extends Modele {

    /** Renvoie la liste des billets du blog
     * 
     * return PDOStatement La liste des billets
     */
    public function getBillets() {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' order by BIL_ID desc';
        $statement = $this->executerRequete($sql);
        $billets=array();

        foreach ($statement->fetchAll() as $ligne) {
            $billet=new Billet();   /** on instancie un objet de la classe billet */
            $billet->id=$ligne['id'];
            $billet->date=$ligne['date'];
            $billet->titre=$ligne['titre'];
            $billet->contenu=$ligne['contenu'];

            $billets[]=$billet;  /** on stock l'instance $billet */
        }

        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * param int $id L'identifiant du billet
     * return array Le billet
     * throws Exception Si l'identifiant du billet est inconnu
     */
    public function getBillet($idBillet) 
    {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'  // la concaténation sert à ne pas mettre à la ligne
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }

    public function enregistrerBillet($titre, $contenu, $idBillet)
    {
    $sql = 'update T_BILLET SET BIL_TITRE = :BIL_TITRE, BIL_CONTENU = :BIL_CONTENU WHERE BIL_ID = :BIL_ID';
                                  // avec update on met "set" et non "value"
        $this->executerRequete($sql, array(':BIL_TITRE' => $titre, ':BIL_CONTENU' => $contenu, ':BIL_ID' => $idBillet));  // pour dissocier la variable de la table et celle qu'on passe en parametre
    }
    
    public function SupprimerBillet($idBillet)
    {
    $sql = 'delete FROM T_BILLET WHERE BIL_ID = :BIL_ID';
                
      $this->executerRequete($sql, array(':BIL_ID' => $idBillet));  // Va supprimer toute la ligne avec l'id qu'on a passé en parametre car l'ID est une clé primaire          
               
    }

    public function CreationBillet($titre, $contenu, $idBillet)
    {
     $sql = 'insert into T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_ID VALUES(BIL_TITRE, BIL_CONTENU, BIL_ID)';
     $this->executerRequete($sql, array(':BIL_TITRE' => $titre, ':BIL_CONTENU' => $contenu, ':BIL_ID' => $idBillet));  
    }


 // $sql = 'insert into T_BILLET (BIL_TITRE, BIL_CONTENU, BIL_ID VALUES(:BIL_TITRE, BIL_CONTENU, BIL_ID)'; ce que j'avais à la base
 // $sql = 'insert into T_BILLET SET BIL_TITRE = :BIL_TITRE, BIL_CONTENU = :BIL_CONTENU, BIL_ID = :BIL_ID'; essai 1

 public function getCommentaires($idCommentaire, $auteur, $contenu, $date) 
    {
        $sql = 'select COM_ID as id, COM_DATE as date,'
                . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'  // la concaténation sert à ne pas mettre à la ligne
                . ' where COM_ID=?';
        $Commentaire = $this->executerRequete($sql, array($idCommentaire, $auteur, $contenu, $date));
        if ($Commentaire->rowCount() > 0)
            return $Commentaire->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun Commentaire ne correspond à l'identifiant '$idCommentaire'");
    }


}

