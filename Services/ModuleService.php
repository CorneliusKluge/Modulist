<?php

namespace Modulist\Services;

use Modulist\Models\ModuleModel;

class ModuleService {
    static function addField(
        $name, 
        $nameEN, 
        $code, 
        $field,
        $summary, 
        $summaryEN,
        $type,
        $semester,
        $duration,
        $credits,
        $usability,
        $examRequirement,
        $participationRequirement,
        $studyContent,
        $knowledgeBroadening,
        $knowledgeDeepening,
        $instrumentalCompetence,
        $systemicCompetence,
        $communicativeCompetence,
        $categories, //as array("0" => array(category, workload),...)
        $exams, //as array("0" => array(examType, examDuration, examCircumference, examPeriod, examWeighting),...)
        $responsible,
        $lectureLanguage,
        $frequency,
        $media,
        $basicLiteraturePreNote,
        $basicLiterature, //as array(LiteratureID_1, LiteraturID_2,...)
        $basicLiteraturePostNote,
        $deepeningLiteraturePreNote,
        $deepeningLiterature, //as array(LiteratureID_1, LiteraturID_2,...)
        $deepeningLiteraturePostNote
    ) {
        if(isset($name, $code)) {
            if(!empty($name) && !empty($code)) {
                if(ModuleModel::getModuleByName($name)) {
                    echo "Ein Modul mit diesem Namen gibt es bereits.";
                    return false;
                }

                if(ModuleModel::getModuleByModuleCode($code)){
                    echo "Ein Modul mit diesem Modulcode gibt es bereits.";
                    return false;
                }
//TODO: insert more conditions (literatureModel checks, categoryModel ckecks, ...)
            /*  if(!CourseModel::isCourseByID($code)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }
            */
                ModuleModel::addModule( 
                    $name, 
                    $nameEN, 
                    $code,
                    $field, 
                    $summary, 
                    $summaryEN,
                    $type,
                    $semester,
                    $duration,
                    $credits,
                    $usability,
                    $examRequirement,
                    $participationRequirement,
                    $studyContent,
                    $knowledgeBroadening,
                    $knowledgeDeepening,
                    $instrumentalCompetence,
                    $systemicCompetence,
                    $communicativeCompetence,
                    $categories, //as array[categoryIndex][workloadIndex]?
                    $exams, //as array[examTypeIndex][examDurationIndex][examCircumferenceIndex][examPeriodIndex][examWeightingIndex]
                    $responsible,
                    $lectureLanguage,
                    $frequency,
                    $media,
                    $basicLiteraturePreNote,
                    $basicLiterature, //as array[LiteratureIDIndex]
                    $basicLiteraturePostNote,
                    $deepeningLiteraturePreNote,
                    $deepeningLiterature, //as array[LiteratureIDIndex]
                    $deepeningLiteraturePostNote
                );

                echo "Die Studienrichtung wurde erfolgreich eingetragen.";

                return true;
            }
            else {
                echo "Bitte füllen Sie alle Pflichtfelder aus.";
            }
        }
        else {
            echo "Bitte füllen Sie alle Pflichtfelder aus.";
        }
    }
}