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
    function __construct() { 
        ob_start(); 
        include("Views/Module/ModuleTemplate.php"); 
        $template = ob_get_clean(); 

        $template = sprintf(
            $template,
            $this->decideModuleView(),
            $this->getModuleListView(), 
        );

        echo $template; 
    }
 
/*
    get Views
*/
    function decideModuleView() {
        if(isset($_POST["module_add_button"])) {
            return $this->getModuleAddView(); 
        }

        if(isset($_POST["module_add_submit"])) {
            return $this->getModuleAddSubmit();
        }

        if(isset($_POST["module_change_button"])) {
            $view1 = $this->getModuleChangeView($_POST["module_change_button"]);
            return $view1;
        }

        if(isset($_POST["module_change_submit"])) {
            return $this->moduleChangeSubmit($_POST["module_change_submit"]);
        }

        if(isset($_POST["module_delete_button"])) {
            return $this->getModuleDeleteView($_POST["module_delete_button"]);
        }

        if(isset($_POST["module_delete_submit"])) {
            return $this->moduleDeleteSubmit($_POST["module_delete_submit"]);
        }

        if(isset($_POST["module_lock_button"])) {
            return $this->lockModule($_POST["module_lock_button"]);
        }
    }

    public function getModuleAddSubmit()
    {
        ob_start(); 
        if(isset($_POST["module_add_submit"])) { 
            $this->moduleAddSubmit();
        }
        $output = ob_get_clean(); 

        return $output;
    }

    function getModuleAddView() {
        
        ob_start(); 
        $resultCourse = CourseModel::getAllCourses();
        $resultField = FieldModel::getAllFieldsJoinCourse();
        $resultCategories = CategoryModel::getAllCategories();
        $resultLiterature = LiteratureModel::getAllLiterature();
        include("Views/Module/ModuleAddView.php"); 
        $view = ob_get_clean(); 

        return $view; 
    }

    function getModuleDeleteView($moduleID) {
        ob_start();
        $result = ModuleModel::getModuleByID($moduleID);
        include("Views/Module/ModuleDeleteView.php");
        $output = ob_get_clean();

        return $output;
    }
    
    function getModuleChangeView($moduleID) {
        ob_start();
        $result = ModuleModel::getModuleByID($moduleID);
        $oldFields = ModuleModel::getAllModuleFields($moduleID);
        $oldCourse = mysqli_fetch_object(ModuleModel::getModuleCourse($moduleID));
        $oldCategories = ModuleModel::getAllModuleCategories($moduleID);
        $oldBasicLiterature = ModuleModel::getModuleBasicLiterature($moduleID);
        $oldDeepeningLiterature = ModuleModel::getModuleDeepeningLiterature($moduleID);
        $oldExams = ExamModel::getExamsByModuleID($moduleID);
        $resultCourse = CourseModel::getAllCourses();
        $resultField = FieldModel::getAllFieldsJoinCourse();
        $resultCategories = CategoryModel::getAllCategories();
        $resultLiterature = LiteratureModel::getAllLiterature();
        include("Views/Module/ModuleChangeView.php");
        $view = ob_get_clean();
        
        return $view;
    }

    function getModuleListView() {
        ob_start();
        $result = ModuleModel::getModulesForList();
        include("Views/Module/ModuleListView.php"); 
        $view = ob_get_clean(); 

        return $view; 
    }

