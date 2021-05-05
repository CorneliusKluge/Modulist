<form method="POST" id="field_change_form">
    <label for="field_change_name">Name:</label>
    <input type="string" id="field_change_name" name="field_change_name" value="<?php echo $resultField->name;?>"/>

    <br>

    <label for="field_change_nameEN">Name (Englisch):</label>
    <input type="string" id="field_change_nameEN" name="field_change_nameEN" value="<?php echo $resultField->nameEN;?>"/>

    <br>

    <label for="field_change_course">Studiengang:</label>
    <select id="field_change_course" name="field_change_course">
        <?php
            if($resultCourses->num_rows) {
                foreach($resultCourses as $course) {
                ?>
                    <option value="<?php echo $course["ID"];?>" <?php if($resultField->courseID == $course["ID"]) echo "selected";?>><?php echo $course["name"];?></option>
                <?php
                }
            }
        ?>
    </select>

    <br>

    <button type="button" id="field_change_submit" data-id="<?php echo $resultField->ID;?>">Speichern</button>
</form>