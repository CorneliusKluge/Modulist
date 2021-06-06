<div class="export_module_manual_container">
    <div class="module_manual_container_header">
        <h2>Modulhandbuch exportieren</h2>
    </div>
    <form method="POST" class="export_form_container">
        <div class="export_notice">
            Bitte beachten Sie, dass nur diejenigen Module exportiert werden, welche in der Listenansicht unter "Module" als valide gekennzeichnet sind.
        </div>
        <div class="form_item">
            <label class="form_label" for="export_moduleManual_course">Studiengang wählen</label>
            <select class="form_select" id="export_moduleManual_course" name="export_moduleManual_course">
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
        <div class="form_item">
            <label class="form_label" for="export_moduleManual_lang">Sprache wählen</label>
            <select class="form_select" id="export_moduleManual_lang" name="export_moduleManual_lang">
                <option value="de">Deutsch</option>
                <option value="en">Englisch</option>
            </select>
        </div>
        <button type="submit" name="export_moduleManual_submit" class="button form_submit">Exportieren</button>
    </form>
</div>