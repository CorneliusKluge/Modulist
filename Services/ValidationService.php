<?php

namespace Modulist\Services;

use Modulist\Models\CategoryModel;
use Modulist\Models\ExamModel;
use Modulist\Models\LiteratureModel;
use Modulist\Models\ModuleModel;

class ValidationService {
    static function isModuleValidForModuleManual($moduleID) {
        if($result = ModuleModel::getModuleByID($moduleID)) {
            if(empty($result->type) || empty($result->name) || empty($result->summary) || empty($result->code) || empty($result->semester) || empty($result->duration) || empty($result->credits) || empty($result->usability) || empty($result->examRequirement) || empty($result->participationRequirement) || empty($result->studyContent) || empty($result->knowledgeBroadening) || empty($result->knowledgeDeepening) || empty($result->instrumentalCompetence) || empty($result->systemicCompetence) || empty($result->communicativeCompetence) || empty($result->responsibleName) || empty($result->responsibleEmail) || empty($result->lectureLanguage) || empty($result->frequency) || empty($result->media)) {
                return false;
            }

            $workload = 0;

            $resultPresence = CategoryModel::getPresenceCategoriesByModuleID($result->ID);
            if($resultPresence->num_rows) {
                foreach($resultPresence as $category) {
                    if(empty($category["name"]) || empty($category["workload"])) {
                        return false;
                    }
                    $workload += $category["workload"];
                }
            }

            $resultNonPresence = CategoryModel::getTheoryCategoriesByModuleID($result->ID);
            if($resultNonPresence->num_rows) {
                foreach($resultNonPresence as $category) {
                    if(empty($category["name"]) || empty($category["workload"])) {
                        return false;
                    }
                    $workload += $category["workload"];
                }
            }

            if($workload != $result->credits * 30) {
                return false;
            }

            $resultExams = ExamModel::getExamsByModuleID($result->ID);
            if($resultExams->num_rows) {
                foreach($resultExams as $exam) {
                    if(empty($exam["examType"]) || (empty($exam["examDuration"]) && empty($exam["examCircumference"])) || empty($exam["examPeriod"]) || empty($exam["examWeighting"])) {
                        return false;
                    }
                }
            }
            else {
                false;
            }

            $resultBasicLiterature = LiteratureModel::getBasicLiteratureByModuleID($result->ID);
            if($resultBasicLiterature->num_rows) {
                foreach($resultBasicLiterature as $basicLiterature) {
                    if(empty($basicLiterature["authors"]) || empty($basicLiterature["title"])) {
                        return false;
                    }
                }
            }
            $resultDeepeningLiterature = LiteratureModel::getDeepeningLiteratureByModuleID($result->ID);
            if($resultDeepeningLiterature->num_rows) {
                foreach($resultDeepeningLiterature as $deepeningLiterature) {
                    if(empty($deepeningLiterature["authors"]) || empty($deepeningLiterature["title"])) {
                        return false;
                    }
                }
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
            if(empty($result->code) || empty($result->name) || empty($result->semester) || empty($result->credits) || empty($result->duration)) {
                return false;
            }

            $resultExams = ExamModel::getExamsByModuleID($moduleID);
            if($resultExams->num_rows) {
                foreach($resultExams as $exam) {
                    if(empty($exam["examType"]) || (empty($exam["examDuration"]) && empty($exam["examCircumference"])) || empty($exam["examWeighting"])) {
                        return false;
                    }
                }
            }
            else {
                return false;
            }

            $workload = 0;

            $resultPresence = CategoryModel::getPresenceCategoriesByModuleID($result->ID);
            if($resultPresence->num_rows) {
                foreach($resultPresence as $category) {
                    if(empty($category["name"]) || empty($category["workload"])) {
                        return false;
                    }
                    $workload += $category["workload"];
                }
            }

            $resultNonPresence = CategoryModel::getTheoryCategoriesByModuleID($result->ID);
            if($resultNonPresence->num_rows) {
                foreach($resultNonPresence as $category) {
                    if(empty($category["name"]) || empty($category["workload"])) {
                        return false;
                    }
                    $workload += $category["workload"];
                }
            }

            if($workload != $result->credits * 30) {
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
            if(empty($result->code) || empty($result->name) || empty($result->semester) || empty($result->credits) || empty($result->examRequirement) || empty($result->overallGradeWeighting)) {
                return false;
            }

            $resultExams = ExamModel::getExamsByModuleID($moduleID);

            if($resultExams->num_rows) {
                foreach($resultExams as $exam) {
                    if(empty($exam["examType"]) || (empty($exam["examDuration"]) && empty($exam["examCircumference"])) || empty($exam["examWeighting"]) || empty($exam["examSemester"])) {
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