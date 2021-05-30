<h1>Studienablaufplan</h1>
<style>
    td {
        border: 1p solid black;
    }
</style>
<table>
    <tr>
        <td colspan="2" rowspan="2">Studieninhalte</td>
        <td colspan="12">Einordnung der Module in den Gesamtstudienplan</td>
        <td colspan="4" rowspan="2">Workload</td>
        <td rowspan="4">ECTS</td>
        <td rowspan="4">Art + Dauer der Prüfungsleistung</td>
        <td rowspan="4">Gewichtung der Prüfungsleistung für Modulnote(*)</td>
    </tr>
    <tr>
        <td colspan="12">Semester</td>
    </tr>
    <tr>
        <td rowspan="2">Modulcode</td>
        <td rowspan="2">Modulbezeichnung</td>
        <td colspan="2">1</td>
        <td colspan="2">2</td>
        <td colspan="2">3</td>
        <td colspan="2">4</td>
        <td colspan="2">5</td>
        <td colspan="2">6</td>
        <td rowspan="2">LVS</td>
        <td rowspan="2">evL Theorie</td>
        <td rowspan="2">evL Praxis</td>
        <td rowspan="2">gesamt</td>
    </tr>
    <tr>
        <td>LVS</td>
        <td>PL</td>
        <td>LVS</td>
        <td>PL</td>
        <td>LVS</td>
        <td>PL</td>
        <td>LVS</td>
        <td>PL</td>
        <td>LVS</td>
        <td>PL</td>
        <td>LVS</td>
        <td>PL</td>
    </tr>
    <tr>
        <td colspan="21">Pflichtmodule Studiengang Informatiostechnologie</td>
    </tr>
    <?php
        function getExamTypeString($examType) {
            switch($examType) {
                case 1:
                    return "K"; // Klausurarbeit
                    break;
                case 2:
                    return ""; // Mündliche Prüfung
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
                case 7:
                    return ""; // Seminararbeit
                    break;
                case 8:
                    return "PE"; // Programmentwurf
                    break;
                case 9:
                    return ""; // Praktische Prüfung
                    break;
                case 10:
                    return "BTh"; // Bachelorthesis
                    break;
                case 11:
                    return "V"; // Verteidigung
                    break;
            }
        }
        use Modulist\Models\ExamModel;
        use Modulist\Models\FieldModel;
        use Modulist\Models\ModuleModel;

        foreach($courseModules as $module) {
            $exams = ExamModel::getExamsByModuleID($module["ID"]);
            $examCount = $exams->num_rows;
        ?>
            <tr>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["code"];?></td>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["name"];?></td>
            	
                <?php
                foreach($exams as $exam) {
                    $lvs = ModuleModel::getLVSByModuleIDAndSemster($module["ID"], $exam["examPeriod"]);
                    $evlTheory = ModuleModel::getEVLTheoryByModuleIDAndSemester($module["ID"], $exam["examPeriod"]);
                    $evlPractise = ModuleModel::getEVLPractiseByModuleIDAndSemester($module["ID"], $exam["examPeriod"]);
                    ?>
                    <td><?php if($exam["examPeriod"] == 1) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 1) { echo getExamTypeString($exam["examType"]);}?></td>
                    <td><?php if($exam["examPeriod"] == 2) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 2) { echo getExamTypeString($exam["examType"]);}?></td>
                    <td><?php if($exam["examPeriod"] == 3) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 3) { echo getExamTypeString($exam["examType"]);}?></td>
                    <td><?php if($exam["examPeriod"] == 4) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 4) { echo getExamTypeString($exam["examType"]);}?></td>
                    <td><?php if($exam["examPeriod"] == 5) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 5) { echo getExamTypeString($exam["examType"]);}?></td>
                    <td><?php if($exam["examPeriod"] == 6) { echo $lvs;};?></td>
                    <td><?php if($exam["examPeriod"] == 6) { echo getExamTypeString($exam["examType"]);}?></td>

                    <td><?php echo $lvs;?></td>
                    <td><?php echo $evlTheory;?></td>
                    <td><?php echo $evlPractise;?></td>
                <?php
                }
                ?>

                <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"] * 30;?></td>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"];?></td>

                <?php
                foreach($exams as $exam) {
                    ?>
                    <td><?php echo getExamTypeString($exam["examType"]) . " " . $exam["examDuration"];?></td>
                    <td><?php echo $exam["examWeighting"] . "%";?></td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        foreach($fieldModules as $id => $modules) {
            $fieldName = FieldModel::getFieldByID($id)->name;
            ?>
            <tr>
                <td colspan="21">Pflichtmodule Studienrichtung <?php echo $fieldName;?></td>
            </tr>
            <?php
            foreach($modules as $module) {
                $exams = ExamModel::getExamsByModuleID($module["ID"]);
                $examCount = $exams->num_rows;
            ?>
                <tr>
                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["code"];?></td>
                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["name"];?></td>
                    <?php
                    foreach($exams as $exam) {
                        $lvs = ModuleModel::getLVSByModuleIDAndSemster($module["ID"], $exam["examPeriod"]);
                        $evlTheory = ModuleModel::getEVLTheoryByModuleIDAndSemester($module["ID"], $exam["examPeriod"]);
                        $evlPractise = ModuleModel::getEVLPractiseByModuleIDAndSemester($module["ID"], $exam["examPeriod"]);
                        ?>
                        <td><?php if($exam["examPeriod"] == 1) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 1) { echo getExamTypeString($exam["examType"]);}?></td>
                        <td><?php if($exam["examPeriod"] == 2) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 2) { echo getExamTypeString($exam["examType"]);}?></td>
                        <td><?php if($exam["examPeriod"] == 3) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 3) { echo getExamTypeString($exam["examType"]);}?></td>
                        <td><?php if($exam["examPeriod"] == 4) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 4) { echo getExamTypeString($exam["examType"]);}?></td>
                        <td><?php if($exam["examPeriod"] == 5) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 5) { echo getExamTypeString($exam["examType"]);}?></td>
                        <td><?php if($exam["examPeriod"] == 6) { echo $lvs;};?></td>
                        <td><?php if($exam["examPeriod"] == 6) { echo getExamTypeString($exam["examType"]);}?></td>

                        <td><?php echo $lvs;?></td>
                        <td><?php echo $evlTheory;?></td>
                        <td><?php echo $evlPractise;?></td>
                    <?php
                    }
                    ?>
                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"] * 30;?></td>

                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"];?></td>

                    <?php
                    foreach($exams as $exam) {
                        ?>
                        <td><?php echo getExamTypeString($exam["examType"]) . " " . $exam["examDuration"];?></td>
                        <td><?php echo $exam["examWeighting"] . "%";?></td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        }
        $error = error_get_last();
        echo "<pre>";
        print_r($error);
        echo "</pre>";
    ?>
</table>