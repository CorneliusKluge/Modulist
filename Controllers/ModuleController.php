<?php

namespace Modulist\Controllers;

use Modulist\Models\CategoryModel;
use Modulist\Models\CourseModel;
use Modulist\Models\ExamModel;
use Modulist\Models\FieldModel;
use Modulist\Models\LiteratureModel;
use Modulist\Models\ModuleModel;
use Modulist\Services\ModuleService;

class ModuleController {
    function __construct() { // Method which gets triggered whenever an object of the class "ModuleController" is created
        ob_start(); // Start output buffering
        include("Views/Module/ModuleTemplate.php"); // Include the Template
        $template = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        // Fill the template with views
        $template = sprintf(
            $template,
            $this->decideModuleView(),
            $this->getModuleListView(), 
            ""
        );

        echo $template; // Output the template
    }
 
/*
    get Views
*/
    function decideModuleView() {
        if(isset($_POST["module_list_add"])) {
            $view1 = $this->getModuleAddView(); // Calls the method "getModuleAddView" and write its output/return value into the template
            return $view1;
        }

        if(isset($_POST["module_add_submit"])) {
            $this->getModuleAddSubmit();
        }

        if(isset($_POST["module_change_button"])) {
            $view1 = $this->getModuleChangeView($_POST["module_change_button"]);
            return $view1;
        }

        if(isset($_POST["module_change_submit"])) {
            $this->moduleChangeSubmit($_POST["module_change_submit"]);
        }

        if(isset($_POST["module_delete_button"])) {
            $view1 = $this->getModuleDeleteView($_POST["module_delete_button"]);
            return $view1;
        }

        if(isset($_POST["module_delete_submit"])) {
            $this->moduleDeleteSubmit($_POST["module_delete_submit"]);
        }
    }

    public function getModuleAddSubmit()
    {
        ob_start(); // Start output buffering
        if(isset($_POST["module_add_submit"])) { // Check if form has been submitted
            $this->moduleAddSubmit();
        }
        $output = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        echo $output;
    }

    function getModuleAddView() {
        
        ob_start(); // Start output buffering
        $resultCourse = CourseModel::getAllCourses();
        $resultField = FieldModel::getAllFieldsJoinCourse();
        $resultCategories = CategoryModel::getAllCategories();
        $resultLiterature = LiteratureModel::getAllLiterature();
        include("Views/Module/ModuleAddView.php"); // Include the View which contains the formular to create a new module
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        return $view; // Return the view
    }

    function getModuleDeleteView($moduleID) {
        ob_start();
        $result = ModuleModel::getModuleByID($moduleID);
        include("Views/Module/ModuleDeleteView.php");
        $output = ob_get_clean();

        echo $output;
    }
    
    function getModuleChangeView($moduleID){
        ob_start();
        $result = ModuleModel::getModuleByID($moduleID);
        $resultCourse = CourseModel::getAllCourses();
        $resultField = mysqli_fetch_object(FieldModel::getAllFieldsJoinCourse());
        $resultCategories = mysqli_fetch_object(CategoryModel::getAllCategories());
        $resultLiterature = mysqli_fetch_object(LiteratureModel::getAllLiterature());
        $resultModule_Category = mysqli_fetch_object(ModuleModel::getAllModuleCategories($moduleID));
        $resultExams = mysqli_fetch_object(ExamModel::getExamsByModuleID($moduleID));
        include("Views/Module/ModuleChangeView.php");
        $view = ob_get_clean();

        return $view;
    }

