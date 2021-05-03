<h2>Studienrichtung hinzufügen</h2>

<form method="POST">
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
                    <option value="<?php echo $course["id"];?>"><?php echo $course["name"];?></option>
                <?php
                }
            }
        ?>
    </select>

    <br>

    <input type="submit" name="field_add_submit"/>
</form>