<?php

namespace Modulist\Services;

use Modulist\Models\ExamModel;
use Modulist\Models\ModuleModel;

class ValidationService {
    static function isModuleValidForModuleManual($moduleID) {
        if($result = ModuleModel::getModuleByID($moduleID)) {
            if(empty($result->type) || empty($result->name) || empty($result->summary) || empty($result->code) || empty($result->semester) || empty($result->duration) || empty($result->credits) || empty($result->usability) || empty($result->examRequirement) || empty($result->participationRequirement) || empty($result->studyContent) || empty($result->knowledgeBroadening) || empty($result->knowledgeDeepening) || empty($result->instrumentalCompetence) || empty($result->systemicCompetence) || empty($result->communicativeCompetence) || empty($result->)) {
                return false;
            }

            

            return true;
        }
        else {
            return false;
        }
    }
    static function isModuleValidForEnglishModuleManual($moduleID) {
        if($result = ModuleModel::getModuleByID($moduleID)) {
            if(empty($result->code) || empty($result->nameEN) || empty($result->summaryEN) || empty($result->semester) || empty($result->credits)) {
                return false;
            }

            return true;
        }
        else {
            return false;
        }
    }
    static function isModuleValidForStudySchedule($moduleID) {
        if($result = ModuleModel::getModuleByID($moduleID)) {
            if(empty($result->code) || empty($result->name) || empty($result->semester) || empty($result->credits) || empty($result->) || empty($result->) || empty($result->) || empty($result->) || empty($result->) || empty($result->) || empty($result->)) {
                return false;
            }

            $resultExams = ExamModel::getExamsByModuleID($moduleID);

            if($resultExams->num_rows) {
                foreach($resultExams as $exam) {
                    if(empty($exam["examType"]) || empty($exam["examDuration"]) || empty($exam["examWeighting"])) {
                        return false;
                    }
                }
            }
            else {
                return false;
            }

            return true;
        }
        else {
            return false;
        }
    }
    static function isModuleValidForExamSchedule($moduleID) {
        if($result = ModuleModel::getModuleByID($moduleID)) {
            if(empty($result->code) || empty($result->name) || empty($result->semester) || empty($result->credits) || empty($result->examRequirement) || empty($result->)) { // ??? Weighting for overall grade
                return false;
            }

            $resultExams = ExamModel::getExamsByModuleID($moduleID);

            if($resultExams->num_rows) {
                foreach($resultExams as $exam) {
                    if(empty($exam["examType"]) || empty($exam["examDuration"]) || (empty($exam["examWeighting"]) || empty($exam["examCircumference"]))) {
                        return false;
                    }
                }
            }
            else {
                return false;
            }

            return true;
        }
        else {
            return false;
        }
    }
}