<h1>Modul hinzufügen</h1>

%s

<form method="POST">
    <label for="module_add_name">Name:</label>
    <input type="string" id="module_add_name" name="module_add_name"/>

    <br>

    <label for="module_add_nameEN">Name (Englisch):</label>
    <input type="string" id="module_add_nameEN" name="module_add_nameEN"/>

    <br>

    <label for="module_add_code">Modulcode:</label>
    <input type="string" id="module_add_code" name="module_add_code"/>

    <br>
  
    <label for="module_add_field">Studienrichtung:</label>
    <select id="module_add_field" name="module_add_field">
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

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_summary">Zusammenfassung:</label>
    <input type="string" id="module_add_summary" name="module_add_summary"/>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_summaryEN">Zusammenfassung (Englisch):</label>
    <input type="string" id="module_add_summaryEN" name="module_add_summaryEN"/>

    <br>

    <label for="module_add_type">Modultyp:</label>
    <input type="string" id="module_add_type" name="module_add_type"/>

    <br>
    
    <label for="module_add_semester">Belegung gemäß Studienablaufplan (Semesternummer):</label>
    <input type="number" id="module_add_semester" name="module_add_semester" min="1" max="6"/>

    <br>
    
    <label for="module_add_duration">Dauer (Semesteranzahl):</label>
    <input type="number" id="module_add_duration" name="module_add_duration" min="1" max="6"/>

    <br>
    
    <label for="module_add_credits">Credits:</label>
    <input type="number" id="module_add_credits" name="module_add_credits" min="0" max="180"/>

    <br>
        
    <label for="module_add_usability">Verwendbarkeit:</label>
    <input type="string" id="module_add_usability" name="module_add_usability"/>

    <br>
        
    <label for="module_add_examRequirement">Zulassungsvoraussetzungen für die Modulprüfung:</label>
    <input type="string" id="module_add_examRequirement" name="module_add_examRequirement"/>

    <br>
        
    <label for="module_add_participationRequirement">Voraussetzungen für die Teilnahme am Modul:</label>
    <input type="string" id="module_add_participationRequirement" name="module_add_participationRequirement"/>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_studyContent">Lerninhalte:</label>
    <input type="string" id="module_add_studyContent" name="module_add_studyContent"/>

    <br>
    
    <h2>Lernergebnisse</h2>

    <br>

    <h3>Wissen und Verstehen</h3>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_knowledgeBroadening">Wissensverbreiterung:</label>
    <input type="string" id="module_add_knowledgeBroadening" name="module_add_knowledgeBroadening"/>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_knowledgeDeepening">Wissensvertiefung:</label>
    <input type="string" id="module_add_knowledgeDeepening" name="module_add_knowledgeDeepening"/>

    <br>
    
    <h3>Können/Kompetenz</h3>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_instrumentalCompetence">Instrumentale Kompetenz:</label>
    <input type="string" id="module_add_instrumentalCompetence" name="module_add_instrumentalCompetence"/>

    <br>

    <!--TODO: Text Editor instead of input field-->    
    <label for="module_add_systemicCompetence">Systemische Kompetenz:</label>
    <input type="string" id="module_add_systemicCompetence" name="module_add_systemicCompetence"/>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_communicativeCompetence">Kommunikative Kompetenz:</label>
    <input type="string" id="module_add_communicativeCompetence" name="module_add_communicativeCompetence"/>

    <br>
    
    <h2>Lehr- und Lernformen/Workload</h2>

    <br>

    <!--how to implement more optional selectfields and workloadfields?
        how to implement the workload of Classroom courses -->
    <label for="module_add_category">Kategorie:</label>
    <select id="module_add_category" name="module_add_category">
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

    <label for="module_add_categoryWorkload">Workload (h):</label>
    <input type="number" id="module_add_categoryWorkload" name="module_add_categoryWorkload" min="0"/>

    <br>
 
    <h2>Prüfungsleistungen (PL)</h2>
    <!-- how to add more?-->
    <br>

    <!--TODO: add all examTypes to the selection-->
    <label for="module_add_examType">Art der PL:</label>
    <select id="module_add_examType" name="module_add_examType">
        <option value="0">Klausur</option>
        <option value="1">Klausurarbeit</option>
    </select>

    <br>
    
    <label for="module_add_examDuration">Dauer (min):</label>
    <input type="string" id="module_add_examDuration" name="module_add_examDuration"/>

    <br>

    <label for="module_add_examCircumference">Umfang (Seiten):</label>
    <input type="string" id="module_add_examCircumference" name="module_add_examCircumference"/>

    <br>

    <label for="module_add_examPeriod">Prüfungszeitraum:</label>
    <input type="string" id="module_add_examPeriod" name="module_add_examPeriod"/>

    <br>

    <label for="module_add_examWeighting">Gewichtung:</label>
    <input type="string" id="module_add_examWeighting" name="module_add_examWeighting"/>
    <!--until here -> one table row (exams)-->
    <br>

    <label for="module_add_responsible">Modulverantwortlicher:</label>
    <input type="string" id="module_add_responsible" name="module_add_responsible"/>

    <br>
    
    <label for="module_add_lectureLanguage">Unterrichtssprache:</label>
    <input type="string" id="module_add_lectureLanguage" name="module_add_lectureLanguage"/>

    <br>
        
    <label for="module_add_frequency">Angebotsfrequenz:</label>
    <input type="string" id="module_add_frequency" name="module_add_frequency"/>

    <br>
        
    <label for="module_add_media">Medien/Arbeitsmaterialien:</label>
    <input type="string" id="module_add_media" name="module_add_media"/>

    <br>

    <h2>Literatur</h2>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_basicLiteraturePreNote">Basisliteratur (Vorbemerkungen):</label>
    <input type="string" id="module_add_basicLiteraturePreNote" name="module_add_basicLiteraturePreNote"/>

    <br>

    <label for="module_add_basicLiterature">Basisliteratur:</label>
    <select id="module_add_basicLiterature" name="module_add_basicLiterature">
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

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_basicLiteraturePostNote">Basisliteratur (Nachbemerkungen):</label>
    <input type="string" id="module_add_basicLiteraturePostNote" name="module_add_basicLiteraturePostNote"/>

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_deepeningLiteraturePreNote">Vertiefende Literatur (Vorbemerkungen):</label>
    <input type="string" id="module_add_deepeningLiteraturePreNote" name="module_add_deepeningLiteraturePreNote"/>

    <br>

    <label for="module_add_deepeningLiterature">Vertiefende Literatur:</label>
    <select id="module_add_deepeningLiterature" name="module_add_deepeningLiterature">
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

    <br>

    <!--TODO: Text Editor instead of input field-->
    <label for="module_add_deepeningLiteraturePostNote">Vertiefende Literatur (Nachbemerkungen):</label>
    <input type="string" id="module_add_deepeningLiteraturePostNote" name="module_add_deepeningLiteraturePostNote"/>

    <br>

    <input type="submit" name="module_add_submit"/>
</form>