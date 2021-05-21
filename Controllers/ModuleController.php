<?php

namespace Modulist\Controllers;

use Modulist\Models\CategoryModel;
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

        $view1 = "";

        if(isset($_POST["module_list_add"])) {
            $view1 = $this->getModuleAddView(); // Calls the method "getModuleAddView" and write its output/return value into the template
        }

        if(isset($_POST["module_add_submit"])) {
            $this->getModuleAddSubmit();
        }

        if(isset($_POST["module_change_module"])) {
            $view1 = $this->getModuleChangeView($_POST["module_change_module"]);
        }

        if(isset($_POST["module_change_submit"])) {
            $this->moduleChangeSubmit($_POST["module_change_submit"]);
        }

        if(isset($_POST["module_delete_module"])) {
            $view1 = $this->getModuleDeleteView($_POST["module_delete_module"]);
        }

        if(isset($_POST["module_delete_submit"])) {
            $this->moduleDeleteSubmit($_POST["module_delete_submit"]);
        }
        // Fill the template with views
        $template = sprintf(
            $template,
            $view1,
            $this->getModuleListView(), 
            ""
        );

        echo $template; // Output the template
    }
 
/*
    get Views
*/
    public function getModuleAddSubmit()
    {
        ob_start(); // Start output buffering
        if(isset($_POST["module_add_submit"])) { // Check if form has been submitted
            $this->moduleAddSubmit();
        }
        $output = ob_get_clean(); // Get the content of the output buffer and stop output buffering
    }

    function getModuleAddView() {
        
        ob_start(); // Start output buffering
        $resultField = FieldModel::getAllFieldsJoinCourse();
        $resultCategories = CategoryModel::getAllCategories();
        $resultLiterature = LiteratureModel::getAllLiterature();
        include("Views/Module/ModuleAddView.php"); // Include the View which contains the formular to create a new module
        $view = ob_get_clean(); // Get the content of the output buffer and stop output buffering

        $view = sprintf($view, $output); //  Insert the content of the variable $output into the view

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
        if(isset($_POST["module_change_submit"])) { 
            $this->moduleChangeSubmit($moduleID);
        }
        $output = ob_get_clean();

        ob_start();
        $result = ModuleModel::getModuleByID($moduleID);
        $resultField = FieldModel::getAllFieldsJoinCourse();
        $resultCategories = CategoryModel::getAllCategories();
        $resultLiterature = LiteratureModel::getAllLiterature();
        $resultModule_Category = ModuleModel::getAllModuleCategories($moduleID);
        $resultExams = ExamModel::getExamsByModuleID($moduleID);
        include("Views/Module/ModuleChangeView.php");
        $view = ob_get_clean();

        $view = sprintf($view, $output);

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
        ob_start();
        $categories = array(array($_POST["module_add_category"] ?? null, $_POST["module_add_categoryWorkload"] ?? null));
        $exams = array(array($_POST["module_add_examType"] ?? null, $_POST["module_add_examDuration"] ?? null,
                                $_POST["module_add_examCircumference"] ?? null,  $_POST["module_add_examPeriod"] ?? null, 
                                $_POST["module_add_examWeighting"] ?? null));
        $basicLiterature = array($_POST["module_add_basicLiterature"] ?? null);
        $deepeningLiterature = array($_POST["module_add_deepeningLiterature"] ?? null);

        $bool = ModuleService::addModule(
            $_POST["module_add_name"] ?? null,
            $_POST["module_add_nameEN"] ?? null,
            $_POST["module_add_code"] ?? null,
            $_POST["module_add_field"] ?? null,
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
        var_dump($moduleID);
        echo $output;
    }

    function moduleChangeSubmit($moduleID){
        ob_start();
        $categories = array(array($_POST["module_add_category"] ?? null, $_POST["module_add_categoryWorkload"] ?? null));
        $exams = array(array($_POST["module_add_examType"] ?? null, $_POST["module_add_examDuration"] ?? null,
                                $_POST["module_add_examCircumference"] ?? null,  $_POST["module_add_examPeriod"] ?? null, 
                                $_POST["module_add_examWeighting"] ?? null));
        $basicLiterature = array($_POST["module_add_basicLiterature"] ?? null);
        $deepeningLiterature = array($_POST["module_add_deepeningLiterature"] ?? null);

        $bool = ModuleService::updateModule(
            $moduleID,
            $_POST["module_add_name"] ?? null,
            $_POST["module_add_nameEN"] ?? null,
            $_POST["module_add_code"] ?? null,
            $_POST["module_add_field"] ?? null,
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
}