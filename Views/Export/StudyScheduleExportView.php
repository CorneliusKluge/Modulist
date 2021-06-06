<div class="export_study_schedule_container">
    <div class="study_schedule_container_header">
        <h2>Studienablaufplan exportieren</h2>
    </div>
    <form method="POST" class="export_form_container">
        <div>
            Bitte beachten Sie, dass nur diejenigen Module exportiert werden, welche in der Listenansicht unter "Module" als valide gekennzeichnet sind.
        </div>
        <div class="form_item">
            <label class="form_label" for="export_studySchedule_course">Studiengang wählen</label>
            <select class="form_select" id="export_studySchedule_course" name="export_studySchedule_course">
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
        <button type="submit" name="export_studySchedule_submit"  class="button form_submit">Exportieren</button>
    </form>
</div>