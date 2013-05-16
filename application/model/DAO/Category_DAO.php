<?php

/**
 * Description of Category_DAO
 * 
 * liste des categories 
 *
 * @author Jerome
 */
class Category_DAO
{

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
    public function getCategoryList()
    {
        $sql = 'Select cat_id as id, cat_name as nom, cat_parent as parent, cat_deleted as suppression from category';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row)
        {
            $this->Category_Liste[$row["id"]] = new categorie_metier($row['id'], $row['nom'], $row['parent']);
        }
        return $this->Category_Liste;
    }

    /**
     * Crée un objet Categorie metier à partir de l'id passée. 
     * @param type $id
     * @return type
     */

    public function getCategoryById($id) {
        if (!isset($this->Category_liste[$id])) {

            $query = '
                    SELECT *
                    FROM category
                    WHERE cat_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->Category_liste[$id] = new Categorie_metier($row['cat_id'], $row['cat_name'], $row['cat_parent'], $row['cat_deleted']);
        }
        return $this->Category_liste[$id];
    }

    public function setCategory(categorie_metier $cm) {
        if ($cm->id != 0) {
            $categorie = $this->PDO->prepare("UPDATE category SET can_name=:n, can_parent=:p, cat_deleted=:d WHERE cat_id=:a");
            $categorie->execute(array(':a' => $cm->id, ':n' => $cm->name, ':p' => $cm->parent, ':d' => $cm->deleted));
            $this->Category_Liste[$cm->id] = $cm;
        } else {
            $categorie = $this->PDO->prepare("INSERT INTO category (cat_name,cat_parent,cat_deleted) VALUES (:n,:p,:d,:s) WHERE cat_id=:a");
            $categorie->execute(array(':a' => $cm->id, ':n' => $cm->name, ':p' => $cm->parent, ':d' => $cm->deleted));
            $this->Category_Liste[$cm->id] = $cm;
        }
    }
    
    public function deleteCategory ($id){
         if(isset ($this->Category_Liste[$id])){
             unset($this->Category_Liste[$id]);
         }
         else{
             return "La catégorie n'existe pas, pécore ! encore un coup de Ralph ca !";
         }
         $categorie=$this->PDO->prepare("UPDATE category SET cat_deleted=1 WHERE cat_id=:a" );
         $categorie->execute(array(':a'=>$id));
    }
            

}

?>
