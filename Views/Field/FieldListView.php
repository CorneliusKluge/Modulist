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
        
        <td class="table_row_functions">
            <button type="button" class="button button_change_field table_edit_button" data-id="<?php echo $field["ID"];?>"></button>
            <button type="button" class="button button_delete_field table_delete_button" data-id="<?php echo $field["ID"];?>"></button>
        </td>
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