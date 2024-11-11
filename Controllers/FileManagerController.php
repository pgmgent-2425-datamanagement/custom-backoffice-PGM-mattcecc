<?php 

namespace App\Controllers;

class FileManagerController extends BaseController {

    public static function list($folder = '') {
        // Define the full directory path
        $directoryPath = BASE_DIR . '/public/images/' . $folder;

        $list = []; // Initialize an empty array for the file list

        // Check if the directory exists and is readable
        if (is_dir($directoryPath) && is_readable($directoryPath)) {
            // Get all items in the directory
            $allItems = scandir($directoryPath);

            // Filter only files, excluding '.' and '..'
            foreach ($allItems as $item) {
                $filePath = $directoryPath . '/' . $item;
                if ($item !== '.' && $item !== '..' && is_file($filePath)) {
                    $list[] = $item; // Add only files to the list
                }
            }
        } else {
            // Directory doesn't exist or is not accessible
            error_log("Directory not found or not accessible: " . $directoryPath);
        }

        // Load the view with the $list data
        self::loadView('/filemanager/list', [
            'list' => $list
        ]);
    }

    public static function delete($filename) {
        $filePath = BASE_DIR . '/public/images/' . $filename;
        
        // Check if the file exists and is indeed a file
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
            self::redirect('/filemanager');
        } else {
            // Handle the error: file does not exist or is not a valid file
            echo 'Er is iets misgegaan';
            error_log("Failed to delete: file does not exist or is not a valid file - " . $filePath);
        }
    }
}
