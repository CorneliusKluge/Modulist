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

    static function getCategoryByName($name){
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);

        $query = "SELECT * FROM categories WHERE name = '$name'";
        $result = mysqli_query($db, $query);
    
        return $result;
    }

    static function addCategory($name, $presenceFlag, $position, $creditHours){
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $presenceFlag = mysqli_real_escape_string($db, $presenceFlag);
        $position = mysqli_real_escape_string($db, $position);
        $creditHours = mysqli_real_escape_string($db, $creditHours);

        if(empty($creditHours)){
            $creditHours = "NULL";
        }

        $insert = "INSERT INTO categories (name, presenceFlag, position, creditHours) VALUES ('$name', $presenceFlag, $position, $creditHours)";
        $result = mysqli_query($db, $insert);

    
        return $result;
    }

    static function changeCategory($name, $presenceFlag, $position, $creditHours){
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $presenceFlag = mysqli_real_escape_string($db, $presenceFlag);
        $position = mysqli_real_escape_string($db, $position);
        $creditHours = mysqli_real_escape_string($db, $creditHours);

        if(empty($creditHours)){
            $creditHours = "NULL";
        }

        $insert = "INSERT INTO categories (name, presenceFlag, position, creditHours) VALUES ('$name', $presenceFlag, $position, $creditHours)";
        $result = mysqli_query($db, $insert);

    
        return $result;
    }

    static function deleteCategory($name){
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);

        $query = "DELETE FROM fields WHERE name = '$name'";
        $result = mysqli_query($db, $query);

        return $result;
    }
}