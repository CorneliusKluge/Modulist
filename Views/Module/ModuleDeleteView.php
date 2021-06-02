<?php
if($result) {
?>
<div class="message_container">
    Sind Sie sicher, dass Sie das Modul <?php echo $result->name;?> löschen möchten?
    <div class="message_button_container">
        <form method="POST">
            <button class="button message_button" type="submit" id="module_delete_submit" name="module_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
        </form>
        <form method="POST">
            <button class="button message_button" type="submit">Abbrechen</button>
        </form>
    </div>
</div>
<?php
}
else {
?>
    Das ausgewählte Modul konnte nicht gefunden werden.
    <button class="button">OK</button>
<?php
}