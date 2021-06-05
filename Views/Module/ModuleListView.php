<div class="table_container">
    <div class="table_container_header">
        <h2>Liste der Module</h2>
        <form method="POST">
            <input class="table_add_button button" type="submit" id="module_add_button" name="module_add_button" value=""/>
        </form>
    </div>
    <?php
    if($result->num_rows) {
        ?>
        <table id="module_list_table">
            <th>Modulname</th>
            <th>Modulcode</th>
            <th>Modultyp</th>
            <th>Semester</th>
            <th>Credits</th>
            <th>Workload</th>
            <th>Verantwortlicher</th>
            <th>Validität</th>
            <th></th>
        
            <?php foreach($result as $module) {
                ?>
                <tr class="<?php if($module["lockedFlag"] == 1) { echo "table_locked_row";}?>">
                    <td><?php echo $module["name"];?></td>
                    <td><?php echo $module["code"];?></td>
                    <td><?php echo $module["type"];?></td>
                    <td><?php echo $module["semester"];?></td>
                    <td><?php echo $module["credits"];?></td>
                    <td><?php echo $module["totalworkload"];?></td>
                    <td><?php echo $module["responsibleName"];?></td>
                    <td><!--TODO: proof validity and show result--></td>
                    <td class="table_row_functions">
                        <form method="POST">
                            <button type="submit" name="module_change_button" value="<?php echo $module["ID"];?>" class="button table_edit_button"></button>
                        </form>
                        <form method="POST">
                            <button id="module_delete_button" type="submit" name="module_delete_button" value="<?php echo $module["ID"];?>" class="button table_delete_button"></button>
                        </form>
                        <form method="POST">
                            <button class="button <?php if($module["lockedFlag"] == 1) {echo "table_lock_button";} else { echo "table_unlock_button";}?>" type="submit" name="module_lock_button" value="<?php echo $module["ID"];?>"></button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    else {
        echo "Aktuell sind keine Module eingetragen.";
    }
    ?>
</div>