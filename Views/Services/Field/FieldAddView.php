<form method="POST" id="field_add_form">
    <label for="field_add_name">Name:</label>
    <input type="string" id="field_add_name" name="field_add_name"/>

    <br>

    <label for="field_add_nameEN">Name (Englisch):</label>
    <input type="string" id="field_add_nameEN" name="field_add_nameEN"/>

    <br>

    <label for="field_add_course">Studiengang:</label>
    <select id="field_add_course" name="field_add_course">
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

    <br>

    <button type="button" id="field_add_submit">Speichern</button>
</form>