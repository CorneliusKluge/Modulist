<?php
if($result) {
?>
Sind Sie sicher, dass Sie die Literaturangaben <?php echo $result->title;?> löschen möchten?
<div class="messager_button_container">
    <form method="POST">
        <button type="submit" id="literature_delete_submit" name="literature_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
    </form>
    <button class="button_close">Abbrechen</button>
</div>
<?php
}
else {
?>
Die ausgewählten Literaturangaben konnten nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}