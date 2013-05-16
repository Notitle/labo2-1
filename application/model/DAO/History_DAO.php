<?php

class History_DAO
{

    private $dao;
    private $History_liste = array();

    public function __construct(MyPDO_DAO $mpdo)
    {
        $this->pdo = $mpdo;
    }

    public function getHistoryList()
    {
        $sql = 'SELECT his_id, his_task_fk, his_time, his_description, his_comment, 
            his_state, his_user_fk, his_blocking_fk FROM history';
        $result = $this->pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($result as $key => $row)
        {
            if (!isset($this->History_liste[$row['his_id']]))
            {
                $this->History_liste[$row['his_id']] = new History_metier();
                $this->History_liste[$row['his_id']]->rempli($row['his_id'], $row['his_task_fk'], $row['his_time'], $row['his_description'], $row['his_comment'], $row['his_state'], $row['his_user_fk'], $row['his_blocking_fk']);
            }
        }
        return $this->History_liste;
    }

    /**
     * Retourne le tableau d'history_metiers liés à la tache
     * @param Task_metier $task_id
     * @return Array
     */
    public function getHistoryByTask(Task_metier $task)
    {
        $query = '
            SELECT 
                his_id,
                his_task_fk,
                his_time,
                his_description,
                his_comment, 
                his_state,
                his_user_fk,
                his_blocking_fk
            FROM
                history 
            WHERE
                his_task_fk = :a
            ORDER BY
                his_time DESC
                ';
        $result = $this->pdo->prepare($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute(array(":a" => $task->getId()));
        $return = array();
        foreach ($result as $key => $row)
        {
            if (!isset($this->History_liste[$row["his_id"]]))
            {
                $this->History_liste[$row['his_id']] = new History_metier();
                $this->History_liste[$row['his_id']]->rempli($row['his_id'], $row['his_task_fk'], $row['his_time'], $row['his_description'], $row['his_comment'], $row['his_state'], $row['his_user_fk'], $row['his_blocking_fk']);
            }
            $return[] = $this->History_liste[$row["his_id"]];
        }
        return $return;
    }

    public function getHistoryById($id)
    {
        if (!isset($this->History_liste[$id]))
        {

            $query = '
                    SELECT *
                    FROM history
                    WHERE his_id = :a';
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(":a" => $id));
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            $this->History_liste[$row['his_id']] = new History_metier();
            $this->History_liste[$row['his_id']]->rempli($row['his_id'], $row['his_task_fk'], $row['his_time'], $row['his_description'], $row['his_comment'], $row['his_state'], $row['his_user_fk'], $row['his_blocking_fk']);
        }
        return $this->History_liste[$id];
    }

}
?>


