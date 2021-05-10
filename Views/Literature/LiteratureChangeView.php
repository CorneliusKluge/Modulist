<form method="POST" id="literature_change_form">
    <label for="literature_change_authors">Autor:</label>
    <input type="string" id="literature_change_authors" name="literature_change_autors" value="<?php echo $resultliterature->authors;?>"/>

    <br>

    <label for="literature_change_title">Titel:</label>
    <input type="string" id="literature_change_title" name="literature_change_title" value="<?php echo $resultliterature->title;?>"/>

    <br>

    <label for="literature_change_course">Studiengang:</label>
    <select id="literature_change_course" name="literature_change_course">
        <?php
            if($resultCourses->num_rows) {
                foreach($resultCourses as $course) {
                ?>
                    <option value="<?php echo $course["ID"];?>" <?php if($resultliterature->courseID == $course["ID"]) echo "selected";?>><?php echo $course["name"];?></option>
                <?php
                }
            }
        ?>
    </select>

    <br>

    <button type="button" id="literature_change_submit" data-id="<?php echo $resultliterature->ID;?>">Speichern</button>
</form>