    function getModuleListView(){
        ob_start();
        $result = ModuleModel::getModulesForList();
        include("Views/Module/ModuleListView.php"); // Include the View which contains the list with all modules
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        return $view; // Return the view
    }

/*
    functions to change database entries
*/
    function moduleAddSubmit() {
        $i = 0;
        $j = 0;
        $k = 0;
        $l = 0;
        $m = 0;
        $stillCategories = true;
        $stillFields = true;
        $stillExams = true;
        $stillBasicLiterature = true;
        $stillDeepeningLiterature = true;
        ob_start();
//TODO: include EVL TheoryFlag in $categories, add more categories to the array dynamically
        while($stillCategories) {
            $inputCategory = "module_add_category_".$i;
            var_dump($i);
            if(isset($inputCategory)) {
                $inputWorkload = "module_add_categoryWorkload_".$i;
                $inputTheoryFlag_t = "module_add_TheoryFlag_theory_".$i;
                $inputTheoryFlag_p = "module_add_TheoryFlag_practical_".$i;
                $categories[] = array($_POST[$inputCategory] ?? null, $_POST[$inputWorkload] ?? null, $_POST[$inputTheoryFlag_t] ?? null, $_POST[$inputTheoryFlag_p] ?? null);    
            }
            else {
                $stillCategories = false;
            }

            $i++;
            if($i = 5) {
                $stillCategories = false;
            }
        }

        while($stillFields) {
            $inputField = "module_add_field_".$j;
            if(isset($inputField)) {
                $fields[] = $_POST[$inputField] ?? null;
            }
            else {
                $stillFields = false;
            }

            $j++;
            if($j = 5) {
                $stillFields = false;
            }
        }

        while($stillExams) {
            $inputExam = "module_add_examType_".$k;
            if(isset($inputExam)) {
                $inputDuration = "module_add_examDuration_".$k;
                $inputCircumference = "module_add_examCircumference_".$k;
                $inputPeriod = "module_add_examPeriod_".$k;
                $inputWeighting = "module_add_examWeighting_".$k;
                $exams[] = array($_POST[$inputExam] ?? null, $_POST[$inputDuration] ?? null, $_POST[$inputCircumference] ?? null, $_POST[$inputPeriod] ?? null, $_POST[$inputWeighting] ?? null);    
            }
            else {
                $stillExams = false;
            }

            $k++;
            if($k = 5) {
                $stillExams = false;
            }
        }

        while($stillBasicLiterature) {
            $inputBasicLiterarture = "module_add_basicLiterature_".$l;
            if(isset($inputBasicLiterarture)) {
                $basicLiterature[] = $_POST[$inputBasicLiterarture] ?? null;
            }
            else {
                $stillBasicLiterature = false;
            }

            $l++;
            if($l = 5) {
                $stillBasicLiterature = false;
            }
        }

        while($stillDeepeningLiterature) {
            $inputDeepeningLiterarture = "module_add_deepeningLiterature_".$m;
            if(isset($inputDeepeningLiterarture)) {
                $deepeningLiterature[] = $_POST[$inputDeepeningLiterarture] ?? null;
            }
            else {
                $stillDeepeningLiterature = false;
            }
            
            $m++;
            if($m = 5) {
                $stillDeepeningLiterature = false;
            }
        }
       /* $categories = array(array($_POST["module_add_category"] ?? null, $_POST["module_add_categoryWorkload"] ?? null));
        $exams = array(array($_POST["module_add_examType_0"] ?? null, $_POST["module_add_examDuration_0"] ?? null,
                                $_POST["module_add_examCircumference_0"] ?? null,  $_POST["module_add_examPeriod_0"] ?? null, 
                                $_POST["module_add_examWeighting_0"] ?? null));
        $basicLiterature = array($_POST["module_add_basicLiterature_0"] ?? null);
        $deepeningLiterature = array($_POST["module_add_deepeningLiterature_0"] ?? null);*/

        $bool = ModuleService::addModule(
            $_POST["module_add_name"] ?? null,
            $_POST["module_add_nameEN"] ?? null,
            $_POST["module_add_code"] ?? null,
            $_POST["module_add_course"] ?? null,
            $fields,
            $_POST["module_add_summary"] ?? null,
            $_POST["module_add_summaryEN"] ?? null,
            $_POST["module_add_type"] ?? null,
            $_POST["module_add_semester"] ?? null,
            $_POST["module_add_duration"] ?? null,
            $_POST["module_add_credits"] ?? null,
            $_POST["module_add_usability"] ?? null,
            $_POST["module_add_examRequirement"] ?? null,
            $_POST["module_add_participationRequirement"] ?? null,
            $_POST["module_add_studyContent"] ?? null,
            $_POST["module_add_knowledgeBroadening"] ?? null,
            $_POST["module_add_knowledgeDeepening"] ?? null,
            $_POST["module_add_instrumentalCompetence"] ?? null,
            $_POST["module_add_systemicCompetence"] ?? null,
            $_POST["module_add_communicativeCompetence"] ?? null,
            $categories,
            $exams,
            $_POST["module_add_responsibleName"] ?? null,
            $_POST["module_add_responsibleEmail"] ?? null,
            $_POST["module_add_lectureLanguage"] ?? null,
            $_POST["module_add_frequency"] ?? null,
            $_POST["module_add_media"] ?? null,
            $_POST["module_add_basicLiteraturePreNote"] ?? null,
            $basicLiterature,
            $_POST["module_add_basicLiteraturePostNote"] ?? null,
            $_POST["module_add_deepeningLiteraturePreNote"] ?? null,
            $deepeningLiterature,
            $_POST["module_add_deepeningLiteraturePostNote"] ?? null,
        );
        $output = ob_get_clean();

        echo $output;
    }

