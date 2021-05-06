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
    static function isCourseByName($name) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT id FROM courses WHERE name = '$name'";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
    static function addCourse($name, $nameEN) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);

        $insert = "INSERT INTO courses (name, nameEN) VALUES ('$name', NULLIF('$nameEN', ''))";
        $result = mysqli_query($db, $insert);

        return $result;
    }
    static function getCourseByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM courses WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result =  mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }

        return $result;
    }
    static function isCourseByNameExceptSelf($id, $name) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT id FROM courses WHERE name = '$name' AND id <> $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
    static function updateCourse($id, $name, $nameEN) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);

        if(empty($nameEN)) {
            $update = "UPDATE courses SET name = '$name', nameEN = NULL WHERE id = $id";
        }
        else {
            $update = "UPDATE courses SET name = '$name', nameEN = '$nameEN' WHERE id = $id";
        }

        $result = mysqli_query($db, $update);

        return $result;
    }
    static function deleteCourse($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM courses WHERE id = $id";
        $result = mysqli_query($db, $query);

        return $result;
    }
}