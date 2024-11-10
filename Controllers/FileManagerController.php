<?php 

namespace App\Controllers;

class FileManagerController extends BaseController {

    public static function list ($folder='') {

        $list=scandir(BASE_DIR . '/public/images/'. $folder);
        //print_r($list);

        self::loadView('/filemanager/list', [
            'list' => $list

        ]);
    }

    public static function delete ($filename) {
        $filePath = BASE_DIR . '/public/images/' . $filename;
        
        if (file_exists($filePath)) {
            unlink($filePath);
            self::redirect('/filemanager');
        } else {
            // Handle the error, file does not exist
            echo 'Er is iets misgegaan';
        }
    }
}