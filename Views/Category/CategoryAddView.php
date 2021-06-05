<form method="POST" class="form_container">
    <h2>Modulkategorie hinzufügen</h2>

    <div class="form_item">
        <label class="form_label" for="category_add_name">Name:*</label>
        <input class="form_input" type="string" id="category_add_name" name="category_add_name"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="category_add_presenceFlag">Präsenz:*</label>
        <input class="form_input" type="checkbox" value="1" id="category_add_presenceFlag" name="category_add_presenceFlag"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="category_add_position">Position:*</label>
        <input class="form_input" type="number" id="category_add_position" name="category_add_position"/>
    </div>
 
    <span class="mandatory_notice">*Pflichtfeld</span>
    <input class="form_submit button" type="submit" name="category_add_submit"/>
</form>