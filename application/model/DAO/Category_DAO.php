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
    public function getCategoryList() {
        $sql = 'Select cat_id as id, cat_name as nom, cat_parent as parent, cat_deleted as suppression from category';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row) {
            $this->Category_Liste[$row["id"]] = new categorie_metier($row['id'], $row['nom'], $row['parent'], $row['suppression']);
        }
        return $this->Category_Liste;
    }
    
        public function getCategoryById($id) {
        if (!isset($this->Category_liste[$id])) {

            $query = '
                    SELECT *
                    FROM phase
                    WHERE cat_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->Category_liste[$id] = new categorie_metier($row['cat_id'], $row['cat_name'], $row['cat_parent'], $row['cat_deleted']);
        }
        return $this->Category_liste[$id];
    }

}

?>
