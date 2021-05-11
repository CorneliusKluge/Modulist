<?php

namespace Modulist\Controllers;

class ModuleCategoryController {
    function __construct() { // Method which gets triggered whenever an object of the class "ModuleController" is created
        ob_start(); // Start output buffering
        include("Views/ModuleCategory/ModuleCategoryTemplate.php"); // Include the Template
        $template = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        // Fill the template with views
        $template = sprintf(
            $template,
            $this->getModuleCategoryAddView() // Calls the method "getModuleAddView" and write its output/return value into the template
        );

        echo $template; // Output the template
    }
    
    function getModuleCategoryAddView() {
        ob_start(); // Start output buffering
        if(isset($_POST["module_category_add_submit"])) { // Check if form has been submitted
            // Not written yet
        }
        $output = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        ob_start(); // Start output buffering
        include("Views/ModuleCategory/ModuleCategoryAddView.php"); // Include the View which contains the formular to create a new module
        $view = ob_end_clean(); // Get the content of the output buffer and stop output buffering

        $view = sprintf($view, $output); //  Insert the content of the variable $output into the view

        return $view; // Return the view
    }
}