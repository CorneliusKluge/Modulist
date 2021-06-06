<?php

namespace Modulist\Controllers;

class StudyManagementController {
    function __construct() {
        ob_start();
        include("Views/StudyManagement/StudyManagementTemplate.php");
        $template = ob_get_clean();

        echo $template;
    }
}