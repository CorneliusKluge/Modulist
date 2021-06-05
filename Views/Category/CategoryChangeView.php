<?php
if($result) {
?>
<form method="POST" class="form_container">
    <h2>Modulkategorie hinzufügen</h2>

    <div class="form_item">
        <label class="form_label" for="category_change_name">Name:*</label>
        <input class="form_input" type="string" id="category_change_name" name="category_change_name" value="<?php echo $result->name;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="category_change_presenceFlag">Präsenz:*</label>
        <input class="form_input" type="checkbox" value="1" id="category_change_presenceFlag" name="category_change_presenceFlag" value="<?php echo $result->presenceFlag;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="category_change_position">Position:*</label>
        <input class="form_input" type="number" id="category_change_position" name="category_change_position" value="<?php echo $result->position;?>"/>
    </div>

    <span class="mandatory_notice">*Pflichtfeld</span>
    <button type="submit" name="category_change_submit" id="category_change_submit" class="form_submit button" value="<?php echo $result->ID;?>">Bearbeitung Speichern</button>
</form>
<?php
}
else {
?>
Die ausgewählte Modulkategorie konnte nicht gefunden werden.
<button class="button_close">OK</button>
<?php
}