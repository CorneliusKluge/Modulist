<?php

namespace Modulist\Controllers;

use Modulist\Models\LiteratureModel;
use Modulist\Services\LiteratureService;

class LiteratureController {
    function __construct() {
        if(isset($_POST["literature_add_submit"])) {
            $this->submitNewLiterature(); // erstellt neuen Literatur-Eintrag
        }
        if(isset($_POST["literate_add"])) {
            $this->getLiteratureAddView(); // ruft Literatur-Formular ab
        }
        if(isset($_POST["literature_list"])) {
            $this->getLiteratureListView(); // ruft Literatur-Liste ab
        }
        if(isset($_POST["literature_change"])) {
            $this->getLiteratureChangeView($_POST["literature_change"]); // ruft zu bearbeitenden Eintrag auf
        }
        if(isset($_POST["literature_change_submit"])) {
            $this->submitChangedLiterature($_POST["literature_change_submit"]); // sendet bearbeiteten Eintrag ab
        }
        if(isset($_POST["literature_delete"])) {
            $this->getLiteratureDeleteView($_POST["literature_delete"]); // Löschbestätigung aufrufen
        }
        if(isset($_POST["literature_delete_submit"])) {
            $this->submitLiteratureDelete($_POST["literature_delete_submit"]); // Eintrag löschen
        }
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
        include("Views/Services/Literature/LiteratureAddView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureListView(){
        ob_start();
        $result = LiteratureModel::getAllLiterature();
        include("Views/Services/Literature/LiteratureListView.php");
        $output = ob_get_clean();

        return $output;
    }

    function getLiteratureChangeView($literatureID){
        if($resultLiterature = LiteratureModel::getLiteratureByID($literatureID)){
            ob_start();
            include("Views/Services/Literature/LiteratureChangeView.php");
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
        include("Views/Services/Literature/LiteratureDeleteView.php");
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