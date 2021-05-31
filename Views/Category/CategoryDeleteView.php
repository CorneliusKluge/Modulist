<?php
    if($result) {
    ?>
    <div class="message_container">
        Sind Sie sicher, dass Sie die Modulkategorie <?php echo $result->name;?> löschen möchten?
        <div class="message_button_container">
            <form class="message_form" method="POST">
                <button class="button message_button" type="submit" id="category_delete_submit" name="category_delete_submit" value="<?php echo $result->ID;?>">Ja</button>
            </form>
            <button class="button message_button">Abbrechen</button>
        </div>
    </div>
    <?php
    }
    else {
    ?>
    <div class="message_container">
        Die ausgewählte Modulkategorie konnte nicht gefunden werden.
        <button class="button_close">OK</button>
    </div>
<?php
}