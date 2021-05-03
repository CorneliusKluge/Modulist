<?php

namespace Modulist\Controllers;

use Modulist\Models\CourseModel;
use Modulist\Services\FieldService;

class AjaxController {
    function __construct() {
        if(isset($_POST["field_add_submit"])) {
            $this->fieldAddSubmit();
        }
        if(isset($_POST["field_add"])) {
            $this->fieldAddView();
        }
    }

    function fieldAddSubmit() {
        ob_start();
        if(isset($_POST["field_add_submit"])) {
            FieldService::addField(
                $_POST["field_add_name"] ?? null,
                $_POST["field_add_nameEN"] ?? null,
                $_POST["field_add_course"] ?? null
            );
        }
        $output = ob_get_clean();

        echo $output;
    }
    function fieldAddView() {
        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Services/Field/FieldAddView.php");
        $output = ob_get_clean();

        return $output;
    }
}