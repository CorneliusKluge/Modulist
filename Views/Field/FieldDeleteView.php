<?php
if($result) {
?>
Sind Sie sicher, dass Sie die Studienrichtung <?php echo $result->name;?> löschen möchten?
<div class="message_button_container">
    <button class="button message_button" id="field_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
    <button class="button message_button">Abbrechen</button>
</div>
<?php
}
else {
?>
Die ausgewählte Studienrichtung konnte nicht gefunden werden.
<button class="button message_button">OK</button>
<?php
}