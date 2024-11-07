<?php

namespace App\Controllers;

use Home;

class HomeController extends BaseController {

    public static function index () {

        $table = Home::table();

        self::loadView('/home', [
            'title' => 'Homepage',
            'table'=> $table
        ]);
    }

}