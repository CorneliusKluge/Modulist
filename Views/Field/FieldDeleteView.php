<?php
if($result) {
?>
    <div class="message_container">
        Sind Sie sicher, dass Sie die Studienrichtung <?php echo $result->name;?> löschen möchten?
        <div class="message_button_container">
            <button class="button message_button" id="field_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
            <button class="button message_button">Abbrechen</button>
        </div>
    </div>
<?php
}
else {
?>
    <div class="message_container">
        Die ausgewählte Studienrichtung konnte nicht gefunden werden.
        <button class="button message_button">OK</button>
    </div>
<?php
}