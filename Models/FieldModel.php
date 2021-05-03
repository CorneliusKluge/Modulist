<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;

class FieldModel {
    static function isFieldByName($name) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT id FROM fields WHERE name = '$name'";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
    static function addField($name, $nameEN, $courseID) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);
        $courseID = mysqli_real_escape_string($db, $courseID);

        if(empty($nameEN)) {
            $insert = "INSERT INTO fields (name, nameEN, courseID) VALUES ('$name', NULL, $courseID)";
        }
        else {
            $insert = "INSERT INTO fields (name, nameEN, courseID) VALUES ('$name', '$nameEN', $courseID)";
        }

        $result = mysqli_query($db, $insert);

        return $result;
    }
}