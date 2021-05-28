<?php
if($result) {
?>
Sind Sie sicher, dass Sie die Modulkategorie <?php echo $result->name;?> löschen möchten?
<form method="POST">
    <button type="submit" id="category_delete_submit" name="category_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
</form>
<button class="button_close">Abbrechen</button>
<?php
}
else {
?>
Die ausgewählte Modulkategorie konnte nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}