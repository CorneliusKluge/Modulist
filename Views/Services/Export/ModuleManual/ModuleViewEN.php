<h1>Module Manual <?php echo $courseNameEN;?></h1>
<style>
    td {
        border: 1p solid black;
    }
</style>
<table>
    <?php
    use Modulist\Models\FieldModel;

    foreach($courseModules as $module) {
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
    foreach($fieldModules as $id => $modules) {
        if(count($modules)) {
            $fieldName = FieldModel::getFieldByID($id)->nameEN;
            ?>
            <tr>
                <td colspan="3"><?php echo $fieldName;?></td>
            </tr>
            <?php
            foreach($modules as $module) {
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
        }
    }
    ?>
</table>