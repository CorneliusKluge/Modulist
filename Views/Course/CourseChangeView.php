<form class="course_form_container" method="POST" id="course_change_form">
    <div class="form_item">
        <label class="form_label" for="course_change_name">Name:</label>
        <input class="form_input" type="string" id="course_change_name" name="course_change_name" value="<?php echo $result->name;?>"/>
    </div>

    <div class="form_item">
          <label class="form_label" for="course_change_nameEN">Name (Englisch):</label>
        <input class="form_input" type="string" id="course_change_nameEN" name="course_change_nameEN" value="<?php echo $result->nameEN;?>"/>
    </div>

    <button class="form_submit button" type="button" id="course_change_submit" data-id="<?php echo $result->ID;?>">Speichern</button>
</form>