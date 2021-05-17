<?php
if($result->num_rows) {
?>
<table>
    <tr>
        <th>Name</th>
        <th>Name (Englisch)</th>
        <th>Studiengang</th>
    </tr>
    <?php
    foreach($result as $field) {
    ?>
    <tr>
        <td><?php echo $field["name"];?></td>
        <td><?php echo $field["nameEN"];?></td>
        <td><?php echo $field["courseName"] . "(" . $field["courseID"] . ")";?></td>
        <td><button type="button" class="button_change_field" data-id="<?php echo $field["ID"];?>">Bearbeiten</button></td>
        <td><button type="button" class="button_delete_field" data-id="<?php echo $field["ID"];?>">Löschen</button></td>
    </tr>
    <?php
    }
    ?>
</table>
<?php  
}
else {
    echo "Aktuell sind keine Studienrichtungen eingetragen.";
}