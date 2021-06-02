<?php
if($result) {
?>
<div class="message_container">
Sind Sie sicher, dass Sie die Literaturangaben <?php echo $result->title;?> löschen möchten?
<div class="message_button_container">
    <form method="POST">
        <button class="button message_button" type="submit" id="literature_delete_submit" name="literature_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
    </form>
    <form method="POST">
        <button class="button message_button">Abbrechen</button>
    </form>
</div>
</div>
<?php
}
else {
?>
Die ausgewählten Literaturangaben konnten nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}