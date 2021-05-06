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
        <td><button type="button" class="button_change_course" data-id="<?php echo $course["ID"];?>">Bearbeiten</button></td>
        <td><button type="button" class="button_delete_course" data-id="<?php echo $course["ID"];?>">Löschen</button></td>
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