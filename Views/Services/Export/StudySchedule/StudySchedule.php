<?php
    use Modulist\Models\ExamModel;
    use Modulist\Models\FieldModel;
    use Modulist\Models\ModuleModel;
 ?>
<h1>Studienablaufplan</h1>
<style>
    h1 {
        font-family: Arial, Helvetica, sans-serif;
    }
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        border: 3px solid black;
    }
    td, th {
        border: 1px solid black;
    }
    th {
        background-color: #09497d;
        color: white;
    }
    .background-1 {
        background-color: #009ee3;
        text-align: center;
    }
    .background-2 {
        background-color: #66c5ee;
        text-align: center;
    }
    .background-3 {
        background-color: #09e6f8;
        text-align: center;
    }
    .background-4 {
        background-color: #c0c0c0;
        
    }
    .black {
        color: black;
    }
    .align_center {
        text-align: center;
    }
    .header th{
        border: 3px solid black;
    }
</style>
<table>
    <tr class="header">
        <th colspan="2" rowspan="2">Studieninhalte</th>
        <th colspan="12">Einordnung der Module in den Gesamtstudienplan</th>
        <th colspan="4" rowspan="2" class="background-1">Workload</th>
        <th rowspan="4">ECTS</th>
        <th rowspan="4">Art + Dauer der Prüfungsleistung</th>
        <th rowspan="4">Gewichtung der Prüfungsleistung für Modulnote(*)</th>
    </tr>
    <tr class="header">
        <th colspan="12">Semester</th>
    </tr>
    <tr class="header">
        <th rowspan="2">Modulcode</th>
        <th rowspan="2">Modulbezeichnung</th>
        <th colspan="2">1</th>
        <th colspan="2">2</th>
        <th colspan="2">3</th>
        <th colspan="2">4</th>
        <th colspan="2">5</th>
        <th colspan="2">6</th>
        <th rowspan="2" class="background-1 black">LVS</th>
        <th rowspan="2" class="background-2 black">evL Theorie</th>
        <th rowspan="2" class="background-3 black">evL Praxis</th>
        <th rowspan="2">gesamt</th>
    </tr>
    <tr class="header">
        <th>LVS</th>
        <th>PL</th>
        <th>LVS</th>
        <th>PL</th>
        <th>LVS</th>
        <th>PL</th>
        <th>LVS</th>
        <th>PL</th>
        <th>LVS</th>
        <th>PL</th>
        <th>LVS</th>
        <th>PL</th>
    </tr>
    <?php
        if($compulsoryCourseModules->num_rows) {
        ?>
            <tr>
                <td colspan="21" class="background-4">Pflichtmodule Studiengang <?php echo $courseName;?></td>
            </tr>
            <?php
            foreach($compulsoryCourseModules as $module) {
                printModule($module);
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getCompulsoryModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
            ?>
                <tr>
                    <td colspan="21" class="background-4">Pflichtmodule Studienrichtung <?php echo $field["name"];?></td>
                </tr>
                <?php
                foreach($modules as $module) {
                    printModule($module);
                }
            }
        }

        if($electiveCourseModules->num_rows) {
        ?>
            <tr>
                <td colspan="21" class="background-4">Wahlpflichtmodule Studiengang <?php echo $courseName;?></td>
            </tr>
            <?php
            foreach($electiveCourseModules as $module) {
                printModule($module);
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getElectiveModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
            ?>
                <tr>
                    <td colspan="21" class="background-4">Wahlpflichtmodule Studienrichtung <?php echo $field["name"];?></td>
                </tr>
                <?php
                foreach($modules as $module) {
                    printModule($module);
                }
            }
        }

        if($practicalCourseModules->num_rows) {
        ?>
            <tr>
                <td colspan="21" class="background-4">Praxismodule Studiengang <?php echo $courseName;?></td>
            </tr>
            <?php
            foreach($practicalCourseModules as $module) {
                printModule($module);
            }
        }
        foreach($resultFields as $field) {
            $modules = ModuleModel::getPracticalModulesByFieldExceptLocked($field["ID"]);
            if($modules->num_rows) {
            ?>
                <tr>
                    <td colspan="21" class="background-4">Praxismodule Studienrichtung <?php echo $field["name"];?></td>
                </tr>
                <?php
                foreach($modules as $module) {
                    printModule($module);
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
            $lvs = ModuleModel::getLVSByModuleIDAndSemster($module["ID"], $module["semester"] + $i - 1);
            $evlTheory = ModuleModel::getEVLTheoryByModuleIDAndSemester($module["ID"], $module["semester"]  + $i - 1);
            $evlPractise = ModuleModel::getEVLPractiseByModuleIDAndSemester($module["ID"], $module["semester"]  + $i - 1);

            $exams = ExamModel::getExamsByModuleIDAndSemester($module["ID"], $module["semester"] + $i - 1);
            $examString = "";
            $examString2 = "";
            $examString3 = "";
            if($exams->num_rows) {
                foreach($exams as $exam) {
                    $examString .= getExamTypeString($exam["examType"]) . "<br>";
                    if(!empty($exam["examDuration"])) {
                        $examString2 .= getExamTypeString($exam["examType"]) . " " . $exam["examDuration"] . "<br>";
                    }
                    else {
                        $examString2 .= getExamTypeString($exam["examType"]) . " " . $exam["examCircumference"] . "<br>";
                    }
                    $examString3 .= $exam["examWeighting"] . "%" . "<br>";
                }
            }
            ?>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 1) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 1) { echo $examString;}?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 2) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 2) { echo $examString;}?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 3) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 3) { echo $examString;}?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 4) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 4) { echo $examString;}?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 5) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 5) { echo $examString;}?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 6) { echo $lvs;};?></td>
            <td class="align_center"><?php if($module["semester"] + $i - 1 == 6) { echo $examString;}?></td>
            

            <td class="background-1"><?php echo $lvs;?></td>
            <td class="background-2"><?php echo $evlTheory;?></td>
            <td class="background-3"><?php echo $evlPractise;?></td>

            <td class="align_center"><?php echo $module["credits"] * 30;?></td>
            <td class="align_center"><?php echo $module["credits"];?></td>

            <td class="align_center"><?php echo $examString2;?></td>
            <td class="align_center"><?php echo $examString3;?></td>
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