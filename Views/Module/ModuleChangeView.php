<form method="POST" class="form_container">
    <h2>Modul bearbeiten</h2>

    <div class="form_item">
        <label class="form_label" for="module_change_name">Name:</label>
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
    
<!--TODO: show previously chosen value as chosen option-->
    <div class="form_item">
        <label class="form_label" for="module_change_course">Studiengang:</label>
        <select class="form_select" id="module_change_course" name="module_change_course">
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

<!--TODO: show previously chosen value as chosen option-->
    <div class="form_item" id="module_change_field_div">
        <label class="form_label" for="module_change_field">Studienrichtung:</label>
        <button type="button" name="module_change_fieldEntry" onclick="addFieldEntry(false)">Studienrichtung hinzufügen</button>
        <select class="form_select" id="module_change_field" name="module_change_field">
            <?php
                if($resultField->num_rows) {
                    foreach($resultField as $field) {
                    ?>
                        <option value="<?php echo $field["ID"];?>"><?php echo $field["name"];?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_summary">Zusammenfassung:</label>
        <input class="module_change_editor" type="string" id="module_change_summary" name="module_change_summary"/>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_summaryEN">Zusammenfassung (Englisch):</label>
        <input class="module_change_editor" type="string" id="module_change_summaryEN" name="module_change_summaryEN"/>
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

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_studyContent">Lerninhalte:</label>
        <input class="module_change_editor" type="string" id="module_change_studyContent" name="module_change_studyContent"/>
    </div>
    
    <h3>Lernergebnisse</h3>

    <h4>Wissen und Verstehen</h4>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_knowledgeBroadening">Wissensverbreiterung:</label>
        <input class="module_change_editor" type="string" id="module_change_knowledgeBroadening" name="module_change_knowledgeBroadening"/>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_knowledgeDeepening">Wissensvertiefung:</label>
        <input class="module_change_editor" type="string" id="module_change_knowledgeDeepening" name="module_change_knowledgeDeepening"/>
    </div>
    
    <h4>Können/Kompetenz</h4>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_instrumentalCompetence">Instrumentale Kompetenz:</label>
        <input class="module_change_editor" type="string" id="module_change_instrumentalCompetence" name="module_change_instrumentalCompetence"/>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_systemicCompetence">Systemische Kompetenz:</label>
        <input class="module_change_editor" type="string" id="module_change_systemicCompetence" name="module_change_systemicCompetence"/>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_communicativeCompetence">Kommunikative Kompetenz:</label>
        <input class="module_change_editor" type="string" id="module_change_communicativeCompetence" name="module_change_communicativeCompetence"/>
    </div>
   
    <h3>Lehr- und Lernformen/Workload</h3>

   
    <div id="module_change_categories_div">   
        <button type="button" name="module_change_categoryEntry" onclick="addCategoryEntry(false)">Kategorie hinzufügen</button>
        <div class="form_item">
            <!--how to implement more optional selectfields and workloadfields?
                how to implement the workload of Classroom courses -->
    <!--TODO: show previously chosen value as chosen option-->
            <label class="form_label" for="module_change_category">Kategorie:</label>
            <select class="form_select" id="module_change_category" name="module_change_category">
                <?php
                    if($resultCategories->num_rows) {
                        foreach($resultCategories as $category) {
                        ?>
                            <option value="<?php echo $category["ID"];?>"><?php echo $category["name"];?></option>
                        <?php
                        }
                    }
                ?>
            </select>
        </div>

        <div class="form_item">
            <label class="form_label" for="module_change_categoryWorkload">Workload (h):</label>
            <input class="form_input" type="number" id="module_change_categoryWorkload" name="module_change_categoryWorkload" value="<?php echo $resultModule_Category->workload;?>"/>
        </div>
    <!--TODO: show previously chosen value as chosen radio button-->
        <div class="form_item">
            <input class="form_radio" type="radio" id="module_change_TheoryFlag_theory" name="module_change_TheoryFlag" value="1"/>
            <label for="module_change_TheoryFlag">EVL Theorie</label>
            <input class="form_radio" type="radio" id="module_change_TheoryFlag_practical" name="module_change_TheoryFlag" value="0"/>
            <label for="module_change_TheoryFlag">EVL Praxis</label>
        </div>
    </div>
 
    <h3>Prüfungsleistungen (PL)</h3>
    <button type="button" name="module_change_examEntry" onclick="addExamEntry(false)">Prüfungsleistung hinzufügen</button>
<!--TODO: show more Entries to change-->
<!--TODO: show previously chosen value as chosen option-->
    <div class="form_item" id="module_change_examType_div">
        <label class="form_label" for="module_change_examType">Art der PL:</label>
        <select class="form_select" id="module_change_examType" name="module_change_examType">
            <option value="1">Klausurarbeit</option>
            <option value="2">Mündliche Prüfungen</option>
            <option value="3">Mündliches Fachgespräch</option>
            <option value="4">Präsentation</option>
            <option value="5">Projektarbeit</option>
            <option value="6">Präsentation</option>
            <option value="7">Seminararbeit</option>
            <option value="8">Programmentwurf</option>
            <option value="9">Prüfung am Computer</option>
            <option value="10">Praktische Prüfung</option>
        </select>
    </div>

    <div class="form_item" id="module_change_examDuration_div">
        <label class="form_label" for="module_change_examDuration">Dauer (min):</label>
        <input class="form_input" type="string" id="module_change_examDuration" name="module_change_examDuration" value="<?php if($resultExams) {echo $resultExams->examDuration;}?>"/>
    </div>

    <div class="form_item" id="module_change_examCircumference_div">
        <label class="form_label" for="module_change_examCircumference">Umfang (Seiten):</label>
        <input class="form_input" type="string" id="module_change_examCircumference" name="module_change_examCircumference" value="<?php if($resultExams) {echo $resultExams->examCircumference;}?>"/>
    </div>

    <div class="form_item" id="module_change_examPeriod_div">
        <label class="form_label" for="module_change_examPeriod">Prüfungszeitraum:</label>
        <input class="form_input" type="string" id="module_change_examPeriod" name="module_change_examPeriod"  value="<?php if($resultExams) {echo $resultExams->examPeriod;}?>"/>
    </div>

    <div class="form_item" id="module_change_examWeighting_div">
        <label class="form_label" for="module_change_examWeighting">Gewichtung:</label>
        <input class="form_input" type="string" id="module_change_examWeighting" name="module_change_examWeighting"  value="<?php if($resultExams) {echo $resultExams->examWeighting;}?>" required/>
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

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_basicLiteraturePreNote">Basisliteratur (Vorbemerkungen):</label>
        <input class="module_change_editor" type="string" id="module_change_basicLiteraturePreNote" name="module_change_basicLiteraturePreNote"/>
    </div>

<!--TODO: show previously chosen value as chosen option-->
    <div class="form_item" id="module_change_basicLiterature_div">
        <label class="form_label" for="module_change_basicLiterature">Basisliteratur:</label>
        <button type="button" name="module_change_basicLiteratureEntry" onclick="addBasicLiteratureEntry(false)">Basisliteratur hinzufügen</button>
        <select  class="form_select" id="module_change_basicLiterature" name="module_change_basicLiterature">
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

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_basicLiteraturePostNote">Basisliteratur (Nachbemerkungen):</label>
        <input class="module_change_editor" type="string" id="module_change_basicLiteraturePostNote" name="module_change_basicLiteraturePostNote"/>
    </div>

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_deepeningLiteraturePreNote">Vertiefende Literatur (Vorbemerkungen):</label>
        <input class="module_change_editor" type="string" id="module_change_deepeningLiteraturePreNote" name="module_change_deepeningLiteraturePreNote"/>
    </div>

<!--TODO: show previously chosen value as chosen option-->
    <div class="form_item" id="module_change_deepeningLiterature_div">
        <label class="form_label" for="module_change_deepeningLiterature">Vertiefende Literatur:</label>
        <button type="button" name="module_change_deepeningLiteratureEntry" onclick="addDeepeningLiteratureEntry(false)">Vertiefende Literatur hinzufügen</button>
        <select class="form_select" id="module_change_deepeningLiterature" name="module_change_deepeningLiterature">
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

<!--TODO: show previously written text in editor-->
    <div class="form_item">
        <label class="form_label" for="module_change_deepeningLiteraturePostNote">Vertiefende Literatur (Nachbemerkungen):</label>
        <input  class="module_change_editor" type="string" id="module_change_deepeningLiteraturePostNote" name="module_change_deepeningLiteraturePostNote"/>
    </div>

    <hr>

    <button type="submit" name="module_change_submit" value="<?php echo $result->ID;?>">Speichern</button>
</form>