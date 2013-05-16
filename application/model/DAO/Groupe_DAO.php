<?php

/**
 * Description of Phase_DAO
 *
 * @author Rodo/sarah
 */
class Groupe_DAO {

    /**
     *
     * @var tableau des groupes Group_liste 
     */
    private $dao;
    private $Group_liste = array();

    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
    }
    /**
     * choppe la liste des groupes
     * @return type
     */
    public function getGroupList() {
        $sql = 'SELECT gro_id, gro_name FROM group';
        $result = $this->pdo->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $key => $row) {
            $this->Group_liste['gro_id'] = new Group_Metier($row['gro_id'], $row['gro_name']);
        }
        return $this->Group_liste;
    }
    /**
     * choppe un groupe via un id
     * @param type $id
     * @return type
     */
    public function getGroupById($id) {

        if (!isset($this->Group_liste[$id])) {

            $query = '
                    SELECT *
                    FROM group
                    WHERE gro_id = :a ';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC); //tableau associatif dna sla cariable $stmt
            $row = $stmt->fetch();
            $this->Group_liste[$id] = new Groupe_metier($row['gro_id'], $row['gro_name']);
        }
        return $this->Group_liste[$id];
    }
    /**
     * modif du groupe
     * @param Group_metier $gm
     */
    public function setGroup(Group_metier $gm) {
        if ($gm->id != 0) {
            $groupe = $this->PDO->prepare("UPDATE group SET gro_name=:n WHERE gro_id=:a");
            $groupe->execute(array(':a' => $gm->id, ':n' => $gm->name));
            $this->Group_liste[$gm->id] = $gm;
        } else {
            $groupe = $this->PDO->prepare("INSERT INTO category (cat_name,cat_parent,cat_deleted) VALUES (:n,:p,:d,:s) WHERE cat_id=:a");
            $groupe->execute(array(':a' => $gm->id, ':n' => $gm->name));
            $this->Group_liste[$gm->id] = $gm;
        }
    }
    /**
     * delete du groupe
     * @param type $id
     * @return string
     */
    public function deleteGroup($id) {
        if (isset($this->Group_liste[$id])) {
            unset($this->Group_liste[$id]);
        } else {
            return "le group n'existe pas";
        }
        $groupe = $this->PDO->prepare("DELETE * FROM grop WHERE gro_id=:a");
        $groupe->execute(array(':a' => $id));
    }

}

?>
