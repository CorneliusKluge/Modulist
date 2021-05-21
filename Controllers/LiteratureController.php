<?php

namespace Modulist\Controllers;

use Modulist\Models\LiteratureModel;
use Modulist\Services\LiteratureService;

class LiteratureController {
    function __construct() {
        ob_start(); // Start output buffering
        include("Views/Literature/LiteratureTemplate.php"); // Include the Template
        $template = ob_get_clean(); // Get the content of the output buffer and stop output buffering
        
        // Fill the template with views
        $template = sprintf(
            $template,
            $view1 = $this->getLiteratureView(),
            $this->getLiteratureListView(),
            "" 
        );

        echo $template; // Output the template
    }

    function getLiteratureView() {
        if(isset($_POST["literature_add_button"])) {
            $view1 = $this->getLiteratureAddView(); // Calls the method "getliteratureAddView" and write its output/return value into the template
            return $view1;
        }

        if(isset($_POST["literature_add_submit"])) {
            $this->submitNewLiterature();
        }

        if(isset($_POST["literature_change_button"])) {
            $view1 = $this->getLiteratureChangeView($_POST["literature_change_button"]);
            return $view1;
        }

        if(isset($_POST["literature_change_submit"])) {
            $this->submitChangedLiterature($_POST["literature_change_submit"]);
        }

        if(isset($_POST["literature_delete_button"])) {
            $view1 = $this->getLiteratureDeleteView($_POST["literature_delete_button"]);
            return $view1;
        }

        if(isset($_POST["literature_delete_submit"])) {
            $this->submitLiteratureDelete($_POST["literature_delete_submit"]);
        }
    } 


    function submitNewLiterature() {
         // Get the content of the output buffer and stop output buffering
    
        ob_start();
        $bool = LiteratureModel::addLiterature(
            $_POST["literature_add_authors"],
            $_POST["literature_add_title"],
            $_POST["literature_add_year"],
            $_POST["literature_add_edition"],
            $_POST["literature_add_place"],
            $_POST["literature_add_publisher"],
            $_POST["literature_add_isbn"]
        );
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureAddView(){

        ob_start();
        include("Views/Literature/LiteratureAddView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureListView(){
        ob_start();
        $result = LiteratureModel::getAllLiterature();
        include("Views/Literature/LiteratureListView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureChangeView($literatureID){
        if($resultLiterature = LiteratureModel::getLiteratureByID($literatureID)){
            ob_start();
            
            $result = LiteratureModel::getLiteratureByID($literatureID);
            include("Views/Literature/LiteratureChangeView.php");
            $output = ob_get_clean();

            return $output;
        }
    }
    function submitChangedLiterature($literatureID){
        ob_start();
        $bool = LiteratureModel::changeLiterature(
            $literatureID,
            $_POST["literature_change_authors"],
            $_POST["literature_change_title"],
            $_POST["literature_change_year"],
            $_POST["literature_change_edition"],
            $_POST["literature_change_place"],
            $_POST["literature_change_publisher"],
            $_POST["literature_change_isbn"]
        );
        $output = ob_get_clean();

        echo $output;
    }

    function getLiteratureDeleteView($id){
        ob_start();
        $result = LiteratureModel::getLiteratureByID($id);
        include("Views/Literature/LiteratureDeleteView.php");
        $output = ob_get_clean();

        echo $output;
    }

    function submitLiteratureDelete($literatureID){
        ob_start();

        $bool = LiteratureModel::deleteLiterature($literatureID);
        
        $output = ob_get_clean();   
        echo $output;
    }

}