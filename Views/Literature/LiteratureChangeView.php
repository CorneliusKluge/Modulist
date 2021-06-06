<form method="POST" class="form_container">
    <h2>Literatur bearbeiten</h2>

    <div class="form_item">
        <label class="form_label" for="literature_change_authors">Autoren:*</label>
        <input class="form_input" type="string" id="literature_change_authors" name="literature_change_authors" value="<?php echo $result->authors;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_change_title">Titel:*</label>
        <input class="form_input" type="string" id="literature_change_title" name="literature_change_title" value="<?php echo $result->title;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_change_year">Jahr der Veröffentlichung:*</label>
        <input class="form_input" type="number" id="literature_change_year" name="literature_change_year" value="<?php echo $result->year;?>"/>
    </div>
 
    <div class="form_item">
        <label class="form_label" for="literature_change_edition">Auflage:</label>
        <input class="form_input" id="literature_change_edition" name="literature_change_edition" value="<?php echo $result->edition;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_change_place">Ort der Veröffentlichung:</label>
        <input class="form_input" type="string" id="literature_change_place" name="literature_change_place" value="<?php echo $result->place;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_change_publisher">Verlag:</label>
        <input class="form_input" type="string" id="literature_change_publisher" name="literature_change_publisher" value="<?php echo $result->publisher;?>"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_change_isbn">ISBN:</label>
        <input class="form_input" type="string" id="literature_change_isbn" name="literature_change_isbn" value="<?php echo $result->isbn;?>"/>
    </div>
    
    <span class="mandatory_notice">*Pflichtfeld</span>
    <button class="form_submit button" type="submit" name="literature_change_submit" value="<?php echo $result->ID;?>">Speichern</button>
</form>