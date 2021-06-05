<?php
if($result->num_rows) {
?>
<table>
    <tr>
        <th>Name</th>
        <th>Name (Englisch)</th>
    </tr>
    <?php
    foreach($result as $course) {
    ?>
    <tr>
        <td><?php echo $course["name"];?></td>
        <td><?php echo $course["nameEN"];?></td>
        <td class="table_row_functions">
            <button type="button" class="button button_change_course table_edit_button" data-id="<?php echo $course["ID"];?>"></button>
            <button type="button" class="button button_delete_course table_delete_button" data-id="<?php echo $course["ID"];?>"></button>
        </td>
    </tr>
    <?php
    }
    ?>
</table>
<?php  
}
else {
    echo "Aktuell sind keine Studiengänge eingetragen.";
}