<form method="POST" id="literature_change_form">

    <!-- (authors, title, releaseDate, edition, releasePlace, publisher, isbn) -->

    <label for="literature_change_authors">Autor:</label>
    <input type="string" id="literature_change_authors" name="literature_change_authors"/>

    <br>

    <label for="literature_change_title">Titel:</label>
    <input type="string" id="literature_change_title" name="literature_change_title"/>

    <br>

    <label for="literature_change_releaseDate">Erscheinungsdatum:</label>
    <input type="string" id="literature_change_releaseDate" name="literature_change_releaseDate"/>

    <br>

    <label for="literature_change_edition">Auflage:</label>
    <input type="string" id="literature_change_edition" name="literature_change_edition"/>

    <br>

    <label for="literature_change_publisher">Verlag:</label>
    <input type="string" id="literature_change_publisher" name="literature_change_publisher"/>
    
    <br>
    
    <label for="literature_change_isbn">ISBN:</label>
    <input type="string" id="literature_change_isbn" name="literature_change_isbn"/>

    <br>

    <button type="button" id="literature_change_submit" data-id="<?php echo $resultLiterature->ID;?>">Speichern</button>
</form>