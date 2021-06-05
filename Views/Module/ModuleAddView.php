<form method="POST" class="form_container">
    <h2>Modul hinzufügen</h2>

    <div class="form_item">
        <label class="form_label" for="module_add_name">Name:*</label>
        <input class="form_input" type="string" id="module_add_name" name="module_add_name" required/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_nameEN">Name (Englisch):</label>
        <input class="form_input" type="string" id="module_add_nameEN" name="module_add_nameEN"/>
    </div>


    <div class="form_item">
        <label class="form_label" for="module_add_code">Modulcode:</label>
        <input class="form_input" type="string" id="module_add_code" name="module_add_code"/>
    </div>
 
    <div class="form_item">
        <label class="form_label" for="module_add_course">Studiengang:</label>
        <select class="form_select" id="module_add_course" name="module_add_course">
            <?php
                if($resultCourse->num_rows) {
                        foreach($resultCourse as $course) {
                        ?>
                        <option value="<?php echo $course["ID"];?>"><?php echo $course["name"];?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>

    <div class="form_item" id="module_add_field_div">
        <label class="form_label" for="module_add_field_0">Studienrichtung:</label>
        <button class="form_add_button button" type="button" name="module_add_fieldEntry" onclick="addFieldEntry(true)"></button>
        <select class="form_select" id="module_add_field_0" name="module_add_field_0">
            <?php
                if($resultField->num_rows) {
                    ?>
                    <option value="0">Alle</option>
                    <?php
                    foreach($resultField as $field) {
                    ?>
                        <option value="<?php echo $field["ID"];?>"><?php echo $field["name"];?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_summary">Zusammenfassung:</label>
        <input class="form_editor" type="string" id="module_add_summary" name="module_add_summary"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_add_summaryEN">Zusammenfassung (Englisch):</label>
        <input class="form_editor" type="string" id="module_add_summaryEN" name="module_add_summaryEN"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_add_type">Modultyp:</label>
        <input class="form_input" type="string" id="module_add_type" name="module_add_type"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_add_semester">Belegung gemäß Studienablaufplan (Semesternummer):</label>
        <input class="form_input" type="number" id="module_add_semester" name="module_add_semester" min="1" max="6"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_add_duration">Dauer (Semesteranzahl):</label>
        <input class="form_input" type="number" id="module_add_duration" name="module_add_duration" min="1" max="6"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="module_add_credits">Credits:</label>
        <input class="form_input" type="number" id="module_add_credits" name="module_add_credits" min="0" max="180"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_overallGradeWeighting">Gewichtung Modulnote für Gesamtnote:</label>
        <input class="form_input" type="number" id="module_add_overallGradeWeighting" name="module_add_overallGradeWeighting"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_usability">Verwendbarkeit:</label>
        <input class="form_input" type="string" id="module_add_usability" name="module_add_usability"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_examRequirement">Zulassungsvoraussetzungen für die Modulprüfung:</label>
        <input class="form_input" type="string" id="module_add_examRequirement" name="module_add_examRequirement"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_participationRequirement">Voraussetzungen für die Teilnahme am Modul:</label>
        <input class="form_input" type="string" id="module_add_participationRequirement" name="module_add_participationRequirement"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_studyContent">Lerninhalte:</label>
        <input class="form_editor" type="string" id="module_add_studyContent" name="module_add_studyContent"/>
    </div>
    
    <h3>Lernergebnisse</h3>

    <h4>Wissen und Verstehen</h4>

    <div class="form_item">
        <label class="form_label" for="module_add_knowledgeBroadening">Wissensverbreiterung:</label>
        <input class="form_editor" type="string" id="module_add_knowledgeBroadening" name="module_add_knowledgeBroadening"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_knowledgeDeepening">Wissensvertiefung:</label>
        <input class="form_editor" type="string" id="module_add_knowledgeDeepening" name="module_add_knowledgeDeepening"/>
    </div>
    
    <h4>Können/Kompetenz</h4>

    <div class="form_item">
        <label class="form_label" for="module_add_instrumentalCompetence">Instrumentale Kompetenz:</label>
        <input class="form_editor" type="string" id="module_add_instrumentalCompetence" name="module_add_instrumentalCompetence"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_systemicCompetence">Systemische Kompetenz:</label>
        <input class="form_editor" type="string" id="module_add_systemicCompetence" name="module_add_systemicCompetence"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_communicativeCompetence">Kommunikative Kompetenz:</label>
        <input class="form_editor" type="string" id="module_add_communicativeCompetence" name="module_add_communicativeCompetence"/>
    </div>
   
    <h3>Lehr- und Lernformen/Workload</h3>

    <div class="form_item">
        <label class="form_label" for="module_add_presenceCreditHours">Präsenzveranstaltugen entsprechen (SWS):</label>
        <input class="form_input" type="number" id="module_add_presenceCreditHours" name="module_add_presenceCreditHours"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_selfLearningCreditHours">EVL-Veranstaltungen entsprechen (SWS):</label>
        <input class="form_input" type="number" id="module_add_selfLearningCreditHours" name="module_add_selfLearningCreditHours"/>
    </div>

    <div class="form_group_container" id="module_add_categories_div">
        <button class="form_add_button button" type="button" name="module_add_categoryEntry" onclick="addCategoryEntry(true)"></button>

        <div class="form_group">
            <div class="form_item">
                <label class="form_label" for="module_add_category_0">Kategorie:</label>
                <select class="form_select" id="module_add_category_0" name="module_add_category_0" data-id="0" onchange="check_status(this);">
                    <?php
                        if($resultCategories->num_rows) {
                            foreach($resultCategories as $category) {
                            ?>
                                <option value="<?php echo $category["ID"];?>" data-presenceFlag="<?php echo $category["presenceFlag"];?>"><?php echo $category["name"];?></option>
                            <?php
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form_item">
                <label class="form_label" for="module_add_categoryWorkload_0">Workload (h):</label>
                <input class="form_input" type="number" id="module_add_categoryWorkload_0" name="module_add_categoryWorkload_0"/>
            </div>
            
            <div class="form_item">
                <label class="form_label" for="module_add_categorySemester_0">Semester:</label>
                <input class="form_input" type="number" id="module_add_categorySemester_0" name="module_add_categorySemester_0"/>
            </div>

            <div class="form_item" id="module_add_TheoryFlag_0">
                <label class="form_label">Einteilung EVL Theorie/Praxis</label>
                <div class="form_radio_entry">
                    <input class="form_radio_box" type="radio" id="module_add_TheoryFlag_theory_0" name="module_add_TheoryFlag_0" value="1"/>
                    <label class="form_radio_label" for="module_add_TheoryFlag_0">EVL Theorie</label>
                </div>
                <div class="form_radio_entry">
                    <input class="form_radio_box" type="radio" id="module_add_TheoryFlag_practical_0" name="module_add_TheoryFlag_0" value="0"/>
                    <label class="form_radio_label" for="module_add_TheoryFlag_0">EVL Praxis</label>
                </div>
            </div>
        </div>
    </div>
 
    <h3>Prüfungsleistungen (PL)</h3>
    <div class="form_group_container" id="module_add_exams_div">
        <button class="form_add_button button" type="button" name="module_add_examEntry" onclick="addExamEntry(true)"></button>
        <div class="form_group">
            <div class="form_item" id="module_add_examType_div">
                <label class="form_label" for="module_add_examType_0">Art der PL:**</label>
                <select class="form_select" id="module_add_examType_0" name="module_add_examType_0">
                    <option value="1">Klausurarbeit</option>
                    <option value="2">Mündliche Prüfung</option>
                    <option value="3">Mündliches Fachgespräch</option>
                    <option value="4">Präsentation</option>
                    <option value="5">Projektarbeit</option>
                    <option value="6">Seminararbeit</option>
                    <option value="7">Programmentwurf</option>
                    <option value="8">Prüfung am Computer</option>
                    <option value="9">Praktische Prüfung</option>
                    <option value="10">Bachelorthesis</option>
                    <option value="11">Bachelorverteidigung</option>
                </select>
            </div>

            <div class="form_item" id="module_add_examDuration_div">
                <label class="form_label" for="module_add_examDuration_0">Dauer (min):</label>
                <input class="form_input" type="string" id="module_add_examDuration_0" name="module_add_examDuration_0"/>
            </div>

            <div class="form_item" id="module_add_examCircumference_div">
                <label class="form_label" for="module_add_examCircumference_0">Umfang (Seiten):</label>
                <input class="form_input" type="string" id="module_add_examCircumference_0" name="module_add_examCircumference_0"/>
            </div>

            <div class="form_item" id="module_add_examPeriod_div">
                <label class="form_label" for="module_add_examPeriod_0">Prüfungszeitraum:**</label>
                <input class="form_input" type="string" id="module_add_examPeriod_0" name="module_add_examPeriod_0"/>
            </div>

            <div class="form_item" id="module_add_examWeighting_div">
                <label class="form_label" for="module_add_examWeighting_0">Gewichtung:**</label>
                <input class="form_input" type="string" id="module_add_examWeighting_0" name="module_add_examWeighting_0"/>
            </div>

            <div class="form_item">
                <label class="form_label" for="module_add_examSemester_0">Semester:</label>
                <input class="form_input" type="number" id="module_add_examSemester_0" name="module_add_examSemester_0"/>
            </div>
        </div>
    </div>    

    <div class="form_item">
        <label class="form_label" for="module_add_responsibleName">Modulverantwortlicher (Name):</label>
        <input class="form_input" type="string" id="module_add_responsibleName" name="module_add_responsibleName"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_responsibleEmail">Modulverantwortlicher (E-Mail):</label>
        <input class="form_input" type="string" id="module_add_responsibleEmail" name="module_add_responsibleEmail"/>
    </div>

    <div class="form_item">    
        <label class="form_label" for="module_add_lectureLanguage">Unterrichtssprache:</label>
        <input class="form_input" type="string" id="module_add_lectureLanguage" name="module_add_lectureLanguage"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_add_frequency">Angebotsfrequenz:</label>
        <input class="form_input" type="string" id="module_add_frequency" name="module_add_frequency"/>
    </div>

    <div class="form_item">        
        <label class="form_label" for="module_add_media">Medien/Arbeitsmaterialien:</label>
        <input class="form_input" type="string" id="module_add_media" name="module_add_media"/>
    </div>

    <h3>Literatur</h3>

    <div class="form_item">
        <label class="form_label" for="module_add_basicLiteraturePreNote">Basisliteratur (Vorbemerkungen):</label>
        <input class="form_editor" type="string" id="module_add_basicLiteraturePreNote" name="module_add_basicLiteraturePreNote"/>
    </div>

    <div class="form_item" id="module_add_basicLiterature_div">
        <label class="form_label" for="module_add_basicLiterature_0">Basisliteratur:</label>
        <button class="form_add_button button" type="button" name="module_add_basicLiteratureEntry" onclick="addBasicLiteratureEntry(true)"></button>
        <select class="form_select" id="module_add_basicLiterature_0" name="module_add_basicLiterature_0">
            <?php
                if($resultLiterature->num_rows) {
                    foreach($resultLiterature as $literature) {
                    ?>
                        <option value="<?php echo $literature["ID"];?>">
                            <?php 
                                echo $literature["title"];
                                echo $literature["authors"];
                                echo $literature["edition"];
                            ?>
                        </option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_basicLiteraturePostNote">Basisliteratur (Nachbemerkungen):</label>
        <input class="form_editor" type="string" id="module_add_basicLiteraturePostNote" name="module_add_basicLiteraturePostNote"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_deepeningLiteraturePreNote">Vertiefende Literatur (Vorbemerkungen):</label>
        <input class="form_editor" type="string" id="module_add_deepeningLiteraturePreNote" name="module_add_deepeningLiteraturePreNote"/>
    </div>

    <div class="form_item" id="module_add_deepeningLiterature_div">
        <label class="form_label" for="module_add_deepeningLiterature_0">Vertiefende Literatur:</label>
        <button class="form_add_button button" type="button" name="module_add_deepeningLiteratureEntry" onclick="addDeepeningLiteratureEntry(true)"></button>
        <select class="form_select" id="module_add_deepeningLiterature_0" name="module_add_deepeningLiterature_0">
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
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_deepeningLiteraturePostNote">Vertiefende Literatur (Nachbemerkungen):</label>
        <input  class="form_editor" type="string" id="module_add_deepeningLiteraturePostNote" name="module_add_deepeningLiteraturePostNote"/>
    </div>
    
    <span class="mandatory_notice">*Pflichtfeld</span>
    <span class="mandatory_notice">**Pflichtfeld, falls Kategorien/Prüfungen/Literatureinträge ausgewählt</span>
    <input class="form_submit button" type="submit" name="module_add_submit"/>
</form>