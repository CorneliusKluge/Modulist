<?php

namespace Modulist\Services;

use Dompdf\Dompdf;
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

            ExportService::exportFile($view, "Modulhandbuch");
        }
        else {
            ob_start();
            $result = ModuleModel::getAllModulesOfCourse($courseID);
            include("Views/Services/Export/ModuleManual/ModuleViewEN.php");
            $view = ob_get_clean();

            ExportService::exportFile($view, "ModuleManual");
        }
    }

    static function exportFile($view, $pdfName) {
        $pdf = new Dompdf();
        $pdf->loadHtml($view);

        $pdf->setPaper("A4");

        $pdf->render();

        $pdf->stream($pdfName, array("Attachment" => 0));
    }
}