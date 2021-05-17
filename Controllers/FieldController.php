<?php

namespace Modulist\Controllers;

use Modulist\Models\CourseModel;
use Modulist\Models\FieldModel;
use Modulist\Services\FieldService;

class FieldController {
    function __construct() {
        if(isset($_POST["field_add_submit"])) {
            $this->fieldAddSubmit();
        }
        if(isset($_POST["field_add"])) {
            $this->getFieldAddView();
        }
        if(isset($_POST["field_list"])) {
            $this->getFieldListView();
        }
        if(isset($_POST["field_change"])) {
            $this->getFieldChangeView($_POST["field_change"]);
        }
        if(isset($_POST["field_change_submit"])) {
            $this->fieldChangeSubmit($_POST["field_change_submit"]);
        }
        if(isset($_POST["field_delete"])) {
            $this->getFieldDeleteView($_POST["field_delete"]);
        }
        if(isset($_POST["field_delete_submit"])) {
            $this->fieldDeleteSubmit($_POST["field_delete_submit"]);
        }
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
        include("Views/Field/FieldAddView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getFieldListView() {
        ob_start();
        $result = FieldModel::getAllFieldsJoinCourse();
        include("Views/Field/FieldListView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getFieldChangeView($fieldID) {
        if($resultField = FieldModel::getFieldByID($fieldID)) {
            ob_start();
            $resultCourses = CourseModel::getAllCourses();
            include("Views/Field/FieldChangeView.php");
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
        include("Views/Field/FieldDeleteView.php");
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