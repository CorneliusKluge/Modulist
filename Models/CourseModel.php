<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;

class CourseModel {
    static function getAllCourses() {
        $db = DatabaseService::getDatabaseObject();

        $query = "SELECT * FROM courses";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function isCourseByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT id FROM courses WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
}