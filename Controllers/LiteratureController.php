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
            $this->getLiteratureAddView(), // Calls the method "getModuleAddView" and write its output/return value into the template
            $this->getLiteratureListView(),
            "" 
        );

        echo $template; // Output the template
    }

    function submitNewLiterature() {
        ob_start();
        $bool = LiteratureModel::addLiterature(
            $_POST["literature_add_authors"],
            $_POST["literature_add_title"],
            $_POST["literature_add_releaseDate"],
            $_POST["literature_add_edition"],
            $_POST["literature_add_releasePlace"],
            $_POST["literature_add_publisher"],
            $_POST["literature_add_isbn"]
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
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
            include("Views/Literature/LiteratureChangeView.php");
            $output = ob_get_clean();

            return $output;
        }
    }
    function submitChangedLiterature($literatureID){
        ob_start();
        $bool = LiteratureModel::changeLiterature(
            $literatureID,
            $_POST["literature_add_authors"],
            $_POST["literature_add_title"],
            $_POST["literature_add_releaseDate"],
            $_POST["literature_add_edition"],
            $_POST["literature_add_releasePlace"],
            $_POST["literature_add_publisher"],
            $_POST["literature_add_isbn"]
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        return json_encode($returnArray);
    }

    function getLiteratureDeleteView(){
        ob_start();
        include("Views/Literature/LiteratureDeleteView.php");
        $output = ob_get_clean();

        echo $output;
    }

    function submitLiteratureDelete($literatureID){
        ob_start();
        $bool = LiteratureModel::deleteLiterature($literatureID);
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        return json_encode($returnArray);        
    }

}