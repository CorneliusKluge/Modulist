<?php

namespace Modulist\Controllers;

use Modulist\Models\CourseModel;
use Modulist\Services\ExportService;

class ExportController {
    function __construct() {
        ob_start();
        include("Views/Export/ExportTemplate.php");
        $template = ob_get_clean();

        $template = sprintf(
                        $template,
                        $this->getModuleManualExportView(),
                        $this->getStudyScheduleExportView(),
                        $this->getExamScheduleExportView()
                    );

        echo $template;
    }

    function getModuleManualExportView() {
        if(isset($_POST["export_moduleManual_submit"])) {
            ExportService::exportModuleManual(
                $_POST["export_moduleManual_course"] ?? null,
                $_POST["export_moduleManual_lang"] ?? null
            );
        }

        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Export/ModuleManualExportView.php");
        $view = ob_get_clean();

        return $view;
    }
    function getStudyScheduleExportView() {
        if(isset($_POST["export_studySchedule_submit"])) {
            ExportService::exportStudySchedule(
                $_POST["export_studySchedule_course"] ?? null
            );
        }

        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Export/StudyScheduleExportView.php");
        $view = ob_get_clean();

        return $view;
    }
    function getExamScheduleExportView() {
        if(isset($_POST["export_examSchedule_submit"])) {
            ExportService::exportExamSchedule(
                $_POST["export_examSchedule_course"] ?? null
            );
        }

        ob_start();
        $result = CourseModel::getAllCourses();
        include("Views/Export/ExamScheduleExportView.php");
        $view = ob_get_clean();

        return $view;
    }
}