<h1>Liste der Modulkategorien</h1>

%s

<br>

<div>
    <input type="search" id="category_list_search" name="category_list_search" placeholder="Suche">
    <input type="button" id="category_list_add" name="category_list_add">
<table>
    <!--what should be part of the table?-->
    <th>Name</th>
    <th>Präsenz</th>
    <th>Position</th>
    <th>Workload</th>

    <?php
        if($result->num_rows) {
            foreach($result as $category) {
            ?>
                <tr>
                    <!--what should be part of the table?-->
                    <td><?php echo $category["name"];?></td>
                    <td><?php echo $category["presenceFlag"];?></td>
                    <td><?php echo $category["position"];?></td>
                    <td><?php echo $category["creditHours"];?></td>
                    
                    <td>
                        <input type="button" id="category_list_edit" name="category_list_edit"/>
                        <input type="button" id="category_list_delete" name="category_list_delete"/>
                        <label id="category_list_lockLabel">
                            <input type="checkbox" id="category_list_lock" name="category_list_lock"/>
                            <span></span>
                        </label>
                    </td>
                </tr>
            <?php
            }
        }
    ?>
</table>