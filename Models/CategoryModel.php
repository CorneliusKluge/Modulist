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
    
}