<?php
/**
 * Description of Category_DAO
 * 
 * liste des categories 
 *
 * @author Jerome
 */
class Category_DAO {
    /**
     *
     * @var tableau des categories $Category_Liste 
     */
    private $Category_Liste = array();
    
    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
    }
    /**
     * requete de slection des cat
     * @return tableau de cat
     */
    public function getTaskList() {
        $sql = 'Select cat_id as id, cat_name as nom, cat_parent as parent, cat_deleted as suppression from category';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row) {
            $this->Category_Liste[$row["id"]] = new categorie_metier($row['id'], $row['nom'], $row['parent'], $row['suppression']);
        }
        return $this->Category_Liste;
    }

}

?>
