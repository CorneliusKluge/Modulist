<?php
if($result) {
?>
    Sind Sie sicher, dass Sie die Literature <?php echo $result->name;?> löschen möchten?
    <button id="literature_delete_submit" data-id="<?php echo $result->ID;?>">Ja</button>
    <button class="button_close">Abbrechen</button>
<?php
}

else {
?>
    Die ausgewählte Studienrichtung konnte nicht gefunden werden.
    <button class="button_close">OK</button>
<?php
}