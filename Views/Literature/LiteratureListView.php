<div class="table_container">
    <div class="table_container_header">
        <h2>Liste der Literaturangaben</h2>
        <form method="POST">
            <input class="table_add_button button" name="literature_add_button" type="submit" value=""/>
        </form>
    </div>
<!--TODO: place it right (stylesheet.css)-->
    <?php
        if($result->num_rows) {
    ?>
    <table id="literature_list_table">
        <th>Autor</th>
        <th>Jahr</th>
        <th>Titel</th>
        <th>Auflage</th>
        <th>Ort</th>
        <th>Verlag</th>
        <th>ISBN</th>
        <?php foreach($result as $literature) {
            ?>
                <tr>
                    <td><?php echo $literature["authors"];?></td>
                    <td><?php echo $literature["year"];?></td>
                    <td><?php echo $literature["title"];?></td>
                    <td><?php echo $literature["edition"];?></td>
                    <td><?php echo $literature["place"];?></td>
                    <td><?php echo $literature["publisher"];?></td>
                    <td><?php echo $literature["isbn"];?></td>
                    
                    <td><!--TODO: proof validity and show result--></td>
                    <td class="table_row_functions">
                        <form method="POST">
                            <button type="submit" name="literature_change_button" value="<?php echo $literature["ID"];?>" class="button table_edit_button"></button>
                        </form>
                        <form method="POST">
                            <button type="submit" name="literature_delete_button" value="<?php echo $literature["ID"];?>" class="button table_delete_button"></button>
                        </form>
                    </td>
                </tr>
            <?php
            }
        }
        else{
            echo "Aktuell sind keine Literaturangaben eingetragen.";
        }
    ?>
    </table>
</div>