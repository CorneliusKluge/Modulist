<?php

namespace Modulist\Controllers;

class ModuleController {
    function __construct() {
        ob_start();
        include("Views/Module/ModuleTemplate.php");
        $template = ob_end_clean();

        $template = sprintf($template,
                            $this->getModuleAddView()
                            );

        echo $template;
    }
    
    function getModuleAddView() {
        ob_start();
        if(isset($_POST["module_add_submit"])) {

        }
        $output = ob_end_clean();

        ob_start();
        include("Views/Module/ModuleAddView.php");
        $view = ob_end_clean();

        $view = sprintf($view, $output);

        return $view;
    }
}