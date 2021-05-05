<?php

namespace Modulist;

use Modulist\Controllers\AjaxController;
use Modulist\Controllers\ExportController;
use Modulist\Controllers\ModuleController;
use Modulist\Controllers\StudyManagementController;

// Controllers
include("Controllers/ModuleController.php");
include("Controllers/ExportController.php");
include("Controllers/AjaxController.php");
include("Controllers/StudyManagementController.php");

// Models
include("Models/ModuleModel.php");
include("Models/CourseModel.php");
include("Models/FieldModel.php");

//Services
include("Services/DatabaseService.php");
include("Services/ModuleService.php");
include("Services/ExportService.php");
include("Services/FieldService.php");
include("Services/CourseService.php");

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
            case "studymanagement":
                new StudyManagementController();
                break;
            case "ajax":
                new AjaxController();
                break;
        }
    }
}
$mainObject = new MainController();