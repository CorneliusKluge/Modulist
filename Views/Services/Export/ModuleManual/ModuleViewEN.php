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
use Modulist\Models\ModuleModel;
use Modulist\Services\ValidationService;

    $courseModules = mysqli_fetch_all($courseModules, MYSQLI_ASSOC);
    $courseModules = array_filter($courseModules, function($item) {return ValidationService::isModuleValidForEnglishModuleManual($item["ID"]);});
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
    foreach($resultFields as $field) {
        $modules = ModuleModel::getModulesByFieldExceptLocked($field["ID"]);
        $modules = mysqli_fetch_all($modules, MYSQLI_ASSOC);
        $modules = array_filter($modules, function($item) {return ValidationService::isModuleValidForEnglishModuleManual($item["ID"]);});
        if(count($modules)) {
            ?>
            <tr class="heading_extra">
                <td colspan="3"><?php echo $field["nameEN"];?></td>
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