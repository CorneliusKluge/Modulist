<?php

namespace Modulist\Controllers;
use Modulist\Services\CategoryService;
use Modulist\Models\CategoryModel;

class CategoryController {
    function __construct() { 
        ob_start(); 
        include("Views/Category/CategoryTemplate.php"); 
        $template = ob_get_clean(); 

        $template = sprintf(
            $template,
            $this->getCategoryView(),
            $this->getCategoryListView(),
        );

        echo $template; 
    }
    
    function getCategoryView() {
        if(isset($_POST["category_add_button"])) {
            $view1 = $this->getCategoryAddView(); 
            return $view1;
        }

        if(isset($_POST["category_add_submit"])) {
            return $this->submitNewCategory();
        }
        if(isset($_POST["category_change_button"])) {
            return $this->getCategoryChangeView($_POST["category_change_button"]);
        }

        if(isset($_POST["category_change_submit"])) {
            return $this->categoryChangeSubmit($_POST["category_change_submit"]);
        }

        if(isset($_POST["category_delete_button"])) {
            return $this->getCategoryDeleteView($_POST["category_delete_button"]);
        }

        if(isset($_POST["category_delete_submit"])) {
            return $this->submitCategoryDelete($_POST["category_delete_submit"]);
        }
    }

    function getCategoryAddView() {
        ob_start();
        include("Views/Category/CategoryAddView.php"); 
        $view = ob_get_clean(); 
        return $view; 
    }

function submitNewCategory() {   
       ob_start();
       $bool = CategoryService::addCategory(
           $_POST["category_add_name"] ?? NULL,
           $_POST["category_add_presenceFlag"] ?? NULL,
           $_POST["category_add_position"] ?? NULL
       );
       $output = ob_get_clean();

       return $output;
   }

    function getCategoryListView() {
        ob_start();
        $categories = CategoryModel::getAllCategories();
        include("Views/Category/CategoryListView.php");
        $view = ob_get_clean(); 
        return $view; 
    }

    function categoryChangeSubmit($id) {
        ob_start();
        $bool = CategoryService::changeCategory(
            $id,
            $_POST["category_change_name"] ?? null,
            $_POST["category_change_presenceFlag"] ?? null,
            $_POST["category_change_position"] ?? null
        );
        $output = ob_get_clean();

        return $output;
    }

    function getCategoryChangeView($categoryID) {
        ob_start();
        
        $result = CategoryModel::getCategoryByID($categoryID);
        include("Views/Category/CategoryChangeView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getCategoryDeleteView($id) {
        ob_start();
        $result = CategoryModel::getCategoryByID($id);
        include("Views/Category/CategoryDeleteView.php");
        $output = ob_get_clean();
        
        return $output;
    }

    function submitCategoryDelete($id) {
        ob_start();

        $bool = CategoryService::deleteCategory($id);
        
        $output = ob_get_clean();   
        return $output;
    }
}