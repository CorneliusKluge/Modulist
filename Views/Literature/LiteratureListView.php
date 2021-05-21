<div class="table_container">
    <div class="table_container_header">
        <h2>Liste der Literaturangaben</h2>
        <form method="POST" style="
            padding: 5px;
            position: absolute;
            right: calc(30% + 75px);
            height: 30px;
            width: 30px;
            margin: -10px 10px;">
            <input class="table_add_button button" name="literature_add_button" type="submit" value=""/>
        </form>
        <input class="table_search_input" type="search" id="literature_list_search" placeholder="Suchen..." name="literature_list_search"/>
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
                    <!-- TODO: echo literature["alles"] ((basically)) -->
                    <td><?php echo $literature["authors"];?></td>
                    <td><?php echo $literature["year"];?></td>
                    <td><?php echo $literature["title"];?></td>
                    <td><?php echo $literature["edition"];?></td>
                    <td><?php echo $literature["place"];?></td>
                    <td><?php echo $literature["publisher"];?></td>
                    <td><?php echo $literature["isbn"];?></td>
                    
                    <td><!--TODO: proof validity and show result--></td>
                    <td>
                        <form method="POST">
                            <button type="submit" name="literature_change_button" value="<?php echo $literature["ID"];?>">Bearbeiten</button>
                        </form>
                        <form method="POST">
                            <button type="submit" name="literature_delete_button" value="<?php echo $literature["ID"];?>">Löschen</button>
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