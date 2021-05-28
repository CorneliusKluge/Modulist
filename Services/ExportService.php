<?php

namespace Modulist\Services;

use Dompdf\Dompdf;
use Modulist\Models\FieldModel;
use Modulist\Models\ModuleModel;

class ExportService {
    static function exportModuleManual($courseID, $lang) {
        if($lang == "de") {
            ob_start();
            include("Views/Services/Export/ModuleManual/ManualTemplate.php");
            $template = ob_get_clean();

            ob_start();
            $result = ModuleModel::getAllModulesOfCourse($courseID);
            include("Views/Services/Export/ModuleManual/IntroView.php");
            include("Views/Services/Export/ModuleManual/ModuleView.php");
            $view = ob_get_clean();

            $template = sprintf($template, $view);

            ExportService::exportFile($template, "Modulhandbuch");
        }
        else {
            ob_start();
            $result = ModuleModel::getAllModulesOfCourse($courseID);
            include("Views/Services/Export/ModuleManual/ModuleViewEN.php");
            $view = ob_get_clean();

            ExportService::exportFile($view, "ModuleManual");
        }
    }
    static function exportStudySchedule($courseID) {
        $courseModules = mysqli_fetch_all(ModuleModel::getAllModulesOfCourse($courseID), MYSQLI_ASSOC);
        $resultFields = FieldModel::getFieldsByCourseID($courseID);

        if($resultFields->num_rows) {
            foreach($resultFields as $field) {
                $fieldModules[$field["ID"]] = mysqli_fetch_all(ModuleModel::getAllModulesOfField($field["ID"]), MYSQLI_BOTH);
            }
        }

        /*$cmd = 'return array_uintersect_uassoc($courseModules';
        foreach($fieldModules as $key => $value) {
            $cmd .= ', $fieldModules[' . $key . ']';
        }
        $cmd .= ', function($arr1, $arr2) {return $arr1 == $arr2;}, "strcasecmp");';

        $courseModules = eval($cmd);*/
        //$courseModules = array_uintersect_uassoc($courseModules, $fieldModules[0], function($arr1, $arr2) {return $arr1 == $arr2;}, "strcasecmp");

        $courseModules = array_uintersect_assoc($courseModules, ...$fieldModules, ...[function($arr1, $arr2) {return $arr1 == $arr2;}]);
        
        foreach($fieldModules as $key => $value) {
            $fieldModules[$key] = array_uintersect_assoc($fieldModules[$key], $courseModules, function($arr1, $arr2) {return $arr1 != $arr2;});
        }

        /*echo "<hr><pre>";
        print_r($courseModules);
        print_r($fieldModules);
        echo "</pre>";
        exit;*/
        

        ob_start();
        include("Views/Services/Export/StudySchedule/StudySchedule.php");
        $view = ob_get_clean();

        ExportService::exportFile($view, "Studienablaufplan", "A3", "landscape");
    }
    static function exportExamSchedule($courseID) {
        ob_start();
        include("Views/Services/Export/ExamSchedule/ExamSchedule.php");
        $view = ob_get_clean();

        ExportService::exportFile($view, "Prüfungsplan");
    }

    static function exportFile($view, $pdfName, $size = "A4", $orientation = "portrait") {
        $pdf = new Dompdf();
        $pdf->loadHtml($view);

        $pdf->setPaper($size, $orientation);

        $pdf->render();

        $pdf->stream($pdfName, array("Attachment" => 0));
    }
}