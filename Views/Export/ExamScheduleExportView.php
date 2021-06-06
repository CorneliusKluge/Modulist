<div class="export_exam_schedules_container">
    <div class="exam_schedules_container_header">
        <h2>Prüfungsplan exportieren</h2>
    </div>
    <form method="POST" class="export_form_container">
        <div class="export_notice">
            Bitte beachten Sie, dass nur diejenigen Module exportiert werden, welche in der Listenansicht unter "Module" als valide gekennzeichnet sind.
        </div>
        <div class="form_item">
            <label class="form_label" for="export_examSchedule_course">Studiengang wählen</label>
            <select class="form_select" id="export_examSchedule_course" name="export_examSchedule_course">
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
        </div>
        <button type="submit" name="export_examSchedule_submit" class="button form_submit">Exportieren</button>
    </form>
</div>