<?php

namespace Modulist\Controllers;

use Modulist\Models\LiteratureModel;
use Modulist\Services\LiteratureService;

class LiteratureController {
    function __construct() {
        ob_start(); 
        include("Views/Literature/LiteratureTemplate.php"); 
        $template = ob_get_clean(); 
        
        $template = sprintf(
            $template,
            $view1 = $this->getLiteratureView(),
            $this->getLiteratureListView(),
        );

        echo $template; 
    }

    function getLiteratureView() {
        if(isset($_POST["literature_add_button"])) {
            return $this->getLiteratureAddView(); 
        }

        if(isset($_POST["literature_add_submit"])) {
            return $this->submitNewLiterature();
        }

        if(isset($_POST["literature_change_button"])) {
            return $this->getLiteratureChangeView($_POST["literature_change_button"]);
        }

        if(isset($_POST["literature_change_submit"])) {
            return $this->submitChangedLiterature($_POST["literature_change_submit"]);
        }

        if(isset($_POST["literature_delete_button"])) {
            return $this->getLiteratureDeleteView($_POST["literature_delete_button"]);
        }

        if(isset($_POST["literature_delete_submit"])) {
            return $this->submitLiteratureDelete($_POST["literature_delete_submit"]);
        }
    } 


    function submitNewLiterature() {    
        ob_start();
        $bool = LiteratureService::addLiterature(
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

    function getLiteratureAddView() {

        ob_start();
        include("Views/Literature/LiteratureAddView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureListView() {
        ob_start();
        $result = LiteratureModel::getAllLiterature();
        include("Views/Literature/LiteratureListView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureChangeView($literatureID) {
        if($resultLiterature = LiteratureModel::getLiteratureByID($literatureID)) {
            ob_start();
            
            $result = LiteratureModel::getLiteratureByID($literatureID);
            include("Views/Literature/LiteratureChangeView.php");
            
            $output = ob_get_clean();
            return $output;
        }
    }
    function submitChangedLiterature($literatureID) {
        ob_start();
        $bool = LiteratureService::changeLiterature(
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
        return $output;
    }

    function getLiteratureDeleteView($id) {
        ob_start();
        $result = LiteratureModel::getLiteratureByID($id);
        include("Views/Literature/LiteratureDeleteView.php");

        $output = ob_get_clean();
        return $output;
    }

    function submitLiteratureDelete($literatureID) {
        ob_start();

        $bool = LiteratureService::deleteLiterature($literatureID);
        
        $output = ob_get_clean();   
        return $output;
    }
}