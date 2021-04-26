<?php

namespace Modulist;

use Modulist\Controllers\ExportController;
use Modulist\Controllers\ModuleController;

// Controllers
include("Controllers/ModuleController.php");
include("Controllers/ExportController.php");

// Models
include("Models/ModuleModel.php");

//Services
include("Services/DatabaseService.php");
include("Services/ModuleService.php");
include("Services/ExportService.php");

class MainController {
    function __construct() {
        $subcontroller = $_GET["subcontroller"] ?? null;

        switch($subcontroller) {
            case "module":
                new ModuleController();
                break;
            case "export":
                new ExportController();
                break;
        }
    }
}
$mainObject = new MainController();