
%s

<form method="POST" class="form_container">
    <h2>Modul hinzufügen</h2>

    <div class="form_item">
        <label class="form_label" for="module_add_name">Name:</label>
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
        <label class="form_label" for="module_add_field">Studienrichtung:</label>
        <select class="form_select" id="module_add_field" name="module_add_field">
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
        <!--how to implement more optional selectfields and workloadfields?
            how to implement the workload of Classroom courses -->
        <label class="form_label" for="module_add_category">Kategorie:</label>
        <select class="form_select" id="module_add_category" name="module_add_category">
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
        <label class="form_label" for="module_add_categoryWorkload">Workload (h):</label>
        <input class="form_input" type="number" id="module_add_categoryWorkload" name="module_add_categoryWorkload"/>
    </div>

    <div class="form_item">
    <label class="form_label">Einteilung EVL Theorie/Praxis</label>
        <div class="form_radio_entry">
            <input class="form_radio_box" type="radio" id="module_add_TheoryFlag_theory" name="module_add_TheoryFlag" value="1"/>
            <label class="form_radio_label" for="module_add_TheoryFlag">EVL Theorie</label>
        </div>
        <div class="form_radio_entry">
            <input class="form_radio_box" type="radio" id="module_add_TheoryFlag_practical" name="module_add_TheoryFlag" value="0"/>
            <label class="form_radio_label" for="module_add_TheoryFlag">EVL Praxis</label>
        </div>
    </div>
 
    <h3>Prüfungsleistungen (PL)</h3>

    <!-- how to add more?-->
    <div class="form_item">
        <label class="form_label" for="module_add_examType">Art der PL:</label>
        <select class="form_select" id="module_add_examType" name="module_add_examType">
            <option value="0">Klausurarbeit</option>
            <option value="1">Mündliche Prüfungen</option>
            <option value="2">Mündliches Fachgespräch</option>
            <option value="3">Präsentation</option>
            <option value="4">Projektarbeit</option>
            <option value="5">Präsentation</option>
            <option value="6">Seminararbeit</option>
            <option value="7">Programmentwurf</option>
            <option value="8">Prüfung am Computer</option>
            <option value="9">Praktische Prüfung</option>
        </select>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_examDuration">Dauer (min):</label>
        <input class="form_input" type="string" id="module_add_examDuration" name="module_add_examDuration"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_examCircumference">Umfang (Seiten):</label>
        <input class="form_input" type="string" id="module_add_examCircumference" name="module_add_examCircumference"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_examPeriod">Prüfungszeitraum:</label>
        <input class="form_input" type="string" id="module_add_examPeriod" name="module_add_examPeriod" required/>
    </div>

    <div class="form_item">
        <label class="form_label" for="module_add_examWeighting">Gewichtung:</label>
        <input class="form_input" type="string" id="module_add_examWeighting" name="module_add_examWeighting" required/>
    </div>
    <!--until here -> one table row (exams)-->

    <div class="form_item">
        <label class="form_label" for="module_add_responsible">Modulverantwortlicher:</label>
        <input class="form_input" type="string" id="module_add_responsible" name="module_add_responsible"/>
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
    
    <div class="form_item">
        <label class="form_label" for="module_add_basicLiterature">Basisliteratur:</label>
        <select  class="form_select" id="module_add_basicLiterature" name="module_add_basicLiterature">
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

    <div class="form_item">
        <label class="form_label" for="module_add_deepeningLiterature">Vertiefende Literatur:</label>
        <select class="form_select" id="module_add_deepeningLiterature" name="module_add_deepeningLiterature">
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

    <input class="form_submit button" type="submit" name="module_add_submit"/>
</form>