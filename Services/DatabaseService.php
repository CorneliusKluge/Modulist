<?php

namespace Modulist\Services;

class DatabaseService {
    static function getDatabaseObject() {
        $db = mysqli_connect("localhost", "modulist_admin", "123456", "modulist"); // hostname, username, password, database
        if(!$db) {
            exit("Verbindugsfehler: " . mysqli_connect_error());
        }

        return $db;
    }
}