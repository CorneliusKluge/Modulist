<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class ExamModel {
    static function getExamsByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM exams WHERE moduleID = $moduleID";
        $result = mysqli_query($db, $query);

        $result = mysqli_fetch_object($result);

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

    static function isModuleExamByTypeAndID($examType, $moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $examType);
        $name = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT id FROM exams WHERE examType = $examType AND moduleID <> $moduleID";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }

    static function addExamToModule($moduleID, $exams) {
        $db = DatabaseService::getDatabaseObject();
        if(!empty($exams)){
            if(empty($moduleID)) {
                return false;
            }

            foreach($exams as $row) { 
                $examType = mysqli_real_escape_string($db, $row[0]);
                $examDuration = mysqli_real_escape_string($db, $row[1]);
                $examCircumference = mysqli_real_escape_string($db, $row[2]);
                $examPeriod = mysqli_real_escape_string($db, $row[3]);
                $examWeighting = mysqli_real_escape_string($db, $row[4]);

                if(empty($examType)) {
                    $examType = 0;
                }
                
                if(empty($examDuration)) {
                    $examDuration = "NULL";
                }

                if(empty($examWeighting)) {
                    $examWeighting = "NULL";
                }

                $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examWeighting) 
                                VALUES ($moduleID, $examType, $examDuration, NULLIF('$examCircumference',''), NULLIF('$examPeriod',''), $examWeighting)";

                $result = mysqli_query($db, $insert);
            }
        }
        return $result;
    }

    static function deleteExamsByModuleID($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "DELETE FROM exams WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function updateExamOfModule($moduleID, $exams) {
        $db = DatabaseService::getDatabaseObject();
        if(!empty($exams)){
            if(empty($moduleID)) {
                return false;
            }

            foreach($exams as $row) { 
                $examType = mysqli_real_escape_string($db, $row[0]);
                $examDuration = mysqli_real_escape_string($db, $row[1]);
                $examCircumference = mysqli_real_escape_string($db, $row[2]);
                $examPeriod = mysqli_real_escape_string($db, $row[3]);
                $examWeighting = mysqli_real_escape_string($db, $row[4]);

                if(empty($examType)) {
                    $examType = 0;
                }
                
                if(empty($examDuration)) {
                    $examDuration = "NULL";
                }

                if(empty($examWeighting)) {
                    $examWeighting = "NULL";
                }

                $query = "UPDATE exams SET moduleID = $moduleID, examType = $examType, examDuration = $examDuration, examCircumference = NULLIF('$examCircumference',''), 
                                           examPeriod = NULLIF('$examPeriod',''), examWeighting = $examWeighting";

                $result = mysqli_query($db, $query);
            }
        }
        return $result;
    }
}