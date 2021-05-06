<form method="POST" id="course_change_form">
    <label for="course_change_name">Name:</label>
    <input type="string" id="course_change_name" name="course_change_name" value="<?php echo $result->name;?>"/>

    <br>

    <label for="course_change_nameEN">Name (Englisch):</label>
    <input type="string" id="course_change_nameEN" name="course_change_nameEN" value="<?php echo $result->nameEN;?>"/>

    <br>

    <button type="button" id="course_change_submit" data-id="<?php echo $result->ID;?>">Speichern</button>
</form>