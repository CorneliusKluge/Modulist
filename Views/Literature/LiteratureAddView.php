<!-- %s  -->

<form method="POST" class="form_container">
    <h2>Literatur hinzufügen</h2>

    <div class="form_item">
        <label class="form_label" for="literature_add_authors">Autoren:*</label>
        <input class="form_input" type="string" id="literature_add_authors" name="literature_add_authors"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_add_title">Titel:*</label>
        <input class="form_input" type="string" id="literature_add_title" name="literature_add_title"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_add_year">Jahr der Veröffentlichung:*</label>
        <input class="form_input" type="string" id="literature_add_year" name="literature_add_year"/>
    </div>
 
    <div class="form_item">
        <label class="form_label" for="literature_add_edition">Auflage:</label>
        <input class="form_input" id="literature_add_edition" name="literature_add_edition"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_add_place">Ort der Veröffentlichung:</label>
        <input class="form_input" type="string" id="literature_add_place" name="literature_add_place"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_add_publisher">Verlag:</label>
        <input class="form_input" type="string" id="literature_add_publisher" name="literature_add_publisher"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="literature_add_isbn">ISBN:</label>
        <input class="form_input" type="string" id="literature_add_isbn" name="literature_add_isbn"/>
    </div>
    
    <span class="mandatory_notice">*Pflichtfeld</span>
    <input class="form_submit button" type="submit" name="literature_add_submit"/>
</form>