/*
    functions to change database entries
*/
    function moduleAddSubmit() {
        ob_start();
        $cIndices = array();
        $eIndices = array();
        $fIndices = array();
        $bLitIndices = array();
        $dLitIndices = array();
        $categories = array();
        $exams = array();
        $fields = array();
        $basicLiterature = array();
        $deepeningLiterature = array();


        foreach($_POST as $key => $value) {
            if(stripos($key, "module_add_category_") === 0) {
                $cIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_add_examType_") === 0) {
                $eIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_add_field_") === 0) {
                $fIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_add_basicLiterature_") === 0) {
                $bLitIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_add_deepeningLiterature_") === 0) {
                $dLitIndices[] = substr($key, strrpos($key, "_") + 1);
            }
        }

        foreach($cIndices as $cIndex) {
            $categories[] = array($_POST["module_add_category_" . $cIndex] ?? null, $_POST["module_add_categoryWorkload_" . $cIndex], $_POST["module_add_TheoryFlag_" . $cIndex] ?? null, $_POST["module_add_categorySemester_" . $cIndex] ?? null);
        }

        foreach($eIndices as $eIndex) {
            $exams[] = array($_POST["module_add_examType_" . $eIndex] ?? null, $_POST["module_add_examDuration_" . $eIndex] ?? null, $_POST["module_add_examCircumference_" . $eIndex] ?? null, $_POST["module_add_examPeriod_" . $eIndex] ?? null,$_POST["module_add_examSemester_" . $eIndex] ?? null, $_POST["module_add_examWeighting_" . $eIndex] ?? null);    
        }

        foreach($fIndices as $fIndex) {
            $fields[] = $_POST["module_add_field_" . $fIndex] ?? null;
        }

        foreach($bLitIndices as $bLitIndex) {
            $basicLiterature[] = $_POST["module_add_basicLiterature_" . $bLitIndex] ?? null;
        }

        foreach($dLitIndices as $dLitIndex) {
            $deepeningLiterature[] = $_POST["module_add_deepeningLiterature_" . $dLitIndex] ?? null;
        }

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
            $_POST["module_add_overallGradeWeighting"] ?? null,
            $_POST["module_add_presenceCreditHours"] ?? null,
            $_POST["module_add_selfLearningCreditHours"] ?? null
        );
        $output = ob_get_clean();

        echo $output;
    }

    function moduleDeleteSubmit($moduleID) {
        ob_start();
        $bool = ModuleService::deleteModule($moduleID);
        $output = ob_get_clean();

        return $output;
    }

    function moduleChangeSubmit($moduleID) {
        ob_start();
        $cIndices = array();
        $eIndices = array();
        $fIndices = array();
        $bLitIndices = array();
        $dLitIndices = array();
        $categories = array();
        $exams = array();
        $fields = array();
        $basicLiterature = array();
        $deepeningLiterature = array();

        foreach($_POST as $key => $value) {
            if(stripos($key, "module_change_category_") === 0) {
                $cIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_change_examType_") === 0) {
                $eIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_change_field_") === 0) {
                $fIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_change_basicLiterature_") === 0) {
                $bLitIndices[] = substr($key, strrpos($key, "_") + 1);
            }

            if(stripos($key, "module_change_deepeningLiterature_") === 0) {
                $dLitIndices[] = substr($key, strrpos($key, "_") + 1);
            }
        }

        foreach($cIndices as $cIndex) {
            $categories[] = array($_POST["module_change_category_" . $cIndex] ?? null, $_POST["module_change_categoryWorkload_" . $cIndex], $_POST["module_change_TheoryFlag_" . $cIndex] ?? null, $_POST["module_change_categorySemester_" . $cIndex] ?? null);
        }
    
        foreach($eIndices as $eIndex) {
            $exams[] = array($_POST["module_change_examType_" . $eIndex] ?? null, $_POST["module_change_examDuration_" . $eIndex] ?? null, $_POST["module_change_examCircumference_" . $eIndex] ?? null, $_POST["module_change_examPeriod_" . $eIndex] ?? null, $_POST["module_change_examSemester_" . $eIndex] ?? null, $_POST["module_change_examWeighting_" . $eIndex] ?? null);    
        }

        foreach($fIndices as $fIndex) {
            $fields[] = $_POST["module_change_field_" . $fIndex] ?? null;
        }

        foreach($bLitIndices as $bLitIndex) {
            $basicLiterature[] = $_POST["module_change_basicLiterature_" . $bLitIndex] ?? null;
        }

        foreach($dLitIndices as $dLitIndex) {
            $deepeningLiterature[] = $_POST["module_change_deepeningLiterature_" . $dLitIndex] ?? null;
        }

        $bool = ModuleService::updateModule(
            $moduleID,
            $_POST["module_change_name"] ?? null,
            $_POST["module_change_nameEN"] ?? null,
            $_POST["module_change_code"] ?? null,
            $_POST["module_change_course"] ?? null,
            $fields,
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
            $_POST["module_change_overallGradeWeighting"] ?? null, 
            $_POST["module_change_presenceCreditHours"] ?? null, 
            $_POST["module_change_selfLearningCreditHours"] ?? null
        );
        $output = ob_get_clean();
        
        return $output;
    }

    function lockModule($moduleID) {
        ob_start();
        $bool = ModuleService::lockModule($moduleID);
        $output = ob_get_clean();
    
        return $output;
    }
}