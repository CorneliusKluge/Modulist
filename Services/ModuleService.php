<?php

namespace Modulist\Services;

use Modulist\Models\ExamModel;
use Modulist\Models\ModuleModel;

class ModuleService {
    static function addModule(
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
        $responsibleName,
        $responsibleEmail,
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
        if(isset($name)) {
            if(!empty($name)) {
                if(ModuleModel::getModuleByName($name)) {
                    echo "Ein Modul mit diesem Namen gibt es bereits.";
                    return false;
                }
                if(!empty($code)) {
                    if(ModuleModel::getModuleByModuleCode($code)){
                        echo "Ein Modul mit diesem Modulcode gibt es bereits.";
                        return false;
                    }
                }      
//TODO: insert more conditions (literatureModel checks, categoryModel ckecks, ...)
            /*  if(!CourseModel::isCourseByID($code)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }
            */

                $moduleAdded = ModuleModel::addModule( 
                    $name, 
                    $nameEN, 
                    $code,
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
                    $responsibleName,
                    $responsibleEmail,
                    $lectureLanguage,
                    $frequency,
                    $media,
                    $basicLiteraturePreNote,
                    $basicLiteraturePostNote,
                    $deepeningLiteraturePreNote,
                    $deepeningLiteraturePostNote
                );

                $moduleID = ModuleModel::getModuleByName($name)->ID;

                $fieldAdded = ModuleModel::addFieldToModule($moduleID, $field);
                $categoriesAdded = ModuleModel::addCategoriesToModule($moduleID, $categories);
                $examsAdded = ExamModel::addExamToModule($moduleID, $exams);
                $basicLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $basicLiterature, true);
                $deepeningLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $deepeningLiterature, false);
               
                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "Das Modul wurde erfolgreich eingetragen.";
                }
                else {
                    echo "Beim Anlegen des Moduls trat ein Fehler auf. "
                    ."Bitte prüfen Sie das Modul im Bearbeitungsbereich oder fügen Sie das Modul erneut hinzu.";
                }

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

    static function deleteModule($id) {
        if(isset($id)) {
            if(!ModuleModel::getModuleByID($id)) {
                echo "Das ausgewählte Modul konnte nicht gefunden werden.";
                return false;
            }
            var_dump($id);

            $moduleDeleted = ModuleModel::deleteModule($id);
            $fieldDeleted = ModuleModel::deleteModuleField($id);
            $categoriesDeleted = ModuleModel::deleteModuleCategory($id);
            $examsDeleted = ExamModel::deleteExamsByModuleID($id);
            $LiteratureDeleted = ModuleModel::deleteModuleLiterature($id);

            if($moduleDeleted && $fieldDeleted && $categoriesDeleted && $examsDeleted && $LiteratureDeleted) {
                echo "Das ausgewählte Modul wurde erfolgreich gelöscht";
            }
            else {
                echo "Es ist ein Fehler beim Löschen des Moduls aufgetreten. Bitte versuchen Sie es erneut.";
            }

            return true;
        }
    }

    static function updateModule(
        $moduleID,
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
        $responsibleName,
        $responsibleEmail,
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
        if(isset($name)) {
            if(!empty($name)) {
                if(!empty($moduleID)) {
                    $moduleFieldIDs = ModuleModel::getAllModuleFields($moduleID)->ID;
                    $moduleCategoryIDs = ModuleModel::getAllModuleCategories($moduleID)->ID;
                    $moduleExamIDs = ExamModel::getExamsByModuleID($moduleID)->ID;
                    $moduleLiteratureIDs = ModuleModel::getWholeModuleLiterature($moduleID)->ID;
                }
                
   
//TODO: insert more conditions (literatureModel checks, categoryModel ckecks, ...)
            /*  if(!CourseModel::isCourseByID($code)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }
            */

                $moduleAdded = ModuleModel::updateModule( 
                    $moduleID,
                    $name, 
                    $nameEN, 
                    $code,
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
                    $responsibleName,
                    $responsibleEmail,
                    $lectureLanguage,
                    $frequency,
                    $media,
                    $basicLiteraturePreNote,
                    $basicLiteraturePostNote,
                    $deepeningLiteraturePreNote,
                    $deepeningLiteraturePostNote
                );
//TODO: map ids and entries in corresponding arrays
                if(!empty($field)) {
                    if(!empty($moduleFieldIDs)) {
                        foreach($moduleFieldIDs as $moduleFieldID) {
                            $isOldField = ModuleModel::isModuleFieldByIDs($moduleFieldID, $moduleID);

                            if($isOldField) {
                                $fieldAdded = ModuleModel::updateFieldsOfModule($moduleFieldID,$moduleID, $field);
                            }
                            else {
                                foreach($field as $fieldID) {
                                    $fieldAdded = ModuleModel::addFieldToModule($moduleID, $fieldID);
                                }
                            }
                        }
                    }
                }
                
                if(!empty($categories)) {
                    if(!empty($moduleCategoryIDs)) {
                        foreach($moduleCategoryIDs as $moduleCategoryID) {
                            $isOldCategory = ModuleModel::isModuleCategoryByIDs($moduleCategoryID, $moduleID);

                            if($isOldCategory) {
                                $categoriesAdded = ModuleModel::updateCategoriesOfModule($moduleCategoryID, $moduleID, $categories);
                            }
                            else {
                                $categoriesAdded = ModuleModel::addCategoriesToModule($moduleID, $categories);
                            }
                        }
                    }
                }

                if(!empty($exams)) {
                    if(!empty($moduleExamIDs)) {
                        foreach($moduleExamIDs as $moduleExamID) {
                            $isOldExam = ExamModel::isExamByID($moduleExamID);

                            if($isOldExam) {
                                $examsAdded = ExamModel::updateExamOfModule($moduleExamID, $moduleID, $exams);
                            }
                            else {
                                $categoriesAdded = ModuleModel::addCategoriesToModule($moduleID, $$exams);
                            }
                        }
                    }
                }

                if(!empty($basicLiterature)) {
                    if(!empty($moduleLiteratureIDs)) {
                        foreach($moduleLiteratureIDs as $moduleLiteratureID) {
                            $isOldLiterature = ModuleModel::isModuleLiteratureByIDs($moduleLiteratureID, $moduleID);

                            if($isOldLiterature) {
                                $basicLiteratureAdded = ModuleModel::updateLiteratureOfModule($moduleLiteratureID, $moduleID, $basicLiterature, true);
                            }
                            else {
                                $basicLiteratureAdded = ModuleModel::addLiteratureToModule($moduleLiteratureID, $moduleID, $basicLiterature, true);
                            }
                        }
                    }
                }
                
                if(!empty($$deepeningLiterature)) {
                    if(!empty($moduleLiteratureIDs)) {
                        foreach($moduleLiteratureIDs as $moduleLiteratureID) {
                            $isOldLiterature = ModuleModel::isModuleLiteratureByIDs($moduleLiteratureID, $moduleID);

                            if($isOldLiterature) {
                                $deepeningLiteratureAdded = ModuleModel::updateLiteratureOfModule($moduleLiteratureID, $moduleID, $deepeningLiterature, false);
                            }
                            else {
                                $deepeningLiteratureAdded = ModuleModel::addLiteratureToModule($moduleLiteratureID, $moduleID, $deepeningLiterature, false);
                            }
                        }
                    }
                }
               
                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "Das Modul wurde erfolgreich aktualisiert.";
                }
                else {
                    echo "Beim Aktualisieren des Moduls trat ein Fehler auf. "
                    ."Bitte prüfen Sie das Modul im Bearbeitungsbereich.";
                }

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