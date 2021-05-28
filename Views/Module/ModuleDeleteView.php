<?php
if($result) {
?>
Sind Sie sicher, dass Sie das Modul <?php echo $result->name;?> löschen möchten?
<form method="POST">
<button type="submit" id="module_delete_submit" name="module_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
</form>
<form method="POST">
<button class="button_close" type="submit">Abbrechen</button>
</form>
<?php
}
else {
?>
Das ausgewählte Modul konnte nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}