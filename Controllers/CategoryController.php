<?php

namespace Modulist\Controllers;
use Modulist\Services\CategoryService;
use Modulist\Models\CategoryModel;

class CategoryController {
    function __construct() { // Method which gets triggered whenever an object of the class "ModuleController" is created
        ob_start(); // Start output buffering
        include("Views/Category/CategoryTemplate.php"); // Include the Template
        $template = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        // Fill the template with views
        $template = sprintf(
            $template,
            $this->getCategoryView(),
            $this->getCategoryListView(),
            "",
            "" 
        );

        echo $template; // Output the template
    }
    
    function getCategoryView() {
        if(isset($_POST["category_add_button"])) {
            $view1 = $this->getCategoryAddView(); // Calls the method "getCategoryAddView" and write its output/return value into the template
            return $view1;
        }

        if(isset($_POST["category_add_submit"])) {
            return $this->submitNewCategory();
        }
        if(isset($_POST["category_change_button"])) {
            $view1 = $this->getCategoryChangeView($_POST["category_change_button"]);
            return $view1;
        }

        if(isset($_POST["category_change_submit"])) {
            $this->categoryChangeSubmit($_POST["category_change_submit"]);
        }

        if(isset($_POST["category_delete_button"])) {
            $view1 = $this->getCategoryDeleteView($_POST["category_delete_button"]);
            return $view1;
        }

        if(isset($_POST["category_delete_submit"])) {
            $this->submitCategoryDelete($_POST["category_delete_submit"]);
        }
    }

    function getCategoryAddView() {
        ob_start(); // Start output buffering
        include("Views/Category/CategoryAddView.php"); // Include the View which contains the formular to create a new module
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering
        return $view; // Return the view
    }

function submitNewCategory() {
        // Get the content of the output buffer and stop output buffering
   
       ob_start();
       $bool = CategoryService::addCategory(
           $_POST["category_add_name"] ?? NULL,
           $_POST["category_add_presenceFlag"] ?? NULL,
           $_POST["category_add_position"] ?? NULL
       );
       $output = ob_get_clean();

       return $output;
   }

    function getCategoryListView(){
        ob_start();
        $categories = CategoryModel::getAllCategories();
        include("Views/Category/CategoryListView.php");
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering
        return $view; // Return the view
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

        echo $output;
    }

    function getCategoryChangeView($categoryID){
        ob_start();
        
        $result = CategoryModel::getCategoryByID($categoryID);
        include("Views/Category/CategoryChangeView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getCategoryDeleteView($id){
        ob_start();
        $result = CategoryModel::getCategoryByID($id);
        include("Views/Category/CategoryDeleteView.php");
        $output = ob_get_clean();
        
        return $output;
    }

    function submitCategoryDelete($categoryID){
        ob_start();

        $bool = CategoryModel::deleteCategory($categoryID);
        
        $output = ob_get_clean();   
        echo $output;
    }
}