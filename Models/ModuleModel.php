<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;

class ModuleModel {
    static function getAllModules() {
        $db = DatabaseService::getDatabaseObject();

        $query = "SELECT * FROM modules";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getModuleByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM modules WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else {
            $result = false;
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