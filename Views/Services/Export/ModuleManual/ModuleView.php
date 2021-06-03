<?php

use Modulist\Models\CategoryModel;
use Modulist\Models\ExamModel;
use Modulist\Models\LiteratureModel;

if($result->num_rows) {
    foreach($result as $module) {
    ?>
    <span class="page_break"></span>
    <div class="module">
        <h2 class="top_headline"><?php echo $module["name"];?></h2>
        <div>
            <?php echo $module["summary"];?>
        </div>
        <div class="columns-2">
            <table>
                <tr>
                    <td class="td_first_column">
                        <h2>Modulcode</h2>
                        <?php echo $module["code"];?>
                    </td>
                    <td>
                        <h2>Modultyp</h2>
                        <?php echo $module["type"];?>
                    </td>
                </tr>
                <tr>
                    <td class="td_first_column"> 
                        <h2>Belegung gemäß Studienablaufplan</h2>
                        <?php echo $module["semester"];?>. Semester
                    </td>
                    <td>
                        <h2>Dauer</h2>
                        <?php echo $module["duration"];?> Semester
                    </td>
                </tr>
                <tr>
                    <td class="td_first_column">
                        <h2>Credits</h2>
                        <?php echo $module["credits"];?>
                    </td>
                    <td>
                        <h2>Verwendbarkeit</h2>
                        <?php echo $module["usability"];?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row_item">
            <h2>Zulassungsvoraussetzungen für die Modulprüfung</h2>
            <div><?php echo $module["examRequirement"];?></div>
        </div>
        <div class="row_item">
            <h2>Voraussetzungen für die Teilnahme am Modul</h2>
            <div><?php echo $module["participationRequirement"];?></div>
        </div>
        <div class="row_item">
            <h2>Lerninhalte</h2>
            <div><?php echo $module["studyContent"];?></div>
        </div>
        <div>
            <div class="row_item">
                <h2>Lernergebnisse</h2>
            </div>
            <div class="row_item">
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
            <div class="row_item">
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
        <div class="row_item">
            <h2>Lehr- und Lernformen/Workload</h2>
            <table class="workload_table">
                <tr class="heading_1">
                    <td>Lehr- und Lernformen</td>
                    <td class="right_column">Workload (h)</td>
                </tr>
                <tr>
                    <td class="heading_2">Präsenzveranstaltungen</td>
                    <td class="heading_3" class="right_column"><?php echo $module["presenceCreditHours"];?></td>
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
                            <td class="right_column"><?php echo $category["workload"];?></td>
                        </tr>
                        <?php
                        }
                    }
                ?>
                <tr>
                    <td class="heading_2">Eigenverantwortliches Lernen</td>
                    <td class="heading_3" class="right_column"><?php echo $module["selfLearningCreditHours"];?></td>
                </tr>
                <?php
                    $resultNonPresence = CategoryModel::getTheoryCategoriesByModuleID($module["ID"]);

                    if($resultNonPresence->num_rows) {
                        foreach($resultNonPresence as $category) {
                            $workload += $category["workload"];
                        ?>
                        <tr>
                            <td><?php echo $category["name"];?></td>
                            <td class="right_column"><?php echo $category["workload"];?></td>
                        </tr>
                        <?php
                        }
                    }
                ?>
                <tr class="heading_1">
                    <td>Workload Gesamt</td>
                    <td class="right_column"><?php echo $workload;?></td>
                </tr>
            </table>
        </div>
        <div class="row_item">
            <h2>Prüfungsleistungen (PL)</h2>
            <table class="exam_table">
                <tr  class="heading_1">
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
        <div class="row_item">
            <h2>Modulverantwortlicher</h2>
            <div>
                <?php echo $module["responsibleName"];?><br>
                <?php echo $module["responsibleEmail"];?>
            </div>
        </div>
        <div class="row_item">
            <h2>Unterrichtssprache</h2>
            <div>
                <?php echo $module["lectureLanguage"];?>
            </div>
        </div>
        <div class="row_item">
            <h2>Angebotsfrequenz</h2>
            <div>
                <?php echo $module["frequency"];?>
            </div>
        </div>
        <div class="row_item">
            <h2>Medien/Arbeitsmaterialien</h2>
            <div>
                <?php echo $module["media"];?>
            </div>
        </div>
        <div class="row_item">
            <h2>Literatur</h2>
            <div>
                <h3>Basisliteratur (prüfungsrelevant)</h3>
                <div>
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
            </div>
            <div>
                <h3>Vertiefende Literatur</h3>
                <div>
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
    </div>
    <?php
    }
}

