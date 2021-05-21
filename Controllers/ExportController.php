<?php

namespace Modulist\Controllers;

use Modulist\Services\ExportService;

class ExportController {
    function __construct() {
        ob_start();
        include("Views/Export/ExportTemplate.php");
        $template = ob_get_clean();

        $template = sprintf($template, $this->getModuleManualExportView(), "", "");

        //echo $template;

        ExportService::exportModuleManual(1, "en");
    }

    function getModuleManualExportView() {

    }
}