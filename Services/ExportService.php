<?php

namespace Modulist\Services;

use Dompdf\Dompdf;
use Modulist\Models\CourseModel;
use Modulist\Models\FieldModel;
use Modulist\Models\ModuleModel;

class ExportService {
    static function exportModuleManual($courseID, $lang) {
        if($lang == "de") {
            $courseName = CourseModel::getCourseByID($courseID)->name;
            $compulsoryCourseModules = ModuleModel::getCompulsoryCourseModulesExceptLocked($courseID);
            $electiveCourseModules = ModuleModel::getElectiveCourseModulesExceptLocked($courseID);
            $practicalCourseModules = ModuleModel::getPracticalCourseModulesExceptLocked($courseID);
            $resultFields = FieldModel::getFieldsByCourseID($courseID);
            
            ob_start();
            include("Views/Services/Export/ModuleManual/ManualTemplate.php");
            $template = ob_get_clean();

            ob_start();
            include("Views/Services/Export/ModuleManual/IntroView.php");
            include("Views/Services/Export/ModuleManual/ModuleView.php");
            $view = ob_get_clean();

            $template = sprintf($template, $view);
            ExportService::exportFile($template, "Modulhandbuch");
        }
        else {
            $courseNameEN = CourseModel::getCourseByID($courseID)->nameEN;
            $compulsoryCourseModules = ModuleModel::getCompulsoryCourseModulesExceptLocked($courseID);
            $electiveCourseModules = ModuleModel::getElectiveCourseModulesExceptLocked($courseID);
            $practicalCourseModules = ModuleModel::getPracticalCourseModulesExceptLocked($courseID);
            $resultFields = FieldModel::getFieldsByCourseID($courseID);

            ob_start();
            include("Views/Services/Export/ModuleManual/ModuleViewEN.php");
            $view = ob_get_clean();

            ExportService::exportFile($view, "ModuleManual");
        }
    }
    static function exportStudySchedule($courseID) {
        $courseName = CourseModel::getCourseByID($courseID)->name;
        $compulsoryCourseModules = ModuleModel::getCompulsoryCourseModulesExceptLocked($courseID);
        $electiveCourseModules = ModuleModel::getElectiveCourseModulesExceptLocked($courseID);
        $practicalCourseModules = ModuleModel::getPracticalCourseModulesExceptLocked($courseID);
        $resultFields = FieldModel::getFieldsByCourseID($courseID);

        ob_start();
        include("Views/Services/Export/StudySchedule/StudySchedule.php");
        $view = ob_get_clean();

        ExportService::exportFile($view, "Studienablaufplan", "A3", "landscape");
    }
    static function exportExamSchedule($courseID) {
        $courseName = CourseModel::getCourseByID($courseID)->name;
        $compulsoryCourseModules = ModuleModel::getCompulsoryCourseModulesExceptLocked($courseID);
        $electiveCourseModules = ModuleModel::getElectiveCourseModulesExceptLocked($courseID);
        $practicalCourseModules = ModuleModel::getPracticalCourseModulesExceptLocked($courseID);
        $resultFields = FieldModel::getFieldsByCourseID($courseID);

        ob_start();
        include("Views/Services/Export/ExamSchedule/ExamSchedule.php");
        $view = ob_get_clean();

        ExportService::exportFile($view, "Prüfungsplan", "A3");
    }

    static function exportFile($view, $pdfName, $size = "A4", $orientation = "portrait") {
        $pdf = new Dompdf();
        $pdf->loadHtml($view);

        $pdf->setPaper($size, $orientation);

        $pdf->render();

        $pdf->stream($pdfName, array("Attachment" => 0));
    }
}