<form method="POST" id="literature_add_form">

    <!-- (authors, title, releaseDate, edition, releasePlace, publisher, isbn) -->

    <label for="literature_add_authors">Autor:</label>
    <input type="string" id="literature_add_authors" name="literature_add_authors"/>

    <br>

    <label for="literature_add_title">Titel:</label>
    <input type="string" id="literature_add_title" name="literature_add_title"/>

    <br>

    <label for="literature_add_releaseDate">Erscheinungsdatum:</label>
    <input type="string" id="literature_add_releaseDate" name="literature_add_releaseDate"/>

    <br>

    <label for="literature_add_edition">Auflage:</label>
    <input type="string" id="literature_add_edition" name="literature_add_edition"/>

    <br>

    <label for="literature_add_publisher">Verlag:</label>
    <input type="string" id="literature_add_publisher" name="literature_add_publisher"/>
    
    <br>
    
    <label for="literature_add_isbn">ISBN:</label>
    <input type="string" id="literature_add_isbn" name="literature_add_isbn"/>

    <br>

    <button type="button" id="literature_add_submit" data-id="<?php echo $resultLiterature->ID;?>">Speichern</button>
</form>