<h1>Module Manual <?php echo $courseNameEN;?></h1>
<style>
    table {
        border-collapse: collapse;
        width: max-content;
        font-family: Arial, Helvetica, sans-serif;
    }
    td {
        border: 1px solid black;
        text-align: center;
    }
    h1{
        padding-top: 30px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 20px;
    }
    .summary_align {
        text-align: left;
    }
    .cell_style {
        background-color: lightskyblue;
    }
    .heading_extra {
        font-weight: bolder;
    }
</style>
<table>
    <?php
    use Modulist\Models\FieldModel;

    foreach($courseModules as $module) {
    ?>
        <tr class="cell_style">
            <td><?php echo $module["code"];?></td>
            <td colspan="2"><?php echo $module["nameEN"];?></td>
        </tr>
        <tr>
            <td class="summary_align"><?php echo $module["summaryEN"];?></td>
            <td><?php echo $module["semester"];?>st Semester</td>
            <td><?php echo $module["credits"];?> ECTS</td>
        </tr>
    <?php
    }
    foreach($fieldModules as $id => $modules) {
        if(count($modules)) {
            $fieldName = FieldModel::getFieldByID($id)->nameEN;
            ?>
            <tr class="heading_extra">
                <td colspan="3"><?php echo $fieldName;?></td>
            </tr>
            <?php
            foreach($modules as $module) {
            ?>
                <tr class="cell_style">
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