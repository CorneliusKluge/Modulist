<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class LiteratureModel {
    static function getAllLiterature() {
        $db = DatabaseService::getDatabaseObject(); // Get the database object which contains login information to access the database

        $query = "SELECT * FROM literature"; // A SQL query
        $result = mysqli_query($db, $query); // Run the sql query and save the result in the variable $result

        return $result; // Return the result
    }
    
    static function addLiterature($ID, $authors, $title, $releaseDate, $edition, $releasePlace, $publisher, $isbn) {
        $db = DatabaseService::getDatabaseObject();

        $ID = mysqli_real_escape_string($db, $ID);
        $authors = mysqli_real_escape_string($db, $authors);
        $title = mysqli_real_escape_string($db, $title);
        $releaseDate = mysqli_real_escape_string($db, $releaseDate);
        $edition = mysqli_real_escape_string($db, $edition);
        $releasePlace = mysqli_real_escape_string($db, $releasePlace);
        $publisher = mysqli_real_escape_string($db, $publisher);
        $isbn = mysqli_real_escape_string($db, $isbn);


    // repeat for every variable:
        if(empty($releaseDate)) {
            $releaseDate = "NULL";
        }
        $insert = "INSERT INTO literature (ID, authors, title, releaseDate, edition, releasePlace, publisher, isbn) VALUES (
            '$ID', '$authors', '$title', $releaseDate, NULLIF('$edition', ''), NULLIF('$releasePlace', ''), NULLIF('$publisher', ''), NULLIF('$isbn', '')
            )";
    
        $result = mysqli_query($db, $insert);

        return $result;
    }
}