<?php
/**
 * Description of Project_DAO
 *
 * @author sarah
 */
class Projects_DAO {

    /**
     *
     * @var tableau des projets $project_liste
     */
    private $dao;
    private $project_liste = array();

    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
    }

    /**
     * requete de sélection des projets--
     * @return tableau de projets
     */
    public function getProjectList() {
        $sql = 'SELECT * FROM project';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row) {
            $this->project_liste[$row["pro_id"]] = new Project_metier
                    ($row["pro_id"], $row["pro_name"], $row["pro_category_fk"], $row["pro_deleted"]);
        }
        return $this->project_liste;
    }
    
        public function getProjectById($id) {
        if (!isset($this->project_liste[$id])) {

            $query = '
                    SELECT *
                    FROM project
                    WHERE pro_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->project_liste[$id] = new Projet_metier
                    ($row["pro_id"], $row["pro_name"], $row["pro_category_fk"], $row["pro_deleted"]);
        }
        return $this->project_liste[$id];
    }

    //update projet
    public function setPoject(Projet_metier $pm){
        if ($pm->id != 0) {
            $project = $this->PDO->prepare("UPDATE project SET pro_name = :b, pro_categorie_fk = :c WHERE pro_id = :a");
            $project->execute(array(':a' => $pm->id, ':b' => $pm->name,':c' => $pm->parentCategory));
            $this->project_liste[$pm->$id] = $pm;
        }
        
        else{
            $project = $this->PDO->prepare("INSERT INTO project (pro_name, pro_categorie_fk) VALUES (:b, :c) WHERE pro_id = :a");
            $project->execute(array(':a' => $pm->id, ':b' => $pm->name,':c' => $pm->parentCategory));
            $this->project_liste[$pm->$id] = $pm;
        }
    }
}
?>
