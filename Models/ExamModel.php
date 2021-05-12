<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;

class ExamModel {
    static function getExamsByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM exams WHERE moduleID = $moduleID";
        $result = mysqli_query($db, $query);

        return $result;
    }
}