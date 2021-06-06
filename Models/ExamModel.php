<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class ExamModel {
    static function getExamsByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM exams WHERE moduleID = $moduleID ORDER BY examSemester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function isExamByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM exams WHERE ID = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }

    static function addExamToModule($moduleID, $exam) {
        $db = DatabaseService::getDatabaseObject();
        if(!empty($exam)) {
            if(empty($moduleID)) {
                return false;
            }
            $examType = mysqli_real_escape_string($db, $exam[0]);
            $examDuration = mysqli_real_escape_string($db, $exam[1]);
            $examCircumference = mysqli_real_escape_string($db, $exam[2]);
            $examPeriod = mysqli_real_escape_string($db, $exam[3]);
            $examSemester = mysqli_real_escape_string($db, $exam[4]);
            $examWeighting = mysqli_real_escape_string($db, $exam[5]);

            if(empty($examType)) {
                $examType = 0;
            }
            
            if(empty($examDuration)) {
                $examDuration = "NULL";
            }

            if(empty($examSemester)) {
                $examSemester = "NULL";
            }

            if(!empty($examWeighting) && !empty($examPeriod)) {
                $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examSemester, examWeighting) 
                                VALUES ($moduleID, $examType, $examDuration, NULLIF('$examCircumference',''), '$examPeriod', $examSemester, $examWeighting)";
                $result = mysqli_query($db, $insert);
                return $result;
            }
        }
        return false;
    }

    static function deleteExamsByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "DELETE FROM exams WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getExamsByModuleIDAndSemester($moduleID, $semester) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $semester = mysqli_real_escape_string($db, $semester);

        $query = "SELECT * FROM exams WHERE moduleID = $moduleID AND examSemester = $semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
}