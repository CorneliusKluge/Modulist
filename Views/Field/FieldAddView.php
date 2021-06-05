<form method="POST" id="field_add_form" class="field_form_container">
    <div class="form_item">
        <label class="form_label" for="field_add_name">Name:*</label>
        <input class="form_input" type="string" id="field_add_name" name="field_add_name"/>
    </div>

    <div class="form_item">
        <label class="form_label" for="field_add_nameEN">Name (Englisch):</label>
        <input class="form_input" type="string" id="field_add_nameEN" name="field_add_nameEN"/>
    </div>
    
    <div class="form_item">
        <label class="form_label" for="field_add_course">Studiengang:*</label>
        <select class="form_select" id="field_add_course" name="field_add_course">
            <?php
                if($result->num_rows) {
                    foreach($result as $course) {
                    ?>
                        <option value="<?php echo $course["ID"];?>"><?php echo $course["name"];?></option>
                    <?php
                    }
                }
            ?>
        </select>
    </div>

    <span class="mandatory_notice">*Pflichtfeld</span>
    <button class="form_submit button" type="button" id="field_add_submit">Speichern</button>
</form>