<?php
    use Modulist\Models\ExamModel;
    use Modulist\Models\FieldModel;
    use Modulist\Models\ModuleModel;
use Modulist\Services\ValidationService;

?>
<style>
    body {
        font-size: 10px;
    }
    td {
        border: 1px solid black;
    }
    th {
        background-color: #99ccff;
    }
    .background-1 {
        background-color: #ffff00;
    }
</style>
<table>
    <tr>
        <th rowspan="2">Modulcode</th>
        <th rowspan="2">Modulname</th>
        <th rowspan="2">Semester</th>
        <th rowspan="2">Credits</th>
        <th rowspan="2">Zulassungsvorraussetzung</th>
        <th colspan="3">Prüfungsleistung</th>
        <th rowspan="2">Gewichtung der Modulnote für die Gesamtnote</th>
    </tr>
    <tr>
        <th>Art der PL</th>
        <th>Dauer/Umfang PL</th>
        <th>Gewichtung für die Modulnote in %</th>
    </tr>
    <?php
        if($compulsoryCourseModules->num_rows) {
            $compulsoryCourseModules = mysqli_fetch_all($compulsoryCourseModules, MYSQLI_ASSOC);
            $compulsoryCourseModules = array_filter($compulsoryCourseModules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
            if(count($compulsoryCourseModules)) {
            ?>
                <tr>
                    <td colspan="9" class="background-1">Pflichtmodule Studiengang <?php echo $courseName;?></td>
                </tr>
                <?php
                foreach($compulsoryCourseModules as $module) {
                    printModule($module);
                }
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getCompulsoryModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
                $modules = mysqli_fetch_all($modules, MYSQLI_ASSOC);
                $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
                if(count($modules)) {
                ?>
                    <tr>
                        <td colspan="9" class="background-1">Pflichtmodule Studienrichtung <?php echo $field["name"];?></td>
                    </tr>
                    <?php
                    foreach($modules as $module) {
                        printModule($module);
                    }
                }
            }
        }

        if($electiveCourseModules->num_rows) {
            $electiveCourseModules = mysqli_fetch_all($electiveCourseModules, MYSQLI_ASSOC);
            $electiveCourseModules = array_filter($electiveCourseModules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
            if(count($electiveCourseModules)) {
            ?>
                <tr>
                    <td colspan="9" class="background-1">Wahlpflichtmodule Studiengang <?php echo $courseName;?></td>
                </tr>
                <?php
                foreach($electiveCourseModules as $module) {
                    printModule($module);
                }
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getElectiveModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
                $modules = mysqli_fetch_all($modules, MYSQLI_ASSOC);
                $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
                if(count($modules)) {
                ?>
                    <tr>
                        <td colspan="9" class="background-1">Wahlpflichtmodule Studienrichtung <?php echo $field["name"];?></td>
                    </tr>
                    <?php
                    foreach($modules as $module) {
                        printModule($module);
                    }
                }
            }
        }

        if($practicalCourseModules->num_rows) {
            $practicalCourseModules = mysqli_fetch_all($practicalCourseModules, MYSQLI_ASSOC);
            $practicalCourseModules = array_filter($practicalCourseModules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
            if(count($practicalCourseModules)) {
            ?>
                <tr>
                    <td colspan="9" class="background-1">Praxismodule Studiengang <?php echo $courseName;?></td>
                </tr>
                <?php
                foreach($practicalCourseModules as $module) {
                    printModule($module);
                }
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getPracticalModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
                $modules = mysqli_fetch_all($modules, MYSQLI_ASSOC);
                $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForExamSchedule($item["ID"]);});
                if(count($modules)) {
                ?>
                    <tr>
                        <td colspan="9" class="background-1">Praxismodule Studienrichtung <?php echo $field["name"];?></td>
                    </tr>
                    <?php
                    foreach($modules as $module) {
                        printModule($module);
                    }
                }
            }
        }
    ?>
</table>
<?php
function printModule($module) {
?>
    <tr>
        <td rowspan="<?php echo $module["duration"];?>"><?php echo $module["code"];?></td>
        <td rowspan="<?php echo $module["duration"];?>"><?php echo $module["name"];?></td>
        <?php
        for($i = 1; $i <= $module["duration"]; $i++) {
            if($i > 1) {
                echo "</tr><tr>";
            }
            $exams = ExamModel::getExamsByModuleIDAndSemester($module["ID"], $module["semester"] + $i - 1);
            $examSemester = "";
            $examCredits = "";
            $examRequirement = "";
            $examType = "";
            $examDuration = "";
            $examWeighting = "";
            $examOverallWeighting = "";
            if($exams->num_rows) {
                foreach($exams as $exam) {
                    $examSemester = $exam["examSemester"];
                    $examCredits = ($module["credits"] * $exam["examWeighting"] / 100);
                    $examRequirement = $module["examRequirement"];
                    $examType .= getExamTypeString($exam["examType"]) . "<br>";
                    if(!empty($exam["examDuration"])) {
                        $examDuration .= $exam["examDuration"] . " min<br>";
                    }
                    else {
                        $examDuration .= $exam["examCircumference"] . "<br>";
                    }
                    $examWeighting .= $exam["examWeighting"] . "<br>";
                    $examOverallWeighting = $module["overallGradeWeighting"];
                }
            }
            ?>
            <td><?php echo $examSemester;?></td>
            <td><?php echo $examCredits;?></td>
            <td><?php echo $examRequirement;?></td>
            <td><?php echo $examType;?></td>
            <td><?php echo $examDuration;?></td>
            <td><?php echo $examWeighting;?></td>
            <td><?php echo $examOverallWeighting;?></td>
        <?php
        }
        ?>
    </tr>
<?php
}
function getExamTypeString($examType) {
    switch($examType) {
        case 1:
            return "K"; // Klausurarbeit
            break;
        case 2:
            return "MP"; // Mündliche Prüfung
            break;
        case 3:
            return "MF"; // Mündliches Fachgespräch
            break;
        case 4:
            return "PR"; // Präsentation
            break;
        case 5:
            return "PA"; // Projektarbeit
            break;
        case 6:
            return "SE"; // Seminararbeit
            break;
        case 7:
            return "PE"; // Programmentwurf
            break;
        case 8:
            return "PC"; // Prüfung am Computer
            break;
        case 9:
            return "PP"; // Praktische Prüfung
            break;
        case 10:
            return "BTh"; // Bachelorthesis
            break;
        case 11:
            return "V"; // Verteidigung
            break;
    }
}