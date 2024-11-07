<?php

use App\Models\BaseModel;

class Home extends BaseModel{

    protected function table(){
        global $db;
        $sql= 'SELECT users.*, count(organisator_id) as userEvents
        FROM users INNER JOIN events on users.id = events.organisator_id
        group by organisator_id';

    $pdo_statement = $db->prepare($sql);  
    $pdo_statement->execute(); 
    $db_items = $pdo_statement->fetchAll(\PDO::FETCH_OBJ);
    return $db_items;
    }
    
}