<?php

use App\Models\BaseModel;

class Event extends BaseModel
{
    protected function allEventsAndUsers($search = '')
    {

        global $db;
        $sql = 'SELECT events.*, users.naam FROM events inner join users ON events.organisator_id = users.id 
                WHERE title LIKE :search OR location LIKE :search OR datum LIKE :search OR naam LIKE :search';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(['search' => '%' . $search . '%']);

        $db_items = $pdo_statement->fetchAll();

        return self::castToModel($db_items);
    }

    public function save(){
        $sql = "INSERT INTO events (title, location, datum, organisator_id ) VALUES (:title, :location, :datum ,:organisator_id)"; 
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':location' => $this->location,
            ':datum' => $this->datum,
            ':organisator_id' => 1,
        ]);
        return $success;
        }
        
        public function edit($id){
            $sql = "UPDATE events SET title = :title, location = :location, datum = :datum WHERE id = :id";
            $pdo_statement = $this->db->prepare($sql);
            $success = $pdo_statement->execute([
                ':title' => $this->title,
                ':location' => $this->location,
                ':datum' => $this->datum,
                ':id' => $id
            ]);
            return $success;
        }
}
