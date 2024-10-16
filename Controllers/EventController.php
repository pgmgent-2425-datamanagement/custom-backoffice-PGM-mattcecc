<?php

namespace App\Controllers;

use Event;

class EventController extends BaseController {

    public static function list () {

        $events = Event::all();

        //print_r($events);

        self::loadView('/events', [
            'title' => 'Events',
            'events' => $events
        ]);
    }
}  