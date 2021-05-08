<form method="POST" id="literature_add_form">
    <label for="literature_add_name">Autor:</label>
    <input type="string" id="literature_add_name" name="literature_add_name"/>

    <br>

    <label for="literature_add_nameEN">Titel</label>
    <input type="string" id="literature_add_nameEN" name="literature_add_nameEN"/>

    <br>

    <label for="literature_add_course">Erscheinungsdatum:</label>
    <input>

    <br>

    <!-- TODO: weitere labels hinzufügen (1 pro Var) -->

    <button type="button" id="literature_add_submit" data-id="<?php echo $resultLiterature->ID;?>">Speichern</button>
</form>