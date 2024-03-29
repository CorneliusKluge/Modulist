<?php

use Modulist\Models\CategoryModel;
use Modulist\Models\ExamModel;
use Modulist\Models\LiteratureModel;
use Modulist\Models\ModuleModel;
use Modulist\Services\ValidationService;

if($compulsoryCourseModules->num_rows) {
    $compulsoryCourseModules = mysqli_fetch_all($compulsoryCourseModules, MYSQLI_ASSOC);
    $compulsoryCourseModules = array_filter($compulsoryCourseModules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
    if(count($compulsoryCourseModules)) {
    ?>
        <h1 class="section_headline" id="section_compulsoryCourse">Pflichtmodule Studiengang</h1>
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
        $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
        if(count($modules)) {
        ?>
            <h1 class="section_headline" id="section_field_<?php echo $field["ID"];?>">Pflichtmodule <?php echo $field["name"];?></h1>
            <?php
            foreach($modules as $module) {
                printModule($module);
            }
        }
    }
}

if($electiveCourseModules->num_rows) {
    $electiveCourseModules = mysqli_fetch_all($electiveCourseModules, MYSQLI_ASSOC);
    $electiveCourseModules = array_filter($electiveCourseModules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
    if(count($electiveCourseModules)) {
    ?>
        <h1 class="section_headline" id="section_electiveCourse">Wahlpflichtmodule Studiengang</h1>
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
        $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
        if(count($modules)) {
        ?>
            <h1 class="section_headline" id="section_field_<?php echo $field["ID"];?>">Wahlpflichtmodule <?php echo $field["name"];?></h1>
            <?php
            foreach($modules as $module) {
                printModule($module);
            }
        }
    }
}

if($practicalCourseModules->num_rows) {
    $practicalCourseModules = mysqli_fetch_all($practicalCourseModules, MYSQLI_ASSOC);
    $practicalCourseModules = array_filter($practicalCourseModules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
    if(count($practicalCourseModules)) {
    ?>
        <h1 class="section_headline" id="section_practicalCourse">Praxismodule Studiengang</h1>
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
        $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForModuleManual($item["ID"]);});
        if(count($modules)) {
        ?>
            <h1 class="section_headline" id="section_field_<?php echo $field["ID"];?>">Praxismodule <?php echo $field["name"];?></h1>
            <?php
            foreach($modules as $module) {
                printModule($module);
            }
        }
    }
}
function printModule($module) {
?>
    <div class="module">
        <h2 class="top_headline" id="module_<?php echo $module["ID"];?>"><?php echo $module["name"];?></h2>
        <div>
            <span class="summary-pre-note">Zusammenfassung:</span><br>
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
                    <td class="heading_3" style="text-align:center;" class="right_column"><?php if(!empty($module["presenceCreditHours"])){ echo "entspricht " . $module["presenceCreditHours"] . " SWS";}?></td>
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
                    <td class="heading_3" style="text-align:center;" class="right_column"><?php if(!empty($module["selfLearningCreditHours"])){ echo "entspricht " . $module["selfLearningCreditHours"] . " SWS";}?></td>
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
                            <td><?php echo getExamTypeString($exam["examType"]);?></td>
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
                                echo $str . "<br>";
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
                        $resultDeepeningLiterature = LiteratureModel::getDeepeningLiteratureByModuleID($module["ID"]);

                        if($resultDeepeningLiterature->num_rows) {
                            foreach($resultDeepeningLiterature as $deepeningLiterature) {
                                $str = "";
                                $str .= $deepeningLiterature["authors"];

                                if(!empty($deepeningLiterature["year"])) {
                                    $str .= ", " . $deepeningLiterature["year"];
                                }
                                if(!empty($deepeningLiterature["title"])) {
                                    $str .= ", " . $deepeningLiterature["title"];
                                }
                                if(!empty($deepeningLiterature["edition"])) {
                                    $str .= ", " . $deepeningLiterature["edition"];
                                }
                                if(!empty($deepeningLiterature["place"])) {
                                    $str .= ", " . $deepeningLiterature["place"];
                                }
                                if(!empty($deepeningLiterature["publisher"])) {
                                    $str .= ", " . $deepeningLiterature["publisher"];
                                }
                                if(!empty($deepeningLiterature["isbn"])) {
                                    $str .= ", " . $deepeningLiterature["isbn"];
                                }
                                echo $str . "<br>";
                            }
                        }
                    ?>
                    <?php echo $module["deepeningLiteraturePostNote"];?>
                </div>
            </div>
        </div>
    </div>
    <span class="page_break"></span>
<?php
}
function getExamTypeString($examType) {
    switch($examType) {
        case 1:
            return "Klausurarbeit"; // Klausurarbeit
            break;
        case 2:
            return "Mündliche Prüfung"; // Mündliche Prüfung
            break;
        case 3:
            return "Mündliches Fachgespräch"; // Mündliches Fachgespräch
            break;
        case 4:
            return "Präsentation"; // Präsentation
            break;
        case 5:
            return "Projektarbeit"; // Projektarbeit
            break;
        case 6:
            return "Seminararbeit"; // Seminararbeit
            break;
        case 7:
            return "Programmentwurf"; // Programmentwurf
            break;
        case 8:
            return "Prüfung am Computer"; // Prüfung am Computer
            break;
        case 9:
            return "Praktische Prüfung"; // Praktische Prüfung
            break;
        case 10:
            return "Bachelorarbeit"; // Bachelorthesis
            break;
        case 11:
            return "Verteidigung"; // Verteidigung
            break;
    }
}
