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

        $insert = "INSERT INTO fields (name, nameEN, courseID) VALUES ('$name', NULLIF('$nameEN', ''), $courseID)";
        $result = mysqli_query($db, $insert);

        return $result;
    }
    static function getAllFieldsJoinCourse() {
        $db = DatabaseService::getDatabaseObject();

        $query = "SELECT t1.*, t2.name AS courseName FROM fields AS t1 JOIN courses AS t2 ON t1.courseID = t2.id";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getFieldByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM fields WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result =  mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }

        return $result;
    }
    static function isFieldByNameExceptSelf($id, $name) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT id FROM fields WHERE name = '$name' AND id <> $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
    static function updateField($id, $name, $nameEN, $courseID) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);
        $courseID = mysqli_real_escape_string($db, $courseID);

        if(empty($nameEN)) {
            $update = "UPDATE fields SET name = '$name', nameEN = NULL, courseID = $courseID WHERE id = $id";
        }
        else {
            $update = "UPDATE fields SET name = '$name', nameEN = '$nameEN', courseID = $courseID WHERE id = $id";
        }

        $result = mysqli_query($db, $update);

        return $result;
    }
    static function isFieldByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT id FROM fields WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }
    static function deleteField($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM fields WHERE id = $id";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getFieldsByCourseID($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT * FROM fields WHERE courseID = $courseID";
        $result = mysqli_query($db, $query);

        return $result;
    }
}