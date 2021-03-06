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
     * select d'une cat via un id
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
    /**
     * modif d'une cat / ajout si n'existe pas
     * @param categorie_metier $cm
     */
    public function setCategory(categorie_metier $cm) {
        if ($cm->id != 0) {
            $categorie = $this->PDO->prepare("UPDATE category SET cat_name=:n, cat_parent=:p WHERE cat_id=:a");
            $categorie->execute(array(':a' => $cm->id, ':n' => $cm->nom, ':p' => $cm->parentCategory));
            $this->Category_Liste[$cm->id] = $cm;
        } else {
            $categorie = $this->PDO->prepare("INSERT INTO category (cat_name,cat_parent) VALUES (:n,:p) WHERE cat_id=:a");
            $categorie->execute(array(':a' => $cm->id, ':n' => $cm->nom, ':p' => $cm->parentCategory));
            $this->Category_Liste[$cm->id] = $cm;
        }
    }
    /**
     * delete d'une cat -> update, la cat ne doit pas etre supprimée dans la BD
     * @param type $id
     * @return string
     */
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
