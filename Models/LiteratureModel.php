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
        // $ID, 
        $authors, 
        $title, 
        $releaseDate, 
        $edition,
        $releasePlace, 
        $publisher, 
        $isbn
    ) {
        $db = DatabaseService::getDatabaseObject();

        // $ID = mysqli_real_escape_string($db, $ID);
        $authors = mysqli_real_escape_string($db, $authors);
        $title = mysqli_real_escape_string($db, $title);
        $releaseDate = mysqli_real_escape_string($db, $releaseDate);
        $edition = mysqli_real_escape_string($db, $edition);
        $releasePlace = mysqli_real_escape_string($db, $releasePlace);
        $publisher = mysqli_real_escape_string($db, $publisher);
        $isbn = mysqli_real_escape_string($db, $isbn);

        if(empty($releaseDate)) {
            $releaseDate = "NULL";
        }
        $insert = "INSERT INTO literature (ID, authors, title, releaseDate, edition, releasePlace, publisher, isbn) VALUES (
            -- '$ ID',
            '$authors', '$title', $releaseDate, NULLIF('$edition', ''), NULLIF('$releasePlace', ''), NULLIF('$publisher', ''), NULLIF('$isbn', '')
        )";
    
        $result = mysqli_query($db, $insert);

        return $result;
    }

    static function getLiteratureByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM literature WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result =  mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }

        return $result;
    }

    static function changeLiterature($ID, $authors, $title, $releaseDate, $edition, $releasePlace, $publisher, $isbn){
        $db = DatabaseService::getDatabaseObject();

        $ID = mysqli_real_escape_string($db, $ID);
        $authors = mysqli_real_escape_string($db, $authors);
        $title = mysqli_real_escape_string($db, $title);
        $releaseDate = mysqli_real_escape_string($db, $releaseDate);
        $edition = mysqli_real_escape_string($db, $edition);
        $releasePlace = mysqli_real_escape_string($db, $releasePlace);
        $publisher = mysqli_real_escape_string($db, $publisher);
        $isbn = mysqli_real_escape_string($db, $isbn);

        if(empty($releaseDate)) {
            $releaseDate = "NULL";
        }
        $update = "UPDATE literature SET 
            authors = '$authors',
            title = '$title',
            releaseDate = $releaseDate,
            edition = NULLIF('$edition', ''),
            releasePlace = NULLIF('$releasePlace', ''),
            publisher = NULLIF('$publisher', ''),
            isbn = NULLIF('$isbn', '')
        WHERE id = $ID";
    
        $result = mysqli_query($db, $update);
        
        return $result;

    }

    static function deleteLiterature($id){
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM literature WHERE id = $id";
        $result = mysqli_query($db, $query);

        return $result;
    }

}