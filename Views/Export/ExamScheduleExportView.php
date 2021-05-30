<div class="export_exam_schedules_container">
    <div class="exam_schedules_container_header">
        <h2>Prüfungsplan exportieren</h2>
    </div>
    <form method="POST">
        <label for="export_examSchedule_course">Studiengang wählen</label>
        <select id="export_examSchedule_course" name="export_examSchedule_course">
            <?php
            if($result->num_rows) {
                foreach($result as $course) {
                ?>
                    <option value="<?php echo $course["ID"];?>"><?php echo $course["name"];?></option>
                <?php
                }
            }
            ?>
        </select>

        <button type="submit" name="export_examSchedule_submit">Exportieren</button>
    </form>
</div>