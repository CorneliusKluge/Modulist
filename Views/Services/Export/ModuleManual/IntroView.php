<?php

use Modulist\Models\FieldModel;

$fieldString = "";
foreach($resultFields as $field) {
    $fieldString .= $field["name"] . ", ";
}
$fieldString = substr($fieldString, 0, -2);
$fieldString = substr_replace($fieldString, " und", strrpos($fieldString, ","), 1);
?>
<div class="heading_container">
    <h1>Modulhandbuch für den Studiengang</h1>
    <?php echo $courseName;?>
    <h1>mit den Studienrichtungen</h1>
    <?php echo $fieldString; ?>
    <br>
    <br>
    <br>
    <h1>an der Berufsakademie Sachsen Staatliche Studienakademie Dresden</h1>
</div>

<span class="page_break"></span>

<div class="intro_container">
    Der  jeweils  ausgewiesene  Modulverantwortliche  ist  Ansprechpartner  für  die  fachliche  Erstellung  und  Fragen und Anforderungen zur inhaltlichen Weiterentwicklung des Moduls.<br>
    Der  Leiter  des Studiengangs  Informationstechnologie ist  für  die  inhaltliche  und  organisatorische  Gestaltung  verantwortlich  und  steht  für  Fragen  und  Hinweise  zur  Verfügung  (siehe  Sächsisches  Berufsakademiegesetz §19)
    <div class="intro_name_mail_grid">
        <table>
            <tr>
                <td class="column_1">
                    Herr Prof. Dr.-Ing. Lutz Zipfel 
                </td>
                <td class="column_2">
                    lutz.zipfel@ba-dresden.de
                </td>
            </tr>
        </table>
        
        
    </div>
</div>

<div class="table_container">
    <b>Erläuterung des Modulcode</b>
    <br>
    <table class="module_table">
        <tr>
            <td class="table_text">Modulcode</td>
            <td>3</td>
            <td>I</td>
            <td>M</td>
            <td>-</td>
            <td>M</td>
            <td>A</td>
            <td>T</td>
            <td>H</td>
            <td>E</td>
            <td>-</td>
            <td>1</td>
            <td>0</td>
        </tr>
        <tr>
            <td class="table_text">Standort (numerisch, entsprechend Statistik Kamenz)</td>
            <td class="cell_styled">3</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_text">Bezeichnung Studiengang/Studienrichtung (alphab.) </td>
            <td></td>
            <td class="cell_styled">I</td>
            <td class="cell_styled">M</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_text">Kennzeichnung des Inhaltes; maximal 5 Stellen</td>
            <td></td>
            <td></td>
            <td></td>
            <td>-</td>
            <td class="cell_styled">M</td>
            <td class="cell_styled">A</td>
            <td class="cell_styled">T</td>
            <td class="cell_styled">H</td>
            <td class="cell_styled">E</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td class="table_text">empfohlene Semesterlage (1 ... 6), bei Moduldauer von 2 Semestern wird das folgende Semester eingetragen</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>-</td>
            <td class="cell_styled">1</td>
            <td class="cell_styled">0</td>
        </tr>
    </table>
</div>

<div class="places_code">
    Standortcode: <br><br>
    1 - Studienort Bautzen<br>
    2 - Studienort Breitenbrunn<br>
    3 - Studienort Dresden<br>
    4 - Studienort Glauchau<br>
    5 - Studienort Leipzig<br>
    6 - Studienort Riesa<br>
    7 - Studienort Plauen
</div>


<!--<span class="page_break"></span>

<b>Inhaltsverzeichnis</b>
<?php
if($result->num_rows) {
    foreach($result as $module) {
    ?>
    <?php echo $module["name"];?><br>
    <?php
    }
}
?>
-->

