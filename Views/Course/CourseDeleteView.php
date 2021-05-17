<?php
if($result) {
?>
Sind Sie sicher, dass Sie den Studiengang <?php echo $result->name;?> löschen möchten?
<button id="course_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
<button class="button_close">Abbrechen</button>
<?php
}
else {
?>
Der ausgewählte Studiengang konnte nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}