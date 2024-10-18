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
        $sql = "INSERT INTO events (title, location ) VALUES (:title, :location)"; 
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':location' => $this->location,
        ]);
        return $success;
        }
        
}
