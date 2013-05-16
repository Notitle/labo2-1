<?php

/**
 * Description of Phase_DAO
 *
 * @author sarah
 */
class Phase_DAO {

    /**
     *
     * @var tableau des phases $phase_liste
     */
    private $dao;
    private $phase_liste = array();

    public function __construct(MyPDO_DAO $mpdo) {
        $this->pdo = $mpdo;
    }

    /**
     * requete de sélection des phases
     * @return tableau des phases
     */
    public function getPhaseList() {
        $sql = 'SELECT * FROM phase';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($stmt as $key => $row) {
            $this->phase_liste[$row['pha_id']] = new Phase_metier
                    ($row['pha_id'], $row['pha_name'], $row['pha_project_fk']);
        }
        return $this->phase_liste;
    }

    public function getPhaseById($id) {
        if (!isset($this->phase_liste[$id])) {

            $query = '
                    SELECT *
                    FROM phase
                    WHERE pha_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->phase_liste[$id] = new Phase_metier($row['pha_id'], $row['pha_name'], $row['pha_project_fk']);
        }
        return $this->phase_liste[$id];
    }
    
    public function setPhase(Phase_metier $pm){
        if ($pm->id != 0) {
            $phase = $this->PDO->prepare("UPDATE phase SET pha_name = :b, pha_project_fk = :c WHERE pha_id = :a");
            $phase->execute(array(':a' => $pm->id, ':b' => $pm->name,':c' => $pm->project_fk));
            $this->phase_liste[$pm->$id] = $pm;
        }
        
        else{
            $phase = $this->PDO->prepare("INSERT INTO phase (pha_name, pha_project_fk) VALUES (:b, :c) WHERE pha_id = :a");
            $phase->execute(array(':a' => $pm->id, ':b' => $pm->name,':c' => $pm->project_fk));
            $this->phase_liste[$pm->$id] = $pm;
        }
    }
    
    public function deletePhase ($id){
         if(isset ($this->phase_liste[$id])){
             unset($this->phase_liste[$id]);
         }
         else{
             return "La phase n'existe pas, Nom d'un chien ! Le capitaine Jérôme a encore bu trop de Whisky !!!!!!!!!!!!!!!!!! !";
         }
         $phase=$this->PDO->prepare("DELETE FROM phase WHERE cat_id=:a" );
         $phase->execute(array(':a'=>$id));
    }
    
    public function getPhaseByProject($project){
        
    }

}
?>

