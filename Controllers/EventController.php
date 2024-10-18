<?php

namespace App\Controllers;

use Event;

class EventController extends BaseController {

    public static function list () {

        $search = $_GET['search'] ?? '';
        //print_r($search);

        $events = Event::allEventsAndUsers($search);
        //print_r($events);

        
        

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
        $event = Event::find($id);
        
        self::loadView('/event', [
            
            'event' => $event
        ]);
    }

    public static function add () {
        self::loadView('/form');
    }

    public static function save () {
        // print_r($_POST);
        $event = new Event();
        $event->title = $_POST['title'];
        $event->location = $_POST['location'];
        $event->datum = $_POST['datum'];
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
            'event' => $event
        ]);
    }

    public static function update ($id) {
        $event = Event::find($id);
        $event->title = $_POST['title'];
        $event->location = $_POST['location'];
        $event->datum = $_POST['datum'];
        $success = $event->edit($id);
        if ($success) {
            self::redirect('/events');
        } else {
            echo 'Er is iets misgegaan';
        }
    }
}  