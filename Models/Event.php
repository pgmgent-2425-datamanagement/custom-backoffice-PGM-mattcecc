<?php

use App\Models\BaseModel;

class Event extends BaseModel
{
    protected function allEventsAndUsers($search = '')
    {
        global $db;
        $sql = 'SELECT events.*, users.naam FROM events INNER JOIN users ON events.organisator_id = users.id 
                WHERE title LIKE :search OR location LIKE :search OR datum LIKE :search OR naam LIKE :search';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(['search' => '%' . $search . '%']);

        $db_items = $pdo_statement->fetchAll();

        

        return self::castToModel($db_items);
    }

    protected function findWithUser($id)
    {
        
        global $db;
        $sql = 'SELECT events.*, users.naam FROM events INNER JOIN users ON events.organisator_id = users.id WHERE events.id = :id';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(['id' => $id]);

        $db_items = $pdo_statement->fetch();

        return self::castToModel($db_items);
    }

    public function save(){
        $sql = "INSERT INTO events (title, location, datum, organisator_id, image ) VALUES (:title, :location, :datum ,:organisator_id, :image)"; 
        
        $pdo_statement = $this->db->prepare($sql);
        $success = $pdo_statement->execute([
            ':title' => $this->title,
            ':location' => $this->location,
            ':datum' => $this->datum,
            ':image' => $this->image,
            ':organisator_id' => $this->organisator_id,
        ]);
        return $success;
        }
        
        public function edit($id){
            $sql = "UPDATE events SET title = :title, location = :location, datum = :datum, image = :image, organisator_id = :organisator_id WHERE id = :id";
            $pdo_statement = $this->db->prepare($sql);
            $success = $pdo_statement->execute([
                ':title' => $this->title,
                ':location' => $this->location,
                ':datum' => $this->datum,
                ':image' => $this->image,
                ':organisator_id' => $this->organisator_id,
                ':id' => $id
            ]);
            return $success;
        }
        
}
