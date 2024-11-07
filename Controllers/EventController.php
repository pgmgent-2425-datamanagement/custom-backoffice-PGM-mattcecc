<?php

namespace App\Controllers;

use Event;
use User;

class EventController extends BaseController {

    public static function list () {

        $search = $_GET['search'] ?? '';
        //print_r($search);

        $events = Event::allEventsAndUsers($search);
        //print_r($events[0]);

        self::loadView('/events', [
            'title' => 'Events',
            'events' => $events,
            'search' => $search
        ]);
    }

    public static function delete ($id) {
        $events = Event::deleteById($id);
        self::redirect('/events');
    }
 
    public static function detail ($id) {
        $event = Event::findWithUser($id);
        //print_r($event);
        
        self::loadView('/event', [
            'event' => $event,
            
        ]);
       
    }

    public static function add () {
        $users = User::all();

        self::loadView('/form',[
            'users' => $users,
        ]
    );
    }

    public static function save () {
        // print_r($_POST);

        $name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $to_folder = BASE_DIR . '/public/images/';
        $uuid = uniqid() . '-' . $name;

        move_uploaded_file($tmp, $to_folder . $uuid);

        $event = new Event();
        $event->title = $_POST['title'];
        $event->location = $_POST['location'];
        $event->datum = $_POST['datum'];
        $event->image = $uuid;
        $event->organisator_id = $_POST['organisator_id'];
        $success = $event->save();
        //print_r($event);

        if ($success) {
            self::redirect('/events');
        } else {
            echo 'Er is iets misgegaan';
        }
        
    }

    public static function edit ($id) {
        $event = Event::find($id);
        self::loadView('/edit', [
            'event' => $event,
            'users' => User::all(),
        ]);
    }

    public static function update ($id) {
        $event = Event::find($id);
        $event->title = $_POST['title'];
        $event->location = $_POST['location'];
        $event->datum = $_POST['datum'];
        var_dump($_FILES);
        if ($_FILES['image']['tmp_name']) {
            $name = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $to_folder = BASE_DIR . '/public/images/';
            $uuid = uniqid() . '-' . $name;
            move_uploaded_file($tmp, $to_folder . $uuid);
            $event->image = $uuid;
        }
        $event->organisator_id = $_POST['organisator_id'];
        $success = $event->edit($id);
        if ($success) {
            self::redirect('/events');
        } else {
            echo 'Er is iets misgegaan';
        }
    }
}  