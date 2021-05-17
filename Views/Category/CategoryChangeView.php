<form method="POST" id="Category_change_form">
    <label for="Category_change_name">Name:</label>
    <input type="string" id="Category_change_name" name="Category_change_name" value="<?php echo $result->name;?>"/>

    <br>

    <label for="Category_change_presenceFlag">Präsenz:</label>
    <input type="checkbox" id="Category_change_presenceFlag" name="Category_change_presenceFlag" value="<?php echo $result->presenceFlag;?>"/>

    <br>

    <label for="Category_change_position">Position:</label>
    <input type="number" id="Category_change_position" name="Category_change_position" value="<?php echo $result->position;?>"/>

    <br>

    <label for="Category_change_creditHours">Workloadstunden:</label>
    <input type="string" id="Category_change_creditHours" name="Category_change_creditHours" value="<?php echo $result->creditHours;?>"/>

    <br>

    <button type="button" id="Category_change_submit" data-id="<?php echo $result->ID;?>">Bearbeitung Speichern</button>
</form>