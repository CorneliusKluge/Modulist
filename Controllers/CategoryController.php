<?php

namespace Modulist\Controllers;
use Modulist\Services\CategoryService;

class CategoryController {
    function __construct() { // Method which gets triggered whenever an object of the class "ModuleController" is created
        ob_start(); // Start output buffering
        include("Views/Category/CategoryTemplate.php"); // Include the Template
        $template = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        // Fill the template with views
        $template = sprintf(
            $template,
            $this->getCategoryAddView() // Calls the method "getModuleAddView" and write its output/return value into the template
        );

        echo $template; // Output the template
    }
    
    function getCategoryAddView() {
        ob_start(); // Start output buffering
        if(isset($_POST["module_category_add_submit"])) { // Check if form has been submitted
            // Not written yet
        }
        $output = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        ob_start(); // Start output buffering
        include("Views/Category/CategoryAddView.php"); // Include the View which contains the formular to create a new module
        $view = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        $view = sprintf($view, $output); //  Insert the content of the variable $output into the view

        return $view; // Return the view
    }

    function getCategoryListView(){
        ob_start();
        include("Views/Module/CategoryListView.php"); // Include the View which contains the list with all modules
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        return $view; // Return the view
    }

    function categoryAddSubmit() {
        ob_start();
        $bool = CategoryService::addCategory(
            $_POST["module_add_name"] ?? null,
            $_POST["module_add_presenceFlag"] ?? null,
            $_POST["module_add_position"] ?? null,
            $_POST["module_add_creditHours"] ?? null
        );
        $output = ob_get_clean();
    }

    function categoryChangeSubmit() {
        ob_start();
        $bool = CategoryService::changeCategory(
            $_POST["module_add_name"] ?? null,
            $_POST["module_add_presenceFlag"] ?? null,
            $_POST["module_add_position"] ?? null,
            $_POST["module_add_creditHours"] ?? null
        );
        $output = ob_get_clean();
    }
}