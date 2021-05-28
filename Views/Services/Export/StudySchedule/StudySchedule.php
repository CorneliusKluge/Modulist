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
    
        use Modulist\Models\ExamModel;
        use Modulist\Models\FieldModel;

        foreach($courseModules as $module) {
            $exams = ExamModel::getExamsByModuleID($module["ID"]);
            $examCount = $exams->num_rows;
        ?>
            <tr>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["code"];?></td>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["name"];?></td>

                <td><?php echo "id: " . $module["ID"];?></td>
                <td><?php
                        echo "<pre>";
                        //print_r($exams);
                        echo "</pre>";
                ?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>

                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td><?php echo $module["code"];?></td>
                <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"] * 30;?></td>

                <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"];?></td>
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

                    <td><?php echo "id: " . $module["ID"];?></td>
                    <td><?php
                            echo "<pre>";
                            //print_r($modules);
                            echo "</pre>";
                    ?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>

                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"] * 30;?></td>

                    <td rowspan="<?php echo $examCount;?>"><?php echo $module["credits"];?></td>
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