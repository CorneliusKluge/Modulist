<div class="table_container">
    <div class="table_container_header">
        <h2>Liste der Modulkategorieangaben</h2>
        <form method="POST">
            <input class="table_add_button button" name="category_add_button" type="submit" value=""/>
        </form>
    </div>

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
                    <td><?php echo $category["name"];?></td>
                    <td><?php echo $category["presenceFlag"];?></td>
                    <td><?php echo $category["position"];?></td>
  
                    <td></td>
                    <td class="table_row_functions">
                        <form method="POST">
                            <button type="submit" name="category_change_button" value="<?php echo $category["ID"];?>" class="button table_edit_button"></button>
                        </form>
                        <form method="POST">
                            <button id="category_delete_button" type="submit" name="category_delete_button" value="<?php echo $category["ID"];?>" class="button table_delete_button"></button>
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