<form method="POST" class="form_container">
    <h2>Modul bearbeiten</h2>

    <div class="form_item">
        <label class="form_label" for="module_change_name">Name:*</label>
        <input class="form_input" type="string" id="module_change_name" name="module_change_name" value="<?php echo $result->name;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_nameEN">Name (Englisch):</label>
        <input class="form_input" type="string" id="module_change_nameEN" name="module_change_nameEN" value="<?php echo $result->nameEN;?>"/>
    </div>


    <div class="form_item">
        <label class="form_label" for="module_change_code">Modulcode:</label>
        <input class="form_input" type="string" id="module_change_code" name="module_change_code" value="<?php echo $result->code;?>"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_change_course">Studiengang:</label>
        <select class="form_select" id="module_change_course" name="module_change_course" onchange="check_course(this, false);">
            <?php
                if($resultCourse->num_rows) {
                    foreach($resultCourse as $course) {
                    ?>
                        <option value="<?php echo $course["ID"];?>" <?php if(!empty($oldCourse)) {if($course["ID"] == $oldCourse->courseID) {?> selected <?php }}?>><?php echo $course["name"];?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>
   
    <div class="form_item" id="module_change_field_div">
        <label class="form_label" for="module_change_field_0">Studienrichtung:</label>
        <button class="form_add_button button" type="button" name="module_change_fieldEntry" onclick="addFieldEntry(false)"></button>
        <button class="button table_delete_button" type="button" name="module_change_removefieldEntry" onclick="removeLastSelectEntry(this)"></button>
        <?php if($oldFields->num_rows) {
            $i = 0;
            foreach($oldFields as $oldField) {
                $inputID = "module_change_field_".$i;
                ?>
                <select class="form_select" id="<?php echo $inputID;?>" name="<?php echo $inputID;?>">
                    <option value="0">Alle</option>
                    <?php
                        if($resultField->num_rows) {
                            foreach($resultField as $field) {
                            ?>
                                <option value="<?php echo $field["ID"];?>" data-course="<?php echo $field["courseID"];?>" <?php if($field["ID"] == $oldField["fieldID"]) {?> selected <?php }?>><?php echo $field["name"];?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
                <?php
                $i++;
            }
        }
        else {
            ?>
            <select class="form_select" id="module_change_field_0" name="module_change_field_0">
                <?php
                    if($resultField->num_rows) {
                        foreach($resultField as $field) {
                        ?>
                            <option value="<?php echo $field["ID"];?>" data-course="<?php echo $field["courseID"];?>"></option>
                        <?php
                        }
                    }
                ?>
            </select>
            <?php
        }
        ?>
    </div>
        
    <div class="form_item">
        <label class="form_label" for="module_change_summary">Zusammenfassung:</label>
        <input class="form_editor" type="string" id="module_change_summary" name="module_change_summary" value="<?php echo $result->summary;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_summaryEN">Zusammenfassung (Englisch):</label>
        <input class="form_editor" type="string" id="module_change_summaryEN" name="module_change_summaryEN" value="<?php echo $result->summaryEN;?>"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_change_type">Modultyp:</label>
        <input class="form_input" type="string" id="module_change_type" name="module_change_type" value="<?php echo $result->type;?>"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_change_semester">Belegung gemäß Studienablaufplan (Semesternummer):</label>
        <input class="form_input" type="number" id="module_change_semester" name="module_change_semester" min="1" max="6" value="<?php echo $result->semester;?>"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_change_duration">Dauer (Semesteranzahl):</label>
        <input class="form_input" type="number" id="module_change_duration" name="module_change_duration" min="1" max="6" value="<?php echo $result->duration;?>"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_change_credits">Credits:</label>
        <input class="form_input" type="number" id="module_change_credits" name="module_change_credits" min="0" max="180" value="<?php echo $result->credits;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_overallGradeWeighting">Gewichtung Modulnote für Gesamtnote:</label>
        <input class="form_input" type="string" id="module_change_overallGradeWeighting" name="module_change_overallGradeWeighting" value="<?php echo $result->overallGradeWeighting;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_usability">Verwendbarkeit:</label>
        <input class="form_input" type="string" id="module_change_usability" name="module_change_usability" value="<?php echo $result->usability;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_examRequirement">Zulassungsvoraussetzungen für die Modulprüfung:</label>
        <input class="form_input" type="string" id="module_change_examRequirement" name="module_change_examRequirement" value="<?php echo $result->examRequirement;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_participationRequirement">Voraussetzungen für die Teilnahme am Modul:</label>
        <input class="form_input" type="string" id="module_change_participationRequirement" name="module_change_participationRequirement" value="<?php echo $result->participationRequirement;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_studyContent">Lerninhalte:</label>
        <input class="form_editor" type="string" id="module_change_studyContent" name="module_change_studyContent" value="<?php echo $result->studyContent;?>"/>
    </div>
    
    <h3>Lernergebnisse</h3>

    <h4>Wissen und Verstehen</h4>

    <div class="form_item">
        <label class="form_label" for="module_change_knowledgeBroadening">Wissensverbreiterung:</label>
        <input class="form_editor" type="string" id="module_change_knowledgeBroadening" name="module_change_knowledgeBroadening" value="<?php echo $result->knowledgeBroadening;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_knowledgeDeepening">Wissensvertiefung:</label>
        <input class="form_editor" type="string" id="module_change_knowledgeDeepening" name="module_change_knowledgeDeepening" value="<?php echo $result->knowledgeDeepening;?>"/>
    </div>
    
    <h4>Können/Kompetenz</h4>

    <div class="form_item">
        <label class="form_label" for="module_change_instrumentalCompetence">Instrumentale Kompetenz:</label>
        <input class="form_editor" type="string" id="module_change_instrumentalCompetence" name="module_change_instrumentalCompetence" value="<?php echo $result->instrumentalCompetence;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_systemicCompetence">Systemische Kompetenz:</label>
        <input class="form_editor" type="string" id="module_change_systemicCompetence" name="module_change_systemicCompetence" value="<?php echo $result->systemicCompetence;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_communicativeCompetence">Kommunikative Kompetenz:</label>
        <input class="form_editor" type="string" id="module_change_communicativeCompetence" name="module_change_communicativeCompetence" value="<?php echo $result->communicativeCompetence;?>"/>
    </div>
   
    <h3>Lehr- und Lernformen/Workload</h3>

    <div class="form_item">
        <label class="form_label" for="module_change_presenceCreditHours">Präsenzveranstaltugen entsprechen (SWS):</label>
        <input class="form_input" type="number" id="module_change_presenceCreditHours" name="module_change_presenceCreditHours" value="<?php echo $result->presenceCreditHours;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_selfLearningCreditHours">EVL-Veranstaltungen entsprechen (SWS):</label>
        <input class="form_input" type="number" id="module_change_selfLearningCreditHours" name="module_change_selfLearningCreditHours" value="<?php echo $result->selfLearningCreditHours;?>"/>
    </div>
   
    <div class="form_group_container" id="module_change_categories_div">   
        <button class="form_add_button button" type="button" name="module_change_categoryEntry" onclick="addCategoryEntry(false)"></button>

        <?php if($oldCategories->num_rows) {
            $i = 0;
            foreach($oldCategories as $oldCategory) {
                $inputCategoryDiv = "module_change_categoryDiv_".$i;
                $inputCategoryID = "module_change_category_".$i;
                $inputWorkloadID = "module_change_categoryWorkload_".$i;
                $inputSemesterID = "module_change_categorySemester_".$i;
                $inputTheoryFlagID_t = "module_change_TheoryFlag_theory_".$i;
                $inputTheoryFlagID_p = "module_change_TheoryFlag_practical_".$i;
                $inputTheoryFlagName = "module_change_TheoryFlag_".$i;
                $inputTheoryFlagDiv = "module_change_TheoryFlag_".$i;
            ?>
            <div class="form_group" id="<?php echo $inputCategoryDiv;?>">
                <div class="form_item">
                    <label class="form_label" for="<?php echo $inputCategoryID;?>">Kategorie:</label>
                    <select class="form_select" id="<?php echo $inputCategoryID;?>" name="<?php echo $inputCategoryID;?>" data-id="<?php echo $i;?>" onchange="check_status(this, false);">
                        <?php
                            $invisibleFlag = 0;
                            if($resultCategories->num_rows) {
                                foreach($resultCategories as $category) {
                                ?>
                                    <option value="<?php echo $category["ID"];?>" data-presenceFlag="<?php echo $category["presenceFlag"];?>" <?php if($category["ID"] == $oldCategory["categoryID"]) { echo "selected"; $invisibleFlag = $category["presenceFlag"];}?>><?php echo $category["name"];?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form_item">
                    <label class="form_label" for="<?php echo $inputWorkloadID;?>">Workload (h):</label>
                    <input class="form_input" type="number" id="<?php echo $inputWorkloadID;?>" name="<?php echo $inputWorkloadID;?>" value="<?php echo $oldCategory["workload"];?>"/>
                </div>

                <div class="form_item">
                    <label class="form_label" for="<?php echo $inputSemesterID;?>">Semester:</label>
                    <input class="form_input" type="number" id="<?php echo $inputSemesterID;?>" name="<?php echo $inputSemesterID;?>" value="<?php echo $oldCategory["semester"];?>"/>
                </div>

                <div class="form_item <?php if($invisibleFlag) { echo "invisible";}?>" id="<?php echo $inputTheoryFlagDiv;?>">
                    <label class="form_label">Einteilung EVL Theorie/Praxis</label>
                    <div class="form_radio_entry">
                        <input class="form_radio" type="radio" id="<?php echo $inputTheoryFlagID_t;?>" name="<?php echo $inputTheoryFlagName;?>" value="1" <?php if($oldCategory["theoryFlag"]) {?> checked="checked" <?php }?>/>
                        <label for="<?php echo $inputTheoryFlagID_t;?>">EVL Theorie</label>
                    </div>
                    <div class="form_radio_entry">
                        <input class="form_radio" type="radio" id="<?php echo $inputTheoryFlagID_p;?>" name="<?php echo $inputTheoryFlagName;?>" value="0" <?php if(!$oldCategory["theoryFlag"] && isset($oldCategory["theoryFlag"])) {?> checked="checked" <?php }?>/>
                        <label for="<?php echo $inputTheoryFlagID_p;?>">EVL Praxis</label>
                    </div>
                </div>
                <button class="button table_delete_button" type="button" name="module_change_removeCategory" onclick="removeEntry(this)"></button> 
            </div>
            <?php
            $i++;
            }
        }
        else {
            ?>
            <div class="form_group" id="module_add_categoryDiv_0">
                <div class="form_item" id="module_add_TheoryFlag_0">
                    <label class="form_label" for="module_change_category_0">Kategorie:</label>
                    <select class="form_select" id="module_change_category_0" name="module_change_category_0">
                        <?php
                            $invisibleFlag = 0;
                            if($resultCategories->num_rows) {
                                foreach($resultCategories as $category) {
                                    if($i == 1) { 
                                        $invisibleFlag = $category["presenceFlag"];
                                    }
                                    ?>
                                    <option value="<?php echo $category["ID"];?>"><?php echo $category["name"];?></option>
                                <?php
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="form_item">
                    <label class="form_label" for="module_change_categoryWorkload_0">Workload (h):</label>
                    <input class="form_input" type="number" id="module_change_categoryWorkload_0" name="module_change_categoryWorkload_0"/>
                </div>

                <div class="form_item">
                    <label class="form_label" for="module_change_categorySemester_0">Semester:</label>
                    <input class="form_input" type="number" id="module_change_categorySemester_0" name="module_change_categorySemester_0"/>
                </div>

                <div class="form_item <?php if($invisibleFlag) { echo "invisible";}?>" id="module_change_TheoryFlag_0">
                    <label class="form_label">Einteilung EVL Theorie/Praxis</label>
                    <div class="form_radio_entry">
                        <input class="form_radio_box" type="radio" id="module_change_TheoryFlag_theory_0" name="module_change_TheoryFlag_0" value="1"/>
                        <label class="form_radio_label" for="module_change_TheoryFlag_theory_0">EVL Theorie</label>
                    </div>
                    <div class="form_radio_entry">
                        <input class="form_radio_box" type="radio" id="module_change_TheoryFlag_practical_0" name="module_change_TheoryFlag_0" value="0"/>
                        <label class="form_radio_label" for="module_change_TheoryFlag_practical_0">EVL Praxis</label>
                    </div>
                </div>
                <button class="button table_delete_button" type="button" name="module_change_removeCategory" onclick="removeEntry(this)"></button> 
            </div>
            <?php
        }
        ?>
    </div>
 
    <h3>Prüfungsleistungen (PL)</h3>
    <div class="form_group_container" id="module_change_exams_div">
        <button class="form_add_button button" type="button" name="module_change_examEntry" onclick="addExamEntry(false)"></button>
        <?php if($oldExams->num_rows) {
            $i = 0;
            foreach($oldExams as $oldExam) {
                $divID = "module_change_examDiv_".$i;
                $inputExamType = "module_change_examType_".$i;
                $inputDuration = "module_change_examDuration_".$i;
                $inputCircumference = "module_change_examCircumference_".$i;
                $inputPeriod = "module_change_examPeriod_".$i;
                $inputWeightingID = "module_change_examWeighting_".$i;
                $inputSemesterID = "module_add_examSemester_".$i;
                ?>
                <div class="form_group" id="<?php echo $divID;?>">
                    <div class="form_item" id="module_change_examType_div">
                        <label class="form_label" for="<?php echo $inputExamType;?>">Art der PL:</label>
                        <select class="form_select" id="<?php echo $inputExamType;?>" name="<?php echo $inputExamType;?>">
                            <option value="1" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 1) {?> selected <?php }}?>>Klausurarbeit</option>
                            <option value="2" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 2) {?> selected <?php }}?>>Mündliche Prüfung</option>
                            <option value="3" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 3) {?> selected <?php }}?>>Mündliches Fachgespräch</option>
                            <option value="4" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 4) {?> selected <?php }}?>>Präsentation</option>
                            <option value="5" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 5) {?> selected <?php }}?>>Projektarbeit</option>
                            <option value="6" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 7) {?> selected <?php }}?>>Seminararbeit</option>
                            <option value="7" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 8) {?> selected <?php }}?>>Programmentwurf</option>
                            <option value="8" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 9) {?> selected <?php }}?>>Prüfung am Computer</option>
                            <option value="9" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 10) {?> selected <?php }}?>>Praktische Prüfung</option>
                            <option value="10" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 11) {?> selected <?php }}?>>Bachelorarbeit</option>
                            <option value="11" <?php if(!empty($oldExam["examType"])) {if($oldExam["examType"] == 12) {?> selected <?php }}?>>Bachelorverteidigung</option>
                        </select>
                    </div>

                    <div class="form_item" id="module_change_examDuration_div">
                        <label class="form_label" for="<?php echo $inputDuration;?>">Dauer (min):</label>
                        <input class="form_input" type="string" id="<?php echo $inputDuration;?>" name="<?php echo $inputDuration;?>" value="<?php if(!empty($oldExam["examDuration"])) {echo $oldExam["examDuration"];}?>"/>
                    </div>

                    <div class="form_item" id="module_change_examCircumference_div">
                        <label class="form_label" for="<?php echo $inputCircumference;?>">Umfang (Seiten):</label>
                        <input class="form_input" type="string" id="<?php echo $inputCircumference;?>" name="<?php echo $inputCircumference;?>" value="<?php if(!empty($oldExam["examCircumference"])) {echo $oldExam["examCircumference"];}?>"/>
                    </div>

                    <div class="form_item" id="module_change_examPeriod_div">
                        <label class="form_label" for="<?php echo $inputPeriod;?>">Prüfungszeitraum:</label>
                        <input class="form_input" type="string" id="<?php echo $inputPeriod;?>" name="<?php echo $inputPeriod;?>"  value="<?php if(!empty($oldExam["examPeriod"])) {echo $oldExam["examPeriod"];}?>"/>
                    </div>

                    <div class="form_item" id="module_change_examWeighting_div">
                        <label class="form_label" for="<?php echo $inputWeightingID;?>">Gewichtung:</label>
                        <input class="form_input" type="string" id="<?php echo $inputWeightingID;?>" name="<?php echo $inputWeightingID;?>"  value="<?php if(!empty($oldExam["examWeighting"])) {echo $oldExam["examWeighting"];}?>"/>
                    </div>

                    <div class="form_item">
                        <label class="form_label" for="<?php echo $inputSemesterID;?>">Semester:</label>
                        <input class="form_input" type="number" id="<?php echo $inputSemesterID;?>" name="<?php echo $inputSemesterID;?>" value="<?php if(!empty($oldExam["examSemester"])) {echo $oldExam["examSemester"];}?>"/>
                    </div>
                    <button class="button table_delete_button" type="button" name="module_change_removeExam" onclick="removeEntry(this)"></button>
                </div>
                <?php
                $i++;
            }
        }
        else {
            ?>
            <div class="form_group" id="module_change_examDiv_0">
                <div class="form_item" id="module_change_examType_div">
                    <label class="form_label" for="module_change_examType_0">Art der PL:**</label>
                    <select class="form_select" id="module_change_examType_0" name="module_change_examType_0">
                        <option value="1">Klausurarbeit</option>
                        <option value="2">Mündliche Prüfung</option>
                        <option value="3">Mündliches Fachgespräch</option>
                        <option value="4">Präsentation</option>
                        <option value="5">Projektarbeit</option>
                        <option value="6">Seminararbeit</option>
                        <option value="7">Programmentwurf</option>
                        <option value="8">Prüfung am Computer</option>
                        <option value="9">Praktische Prüfung</option>
                        <option value="10">Bachelorarbeit</option>
                        <option value="11">Bachelorverteidigung</option>
                    </select>
                </div>

                <div class="form_item" id="module_change_examDuration_div">
                    <label class="form_label" for="module_change_examDuration_0">Dauer (min):</label>
                    <input class="form_input" type="string" id="module_change_examDuration_0" name="module_change_examDuration_0"/>
                </div>

                <div class="form_item" id="module_change_examCircumference_div">
                    <label class="form_label" for="module_change_examCircumference_0">Umfang (Seiten):</label>
                    <input class="form_input" type="string" id="module_change_examCircumference_0" name="module_change_examCircumference_0"/>
                </div>

                <div class="form_item" id="module_change_examPeriod_div">
                    <label class="form_label" for="module_change_examPeriod_0">Prüfungszeitraum:**</label>
                    <input class="form_input" type="string" id="module_change_examPeriod_0" name="module_change_examPeriod_0"/>
                </div>

                <div class="form_item" id="module_change_examWeighting_div">
                    <label class="form_label" for="module_change_examWeighting_0">Gewichtung:**</label>
                    <input class="form_input" type="string" id="module_change_examWeighting" name="module_change_examWeighting_0"/>
                </div>

                <div class="form_item">
                    <label class="form_label" for="module_change_examSemester_0">Semester:</label>
                    <input class="form_input" type="number" id="module_change_examSemester_0" name="module_change_examSemester_0"/>
                </div>
                <button class="button table_delete_button" type="button" name="module_change_removeExam" onclick="removeEntry(this)"></button>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="form_item">
        <label class="form_label" for="module_change_responsibleName">Modulverantwortlicher (Name):</label>
        <input class="form_input" type="string" id="module_change_responsibleName" name="module_change_responsibleName" value="<?php echo $result->responsibleName;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_responsibleEmail">Modulverantwortlicher (E-Mail):</label>
        <input class="form_input" type="string" id="module_change_responsibleEmail" name="module_change_responsibleEmail" value="<?php echo $result->responsibleEmail;?>"/>
    </div>

    <div class="form_item">    
        <label class="form_label" for="module_change_lectureLanguage">Unterrichtssprache:</label>
        <input class="form_input" type="string" id="module_change_lectureLanguage" name="module_change_lectureLanguage" value="<?php echo $result->lectureLanguage;?>"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_change_frequency">Angebotsfrequenz:</label>
        <input class="form_input" type="string" id="module_change_frequency" name="module_change_frequency" value="<?php echo $result->frequency;?>"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_change_media">Medien/Arbeitsmaterialien:</label>
        <input class="form_input" type="string" id="module_change_media" name="module_change_media" value="<?php echo $result->media;?>"/>
    </div>

    <h3>Literatur</h3>

    <div class="form_item">
        <label class="form_label" for="module_change_basicLiteraturePreNote">Basisliteratur (Vorbemerkungen):</label>
        <input class="form_editor" type="string" id="module_change_basicLiteraturePreNote" name="module_change_basicLiteraturePreNote" value="<?php echo $result->basicLiteraturePreNote;?>"/>
    </div>

    <div class="form_item" id="module_change_basicLiterature_div">
        <label class="form_label" for="module_change_basicLiterature">Basisliteratur:</label>
        <button class="form_add_button button" type="button" name="module_change_basicLiteratureEntry" onclick="addBasicLiteratureEntry(false)"></button>
        <button class="button table_delete_button" type="button" name="module_change_removeBasicLiteratureEntry" onclick="removeLastSelectEntry(this)"></button>
        <?php if($oldBasicLiterature->num_rows) {
            $i = 0;
            foreach($oldBasicLiterature as $oldBasicLit) {
                $inputBasicLiterartureID = "module_change_basicLiterature_".$i;
                ?>
                <select  class="form_select" id="<?php echo $inputBasicLiterartureID;?>" name="<?php echo $inputBasicLiterartureID;?>">
                    <?php
                        if($resultLiterature->num_rows) {
                            foreach($resultLiterature as $literature) {
                            ?>
                                <option value="<?php echo $literature["ID"];?>" <?php if($literature["ID"] == $oldBasicLit["literatureID"]) {?> selected <?php }?>>
                                    <?php 
                                        echo $literature["title"];
                                        echo $literature["authors"];
                                    ?>
                                </option>
                            <?php
                            }
                        }
                    ?>
                </select>
                <?php
                $i++;
            }
        }
        else {
            ?>
            <select  class="form_select" id="module_change_basicLiterature_0" name="module_change_basicLiterature_0">
                <?php
                    if($resultLiterature->num_rows) {
                        foreach($resultLiterature as $literature) {
                        ?>
                            <option value="<?php echo $literature["ID"];?>">
                                <?php 
                                    echo $literature["title"];
                                    echo $literature["authors"];
                                ?>
                            </option>
                        <?php
                        }
                    }
                ?>
            </select>
            <?php
        }
        ?>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_basicLiteraturePostNote">Basisliteratur (Nachbemerkungen):</label>
        <input class="form_editor" type="string" id="module_change_basicLiteraturePostNote" name="module_change_basicLiteraturePostNote" value="<?php echo $result->basicLiteraturePostNote;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_deepeningLiteraturePreNote">Vertiefende Literatur (Vorbemerkungen):</label>
        <input class="form_editor" type="string" id="module_change_deepeningLiteraturePreNote" name="module_change_deepeningLiteraturePreNote" value="<?php echo $result->deepeningLiteraturePreNote;?>"/>
    </div>

    <div class="form_item" id="module_change_deepeningLiterature_div">
        <label class="form_label" for="module_change_deepeningLiterature">Vertiefende Literatur:</label>
        <button class="form_add_button button" type="button" name="module_change_deepeningLiteratureEntry" onclick="addDeepeningLiteratureEntry(false)"></button>
        <button class="button table_delete_button" type="button" name="module_change_removeBasicLiteratureEntry" onclick="removeLastSelectEntry(this)"></button>
        <?php if($oldDeepeningLiterature->num_rows) {
            $i = 0;
            foreach($oldDeepeningLiterature as $oldDeepeningLit) {
                $inputDeepeningLiterarture = "module_change_deepeningLiterature_".$i;
            ?>
            <select class="form_select" id="<?php echo $inputDeepeningLiterarture;?>" name="<?php echo $inputDeepeningLiterarture;?>">
                <?php
                    if($resultLiterature->num_rows) {
                        foreach($resultLiterature as $literature) {
                        ?>
                            <option value="<?php echo $literature["ID"];?>" <?php if($literature["ID"] == $oldDeepeningLit["literatureID"]) {?> selected <?php }?>>
                                <?php 
                                    echo $literature["title"];
                                    echo $literature["authors"];
                                ?>
                            </option>
                        <?php
                        }
                    }
                ?>
            </select>
            <?php
            }
        }
        else {
            ?>
            <select class="form_select" id="module_change_deepeningLiterature_0" name="module_change_deepeningLiterature_0">
                <?php
                    if($resultLiterature->num_rows) {
                        foreach($resultLiterature as $literature) {
                        ?>
                            <option value="<?php echo $literature["ID"];?>">
                                <?php 
                                    echo $literature["title"];
                                    echo $literature["authors"];
                                ?>
                            </option>
                        <?php
                        }
                    }
                ?>
            </select>
            <?php
        }
        ?>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_change_deepeningLiteraturePostNote">Vertiefende Literatur (Nachbemerkungen):</label>
        <input  class="form_editor" type="string" id="module_change_deepeningLiteraturePostNote" name="module_change_deepeningLiteraturePostNote" value="<?php echo $result->deepeningLiteraturePostNote;?>"/>
    </div>

    <span class="mandatory_notice">*Pflichtfeld</span>
    <span class="mandatory_notice">**Pflichtfeld, falls Kategorien/Prüfungen/Literatureinträge ausgewählt</span>
    <button class="form_submit button" type="submit" name="module_change_submit" value="<?php echo $result->ID;?>">Speichern</button>
</form>