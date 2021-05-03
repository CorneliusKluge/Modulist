<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;

class ModuleModel {
    static function getAllModules() {
        $db = DatabaseService::getDatabaseObject(); // Get the database object which contains login information to access the database

        $query = "SELECT * FROM modules"; // A SQL query
        $result = mysqli_query($db, $query); // Run the sql query and save the result in the variable $result

        return $result; // Return the result
    }
    static function getModuleByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id); // Mask the data to prevent sql injection

        $query = "SELECT * FROM modules WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) { // Check if there are data records (in this case: if there is a module with the given id)
            $result = mysqli_fetch_object($result); // Convert the object into a normal php-object, so you can write e.g. $result->id to get the id of the current data record
        }
        else {
            $result = false; // Return false if there is are no data records (no module with the given id)
        }
        return $result;
    }
    static function getModuleByModuleCode($moduleCode) {
        $db = DatabaseService::getDatabaseObject();

        $moduleCode = mysqli_real_escape_string($db, $moduleCode);
        
        $query = "SELECT * FROM modules WHERE moduleCode = '$moduleCode'";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }
        return $result;
    }
}