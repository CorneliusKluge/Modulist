<?php

namespace Modulist\Controllers;

use Modulist\Models\LiteratureModel;


class LiteratureController {
    function __construct() {
        if(isset($_POST["literature_add_submit"])) {
            $this->submitNewLiterature(); // erstellt neuen Literatur-Eintrag
        }
        if(isset($_POST["literate_add"])) {
            $this->getLiteratureAddView(); // ruft Literatur-Formular ab
        }
        if(isset($_POST["literature_list"])) {
            $this->getLiteratureListView(); // ruft Literaturliste ab
        }
        if(isset($_POST["literature_change"])) {
            $this->getLiteratureChangeView($_POST["literature_change"]); // ruft zu bearbeitenden Eintrag auf
        }
        if(isset($_POST["literature_change_submit"])) {
            $this->submitChangedLiterature($_POST["literature_change_submit"]); // sendet bearbeiteten Eintrag
        }
        if(isset($_POST["literature_delete"])) {
            $this->getLiteratureDeleteView($_POST["literature_delete"]); // Löschbestätigung aufrufen
        }
        if(isset($_POST["literature_delete_submit"])) {
            $this->literatureDeleteSubmit($_POST["literature_delete_submit"]); // Eintrag löschen
        }
    }

    function submitNewLiterature($literatureID) {
        ob_start();
        $result = LiteratureModel::addLiterature( // result or bool?
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

        echo $output;
    }


    function fieldAddSubmit() {
        ob_start();
        $bool = FieldService::addField(
            $_POST["field_add_name"] ?? null,
            $_POST["field_add_nameEN"] ?? null,
            $_POST["field_add_course"] ?? null
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
    function getFieldAddView() {
        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Services/Field/FieldAddView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getFieldListView() {
        ob_start();
        $result = FieldModel::getAllFieldsJoinCourse();
        include("Views/Services/Field/FieldListView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getFieldChangeView($fieldID) {
        if($resultField = FieldModel::getFieldByID($fieldID)) {
            ob_start();
            $resultCourses = CourseModel::getAllCourses();
            include("Views/Services/Field/FieldChangeView.php");
            $output = ob_get_clean();
    
            echo $output;
        }
    }
    function fieldChangeSubmit($fieldID) {
        ob_start();
        $bool = FieldService::changeField(
            $fieldID,
            $_POST["field_change_name"] ?? null,
            $_POST["field_change_nameEN"] ?? null,
            $_POST["field_change_course"] ?? null
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
    function getFieldDeleteView($fieldID) {
        ob_start();
        $result = FieldModel::getFieldByID($fieldID);
        include("Views/Services/Field/FieldDeleteView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function fieldDeleteSubmit($fieldID) {
        ob_start();
        $bool = FieldService::deleteField($fieldID);
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
}