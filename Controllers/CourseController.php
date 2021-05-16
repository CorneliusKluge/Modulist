<?php

namespace Modulist\Controllers;

use Modulist\Models\CourseModel;
use Modulist\Services\CourseService;

class CourseController {
    function __construct() {
        if(isset($_POST["course_add_submit"])) {
            $this->courseAddSubmit();
        }
        if(isset($_POST["course_add"])) {
            $this->getCourseAddView();
        }
        if(isset($_POST["course_list"])) {
            $this->getCourseListView();
        }
        if(isset($_POST["course_change"])) {
            $this->getCourseChangeView($_POST["course_change"]);
        }
        if(isset($_POST["course_change_submit"])) {
            $this->courseChangeSubmit($_POST["course_change_submit"]);
        }
        if(isset($_POST["course_delete"])) {
            $this->getCourseDeleteView($_POST["course_delete"]);
        }
        if(isset($_POST["course_delete_submit"])) {
            $this->courseDeleteSubmit($_POST["course_delete_submit"]);
        }
    }

    function courseAddSubmit() {
        ob_start();
        $bool = CourseService::addCourse(
            $_POST["course_add_name"] ?? null,
            $_POST["course_add_nameEN"] ?? null
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
    function getCourseAddView() {
        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Course/CourseAddView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getCourseListView() {
        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Course/CourseListView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function getCourseChangeView($courseID) {
        if($result = CourseModel::getCourseByID($courseID)) {
            ob_start();
            include("Views/Course/CourseChangeView.php");
            $output = ob_get_clean();
    
            echo $output;
        }
    }
    function courseChangeSubmit($courseID) {
        ob_start();
        $bool = CourseService::changeCourse(
            $courseID,
            $_POST["course_change_name"] ?? null,
            $_POST["course_change_nameEN"] ?? null
        );
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
    function getCourseDeleteView($courseID) {
        ob_start();
        $result = CourseModel::getCourseByID($courseID);
        include("Views/Course/CourseDeleteView.php");
        $output = ob_get_clean();

        echo $output;
    }
    function courseDeleteSubmit($courseID) {
        ob_start();
        $bool = CourseService::deleteCourse($courseID);
        $output = ob_get_clean();

        $returnArray["output"] = $output;
        $returnArray["success"] = $bool;
        echo json_encode($returnArray);
    }
}