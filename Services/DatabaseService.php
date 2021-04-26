<?php

namespace Modulist\Services;

class DatabaseService {
    static function getDatabaseObject() {
        $db = mysqli_connect("localhost", "", "", "");
        if(!$db) {
            exit("Verbindugsfehler: " . mysqli_connect_error());
        }

        return $db;
    }
}