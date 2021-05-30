<div class="export_module_manual_container">
    <div class="module_manual_container_header">
        <h2>Modulhandbuch exportieren</h2>
    </div>
    <form method="POST">
        <label for="export_moduleManual_course">Studiengang wählen</label>
        <select id="export_moduleManual_course" name="export_moduleManual_course">
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

        <label for="export_moduleManual_lang">Sprache wählen</label>
        <select id="export_moduleManual_lang" name="export_moduleManual_lang">
            <option value="de">Deutsch</option>
            <option value="en">Englisch</option>
        </select>

        <button type="submit" name="export_moduleManual_submit">Exportieren</button>
    </form>
</div>