    function moduleDeleteSubmit($moduleID) {
        ob_start();
        $bool = ModuleService::deleteModule($moduleID);
        $output = ob_get_clean();

        echo $output;
    }

    function moduleChangeSubmit($moduleID){
        ob_start();
        $categories = array(array($_POST["module_change_category"] ?? null, $_POST["module_change_categoryWorkload"] ?? null));
        $exams = array(array($_POST["module_change_examType"] ?? null, $_POST["module_change_examDuration"] ?? null,
                                $_POST["module_change_examCircumference"] ?? null,  $_POST["module_change_examPeriod"] ?? null, 
                                $_POST["module_change_examWeighting"] ?? null));
        $basicLiterature = array($_POST["module_change_basicLiterature"] ?? null);
        $deepeningLiterature = array($_POST["module_change_deepeningLiterature"] ?? null);

        $bool = ModuleService::updateModule(
            $moduleID,
            $_POST["module_change_name"] ?? null,
            $_POST["module_change_nameEN"] ?? null,
            $_POST["module_change_code"] ?? null,
            $_POST["module_change_course"] ?? null,
            $_POST["module_change_field"] ?? null,
            $_POST["module_change_summary"] ?? null,
            $_POST["module_change_summaryEN"] ?? null,
            $_POST["module_change_type"] ?? null,
            $_POST["module_change_semester"] ?? null,
            $_POST["module_change_duration"] ?? null,
            $_POST["module_change_credits"] ?? null,
            $_POST["module_change_usability"] ?? null,
            $_POST["module_change_examRequirement"] ?? null,
            $_POST["module_change_participationRequirement"] ?? null,
            $_POST["module_change_studyContent"] ?? null,
            $_POST["module_change_knowledgeBroadening"] ?? null,
            $_POST["module_change_knowledgeDeepening"] ?? null,
            $_POST["module_change_instrumentalCompetence"] ?? null,
            $_POST["module_change_systemicCompetence"] ?? null,
            $_POST["module_change_communicativeCompetence"] ?? null,
            $categories,
            $exams,
            $_POST["module_change_responsibleName"] ?? null,
            $_POST["module_change_responsibleEmail"] ?? null,
            $_POST["module_change_lectureLanguage"] ?? null,
            $_POST["module_change_frequency"] ?? null,
            $_POST["module_change_media"] ?? null,
            $_POST["module_change_basicLiteraturePreNote"] ?? null,
            $basicLiterature,
            $_POST["module_change_basicLiteraturePostNote"] ?? null,
            $_POST["module_change_deepeningLiteraturePreNote"] ?? null,
            $deepeningLiterature,
            $_POST["module_change_deepeningLiteraturePostNote"] ?? null,
        );
        $output = ob_get_clean();
        
        echo $output;
    }
}