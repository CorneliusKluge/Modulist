<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class LiteratureModel {
    static function getAllLiterature() {
        $db = DatabaseService::getDatabaseObject();

        $query = "SELECT * FROM literature"; 
        $result = mysqli_query($db, $query);

        return $result;
    }
    
    static function addLiterature(
        $authors, 
        $title, 
        $year, 
        $edition,
        $place, 
        $publisher, 
        $isbn
    ) {
        $db = DatabaseService::getDatabaseObject();

        $authors = mysqli_real_escape_string($db, $authors);
        $title = mysqli_real_escape_string($db, $title);
        $year = mysqli_real_escape_string($db, $year);
        $edition = mysqli_real_escape_string($db, $edition);
        $place = mysqli_real_escape_string($db, $place);
        $publisher = mysqli_real_escape_string($db, $publisher);
        $isbn = mysqli_real_escape_string($db, $isbn);

        if(empty($year)) {
            $year = "NULL";
        }
        $insert = "INSERT INTO literature (authors, year, title, edition, place, publisher, isbn) VALUES (
            '$authors', $year, '$title', NULLIF('$edition', ''), NULLIF('$place', ''), NULLIF('$publisher', ''), NULLIF('$isbn', '')
        )";
    
        $result = mysqli_query($db, $insert);

        return $result;
    }

    static function getLiteratureByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM literature WHERE ID = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result =  mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }

        return $result;
    }

    static function changeLiterature($id, $authors, $title, $year, $edition, $place, $publisher, $isbn){
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $authors = mysqli_real_escape_string($db, $authors);
        $title = mysqli_real_escape_string($db, $title);
        $year = mysqli_real_escape_string($db, $year);
        $edition = mysqli_real_escape_string($db, $edition);
        $place = mysqli_real_escape_string($db, $place);
        $publisher = mysqli_real_escape_string($db, $publisher);
        $isbn = mysqli_real_escape_string($db, $isbn);

        if(empty($year)) {
            $year = "NULL";
        }
        $update = "UPDATE literature SET 
            authors = '$authors',
            year = $year,
            title = '$title',
            edition = NULLIF('$edition', ''),
            place = NULLIF('$place', ''),
            publisher = NULLIF('$publisher', ''),
            isbn = NULLIF('$isbn', '')
        WHERE ID = $id";
    
        $result = mysqli_query($db, $update);
        var_dump($result);

        return $result;

    }

    static function deleteLiterature($id){
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM literature WHERE ID = $id";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getBasicLiteratureByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT t1.* FROM literature AS t1 JOIN module_literature_mm AS t2 ON t1.id = t2.literatureID WHERE t2.moduleID = $moduleID AND t2.basicLiteratureFlag = true";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getDeepeningLiteratureByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT t1.* FROM literature AS t1 JOIN module_literature_mm AS t2 ON t1.id = t2.literatureID WHERE t2.moduleID = $moduleID AND t2.basicLiteratureFlag = false";
        $result = mysqli_query($db, $query);

        return $result;
    }
}