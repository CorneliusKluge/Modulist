<div class="table_container">
    <div class="table_container_header">
        <h2>Liste der Modulkategorieangaben</h2>
        <form method="POST">
            <input class="table_add_button button" name="category_add_button" type="submit" value=""/>
        </form>
        <input class="table_search_input" type="search" id="category_list_search" placeholder="Suchen..." name="category_list_search"/>
    </div>
<!--TODO: place it right (stylesheet.css)-->
    <?php
        if($categories->num_rows) {
    ?>
    <table id="category_list_table">
        <th>Name</th>
        <th>Präsenz</th>
        <th>Position</th>
        <?php foreach($categories as $category) {
            ?>
                <tr>
                    <!-- TODO: echo category["alles"] ((basically)) -->
                    <td><?php echo $category["name"];?></td>
                    <td><?php echo $category["presenceFlag"];?></td>
                    <td><?php echo $category["position"];?></td>
  
                    <td><!--TODO: proof validity and show result--></td>
                    <td>
                        <form method="POST">
                            <button type="submit" name="category_change_button" value="<?php echo $category["ID"];?>">Bearbeiten</button>
                        </form>
                        <form method="POST">
                            <button type="submit" name="category_delete_button" value="<?php echo $category["ID"];?>">Löschen</button>
                        </form>
                    </td>
                </tr>
            <?php
            }
        }
        else{
            echo "Aktuell sind keine Modulkategorien eingetragen.";
        }
    ?>
    </table>
</div>