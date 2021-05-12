<h2>Liste der Module</h2>

<br>
<?php
        if($result->num_rows) {
            ?>
<div>
    <input type="search" id="module_list_search" name="module_list_search" placeholder="Suche">
    <input type="button" id="module_list_add" name="module_list_add">
<table id="module_list_table">
    <!--what should be part of the table?-->
    <th>Modulname</th>
<!--<th>Modulname (Englisch)</th>-->
    <th>Modulcode</th>
<!--<th>Zusammenfassung</th>
    <th>Zusammenfassung (Englisch)</th>-->
    <th>Modultyp</th>
    <th?>Semester</th>
<!--<th>Dauer</th>-->
    <th>Credits</th>
<!--<th>Verwendbarkeit</th>
    <th>Zulassungsvoraussetzungen Prüfung</th>
    <th>Teilnahmevoraussetzungen</th>
    <th>Lerninhalte</th>
    <th>Wissensverbreiterung</th>
    <th>Wissensvertiefung</th>
    <th>Instrumentale Kompetenz</th>
    <th>Systemische Kompetenz</th>
    <th>Kommunikative Kompetenz</th>-->

    <!--or just show total workload?-->
    <!--<th>Kategorie</th>-->
    <th>Workload</th>

<!--<th>Prüfungsart</th>
    <th>Prüfungsdauer</th>
    <th>Umfang</th>
    <th>Prüfungszeitraum</th>
    <th>Gewichtung</th>-->
    <th>Verantwortlicher</th>
<!--<th>Unterrichtssprache</th>-->
    <th>Angebotsfrequenz</th>
<!--<th>Medien/Arbeitsmaterialien</th>
    <th>Basisliteratur (Vorbemerkung)</th>
    <th>Basisliteratur</th>
    <th>Basisliteratur (Nachbemerkung)</th>
    <th>Vertiefende Literatur (Vorbemerkung)</th>
    <th>Vertiefende Literatur</th>
    <th>Vertiefende Literatur (Nachbemerkung)</th>-->
    <th>Validität</th>
    <th></th>
 
    <?php foreach($result as $module) {
            ?>
                <tr>
                    <!--what should be part of the table?-->
                    <td><?php echo $module["name"];?></td>
                    <!--<td><?php echo $module["nameEN"];?></td>-->
                    <td><?php echo $module["code"];?></td>
                    <!--<td><?php echo $module["summary"];?></td>
                    <td><?php echo $module["summaryEN"];?></td>
                    <td><?php echo $module["type"];?></td>-->
                    <td><?php echo $module["semester"];?></td>
                    <!--<td><?php echo $module["duration"];?></td>-->
                    <td><?php echo $module["credits"];?></td>
                    <!--<td><?php echo $module["usability"];?></td>
                    <td><?php echo $module["examRequirement"];?></td>
                    <td><?php echo $module["participationRequirement"];?></td>
                    <td><?php echo $module["studyContent"];?></td>
                    <td><?php echo $module["knowledgeBroadening"];?></td>
                    <td><?php echo $module["knowledgeDeepening"];?></td>
                    <td><?php echo $module["instrumentalCompetence"];?></td>
                    <td><?php echo $module["systemicCompetence"];?></td>
                    <td><?php echo $module["communicativeCompetence"];?></td>-->

                    <!--use other tables here (categories and module_category_mm)?
                        or just show total workload?-->
                    <!--<td><?php echo $module["name"];?></td>--> <!--categories-->
                    <td><?php echo $module["totalworkload"];?></td> <!--module_category_mm-->

                    <!--<td><?php echo $module["examType"];?></td>
                    <td><?php echo $module["examDuration"];?></td>
                    <td><?php echo $module["examCircumference"];?></td>
                    <td><?php echo $module["examPeriod"];?></td>
                    <td><?php echo $module["examWeighting"];?></td>-->
                    <td><?php echo $module["responsible"];?></td>
                    <!--<td><?php echo $module["lectureLanguage"];?></td>-->
                    <td><?php echo $module["frequency"];?></td>
                    <!--<td><?php echo $module["media"];?></td>-->

                    <!--how to use other tables here (literature)?-->
                    <!--<td><?php echo $module["basicLiteraturePreNote"];?></td>
                    <td><?php echo $module["basicLiterature"];?></td>
                    <td><?php echo $module["basicLiteraturePostNote"];?></td>
                    <td><?php echo $module["deepeningLiteraturePreNote"];?></td>
                    <td><?php echo $module["deepeningLiterature"];?></td> 
                    <td><?php echo $module["deepeningLiteraturePostNote"];?></td>-->
                    
                    <td><!--TODO: proof validity and show result--></td>
                    <td>
                        <button id="module_list_edit" name="module_list_edit" value="<?php echo $module["ID"];?>">Bearbeiten</button>
                        <button id="module_list_delete" name="module_list_delete" value="<?php echo $module["ID"];?>">Löschen</button>
                        <label id="module_list_lockLabel">
                            <input type="checkbox" id="module_list_lock" name="module_list_lock"/>
                            <span></span>
                        </label>
                    </td>
                </tr>
            <?php
            }
        }
    ?>
</table>