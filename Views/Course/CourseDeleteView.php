<?php
if($result) {
?>
Sind Sie sicher, dass Sie den Studiengang <?php echo $result->name;?> löschen möchten?
<div class="message_button_container">
    <button class="button message_button" id="course_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
    <button class="button message_button close">Abbrechen</button>
</div>
<?php
}
else {
?>
Der ausgewählte Studiengang konnte nicht gefunden werden.
<button class="button message_button">OK</button>
<?php
}