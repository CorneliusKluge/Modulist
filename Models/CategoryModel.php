<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService; 
use mysqli;

class CategoryModel{
    static function getAllCategories(){
        $db = DatabaseService::getDatabaseObject();
    
        $query = "SELECT * FROM categories";
        $result = mysqli_query($db, $query);
    
        return $result;
    }

    static function getCategoryByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM categories WHERE ID = $id";
        $result = mysqli_query($db, $query);
        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else { 
            $result = false;
        }
            
    
        return $result;
    }

    static function getCategoryByName($name) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT * FROM categories WHERE name = '$name'";
        $result = mysqli_query($db, $query);
        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else { 
            $result = false;
        }
            
    
        return $result;
    }

    static function addCategory(
        $name,
        $presenceFlag,
        $position
    ) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $presenceFlag = mysqli_real_escape_string($db, $presenceFlag);
        $position = mysqli_real_escape_string($db, $position);
        if(empty($presenceFlag)){
            $presenceFlag = 0;
        }
        $insert = "INSERT INTO categories (name, presenceFlag, position) VALUES ('$name', $presenceFlag, $position)";
        $result = mysqli_query($db, $insert);

        return $result;
    }

    static function deleteCategory($id){
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM categories WHERE ID = $id";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function changeCategory($id, $name, $presenceFlag, $position){
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);
        $name = mysqli_real_escape_string($db, $name);
        $presenceFlag = mysqli_real_escape_string($db, $presenceFlag);
        $position = mysqli_real_escape_string($db, $position);

        if(empty($presenceFlag)){
            $presenceFlag = 0;
        }
        $update = "UPDATE categories SET 
            name = '$name',
            presenceFlag = $presenceFlag,
            position = $position
        WHERE ID = $id";

        $result = mysqli_query($db, $update);

        return $result;

    }
}