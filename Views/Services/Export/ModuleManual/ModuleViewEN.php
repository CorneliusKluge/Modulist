<h1>Module Manual <?php ?>// ???</h1>
<?php
if($result->num_rows) {
?>
<table>
    <?php
    foreach($result as $module) {
    ?>
        <tr>
            <td><?php echo $module["code"];?></td>
            <td colspan="2"><?php echo $module["nameEN"];?></td>
        </tr>
        <tr>
            <td><?php echo $module["summaryEN"];?></td>
            <td><?php echo $module["semester"];?>st Semester</td>
            <td><?php echo $module["credits"];?> ECTS</td>
        </tr>
    <?php
    }
    ?>
</table>
<?php
}