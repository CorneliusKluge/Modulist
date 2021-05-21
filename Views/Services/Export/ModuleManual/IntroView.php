<h1>
    Modulhandbuch für den Studiengang
    <span>Informationstechnlogie</span>
    mit den Studienrichtungen
    <span>Informationstechnik und Medieninformatik</span> // ???
    <br>
    an der
    Berufsakademie Sachsen
    Staatliche Studienakademie Dresden
</h1>
Der  jeweils  ausgewiesene  Modulverantwortliche  ist  Ansprechpartner  für  die  fachliche  Erstellung  und  Fragen und Anforderungen zur inhaltlichen Weiterentwicklung des Moduls.
Der  Leiter  des Studiengangs  Informationstechnologie ist  für  die  inhaltliche  und  organisatorische  Gestaltung  verantwortlich  und  steht  für  Fragen  und  Hinweise  zur  Verfügung  (siehe  Sächsisches  Berufsakademiegesetz §19)
Herr Prof. Dr.-Ing. Lutz ZipfelE-Mail: lutz.zipfel@ba-dresden.de

<b>Erläuterung des Modulcode</b>
<br>
<table>
    <tr>
        <td style="width: 300px;">Modulcode</td>
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
        <td>Standort (numerisch, entsprechend Statistik Kamenz)</td>
        <th>3</th>
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
        <td>Bezeichnung Studiengang/Studienrichtung (alphab.) </td>
        <td></td>
        <th>I</th>
        <th>M</th>
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
        <td>Kennzeichnung des Inhaltes; maximal 5 Stellen</td>
        <td></td>
        <td></td>
        <td></td>
        <td>-</td>
        <th>M</th>
        <th>A</th>
        <th>T</th>
        <th>H</th>
        <th>E</th>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>empfohlene Semesterlage (1 ... 6), bei Moduldauer von 2 Semestern wird das folgende Semester eingetragen</td>
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
        <th>1</th>
        <th>0</th>
    </tr>
</table>

Standortcode:
1 - Studienort Bautzen
2 - Studienort Breitenbrunn
3 - Studienort Dresden
4 - Studienort Glauchau
5 - Studienort Leipzig
6 - Studienort Riesa
7 - Studienort Plauen

<b>Inhaltsverzeichnis</b>
<?php
if($result->num_rows) {
    foreach($result as $module) {
    ?>
    <?php echo $module["name"];?><br>
    <?php
    }
}