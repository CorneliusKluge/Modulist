<?php
if($result) {
?>
Sind Sie sicher, dass Sie die Studienrichtung <?php echo $result->name;?> löschen möchten?
<div class="messager_button_container">
    <button id="field_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
    <button class="button_close">Abbrechen</button>
</div>
<?php
}
else {
?>
Die ausgewählte Studienrichtung konnte nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}