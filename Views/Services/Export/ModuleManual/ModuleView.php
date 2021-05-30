<?php

use Modulist\Models\CategoryModel;
use Modulist\Models\ExamModel;
use Modulist\Models\LiteratureModel;

if($result->num_rows) {
    foreach($result as $module) {
    ?>
    <div class="module">
        <h2><?php echo $module["name"];?></h2>
        <div>
            <?php echo $module["summary"];?>
        </div>
        <div class="columns-2">
            <div>
                <h2>Modulcode</h2>
                <?php echo $module["code"];?>
            </div>
            <div>
                <h2>Modultyp</h2>
                <?php echo $module["type"];?>
            </div>
            <div>
                <h2>Belegung gemäß Studienablaufplan</h2>
                <?php echo $module["semester"];?>. Semester
            </div>
            <div>
                <h2>Dauer</h2>
                <?php echo $module["duration"];?> Semester
            </div>
            <div>
                <h2>Credits</h2>
                <?php echo $module["credits"];?>
            </div>
            <div>
                <h2>Verwendbarkeit</h2>
                <?php echo $module["usability"];?>
            </div>
        </div>
        <div>
            <h2>Zulassungsvoraussetzungen für die Modulprüfung</h2>
            <?php echo $module["examRequirement"];?>
        </div>
        <div>
            <h2>Voraussetzungen für die Teilnahme am Modul</h2>
            <?php echo $module["participationRequirement"];?>
        </div>
        <div>
            <h2>Lerninhalte</h2>
            <?php echo $module["studyContent"];?>
        </div>
        <div>
            <h2>Lernergebnisse</h2>
            <div>
                <h3>Wissen und Verstehen</h3>
                <div>
                    <h4>Wissensverbreiterung</h4>
                    <?php echo $module["knowledgeBroadening"];?>
                </div>
                <div>
                    <h4>Wissensvertiefung</h4>
                    <?php echo $module["knowledgeDeepening"];?>
                </div>
            </div>
            <div>
                <h3>Können/Kompetenz</h3>
                <div>
                    <h4>Instrumentale Kompetenz</h4>
                    <?php echo $module["instrumentalCompetence"];?>
                </div>
                <div>
                    <h4>Systemische Kompetenz</h4>
                    <?php echo $module["systemicCompetence"];?>
                </div>
                <div>
                    <h4>Kommunikative Kompetenz</h4>
                    <?php echo $module["communicativeCompetence"];?>
                </div>
            </div>
        </div>
        <div>
            <h2>Lehr- und Lernformen/Workload</h2>
            <table>
                <tr>
                    <td>Lehr- und Lernformen</td>
                    <td>Workload (h)</td>
                </tr>
                <tr>
                    <td>Präsenzveranstaltungen</td>
                    <td><?php echo $module["presenceCreditHours"];?></td>
                </tr>
                <?php
                    $workload = 0;

                    $resultPresence = CategoryModel::getPresenceCategoriesByModuleID($module["ID"]);

                    if($resultPresence->num_rows) {
                        foreach($resultPresence as $category) {
                            $workload += $category["workload"];
                        ?>
                        <tr>
                            <td><?php echo $category["name"];?></td>
                            <td><?php echo $category["workload"];?></td>
                        </tr>
                        <?php
                        }
                    }
                ?>
                <tr>
                    <td>Eigenverantwortliches Lernen</td>
                    <td><?php echo $module["selfLearningCreditHours"];?></td>
                </tr>
                <?php
                    $resultNonPresence = CategoryModel::getTheoryCategoriesByModuleID($module["ID"]);

                    if($resultNonPresence->num_rows) {
                        foreach($resultNonPresence as $category) {
                            $workload += $category["workload"];
                        ?>
                        <tr>
                            <td><?php echo $category["name"];?></td>
                            <td><?php echo $category["workload"];?></td>
                        </tr>
                        <?php
                        }
                    }
                ?>
                <tr>
                    <td>Workload Gesamt</td>
                    <td><?php echo $workload;?></td>
                </tr>
            </table>
        </div>
        <div>
            <h2>Prüfungsleistungen (PL)</h2>
            <table>
                <tr>
                    <th>Art der PL</th>
                    <th>Dauer (min)</th>
                    <th>Umfang (Seiten)</th>
                    <th>Prüfungszeitraum</th>
                    <th>Gewichtung (%)</th>
                </tr>
                <?php
                $resultExams = ExamModel::getExamsByModuleID($module["ID"]);

                if($resultExams->num_rows) {
                    foreach($resultExams as $exam) {
                    ?>
                        <tr>
                            <td><?php echo $exam["examType"];?></td>
                            <td><?php echo $exam["examDuration"];?></td>
                            <td><?php echo $exam["examCircumference"];?></td>
                            <td><?php echo $exam["examPeriod"];?></td>
                            <td><?php echo $exam["examWeighting"];?></td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </table>
        </div>
        <div>
            <h2>Modulverantwortlicher</h2>
            <?php echo $module["responsibleName"];?><br>
            <?php echo $module["responsibleEmail"];?>
        </div>
        <div>
            <h2>Unterrichtssprache</h2>
            <?php echo $module["lectureLanguage"];?>
        </div>
        <div>
            <h2>Angebotsfrequenz</h2>
            <?php echo $module["frequency"];?>
        </div>
        <div>
            <h2>Medien/Arbeitsmaterialien</h2>
            <?php echo $module["media"];?>
        </div>
        <div>
            <h2>Literatur</h2>
            <div>
                <h3>Basisliteratur (prüfungsrelevant)</h3>
                <?php echo $module["basicLiteraturePreNote"];?>
                <?php
                    $resultBasicLiterature = LiteratureModel::getBasicLiteratureByModuleID($module["ID"]);

                    if($resultBasicLiterature->num_rows) {
                        foreach($resultBasicLiterature as $basicLiterature) {
                            $str = "";
                            $str .= $basicLiterature["authors"];

                            if(!empty($basicLiterature["year"])) {
                                $str .= ", " . $basicLiterature["year"];
                            }
                            if(!empty($basicLiterature["title"])) {
                                $str .= ", " . $basicLiterature["title"];
                            }
                            if(!empty($basicLiterature["edition"])) {
                                $str .= ", " . $basicLiterature["edition"];
                            }
                            if(!empty($basicLiterature["place"])) {
                                $str .= ", " . $basicLiterature["place"];
                            }
                            if(!empty($basicLiterature["publisher"])) {
                                $str .= ", " . $basicLiterature["publisher"];
                            }
                            if(!empty($basicLiterature["isbn"])) {
                                $str .= ", " . $basicLiterature["isbn"];
                            }
                            echo $str;
                        }
                    }
                ?>
                <?php echo $module["basicLiteraturePostNote"];?>
            </div>
            <div>
                <h3>Vertiefende Literatur</h3>
                <?php echo $module["deepeningLiteraturePreNote"];?>
                <?php
                    $resultBasicLiterature = LiteratureModel::getDeepeningLiteratureByModuleID($module["ID"]);

                    if($resultBasicLiterature->num_rows) {
                        foreach($resultBasicLiterature as $basicLiterature) {
                            $str = "";
                            $str .= $basicLiterature["authors"];

                            if(!empty($basicLiterature["year"])) {
                                $str .= ", " . $basicLiterature["year"];
                            }
                            if(!empty($basicLiterature["title"])) {
                                $str .= ", " . $basicLiterature["title"];
                            }
                            if(!empty($basicLiterature["edition"])) {
                                $str .= ", " . $basicLiterature["edition"];
                            }
                            if(!empty($basicLiterature["place"])) {
                                $str .= ", " . $basicLiterature["place"];
                            }
                            if(!empty($basicLiterature["publisher"])) {
                                $str .= ", " . $basicLiterature["publisher"];
                            }
                            if(!empty($basicLiterature["isbn"])) {
                                $str .= ", " . $basicLiterature["isbn"];
                            }
                            echo $str;
                        }
                    }
                ?>
                <?php echo $module["deepeningLiteraturePostNote"];?>
            </div>
        </div>
    </div>
    <?php
    }
}

