<?php

namespace Modulist\Services;

use Modulist\Models\ExamModel;
use Modulist\Models\ModuleModel;

class ModuleService {
    static function addModule(
        $name, 
        $nameEN, 
        $code,
        $course, 
        $fields,
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
        $categories, 
        $exams, 
        $responsibleName,
        $responsibleEmail,
        $lectureLanguage,
        $frequency,
        $media,
        $basicLiteraturePreNote,
        $basicLiterature, 
        $basicLiteraturePostNote,
        $deepeningLiteraturePreNote,
        $deepeningLiterature, 
        $deepeningLiteraturePostNote,
        $overallGradeWeighting,
        $presenceCreditHours,
        $selfLearningCreditHours
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

                $moduleAdded = true;
                $fieldAdded = true;
                $categoriesAdded = true;
                $examsAdded = true;
                $basicLiteratureAdded = true;
                $deepeningLiteratureAdded = true;

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
                    $deepeningLiteraturePostNote,
                    $overallGradeWeighting,
                    $presenceCreditHours,
                    $selfLearningCreditHours
                );

                $moduleID = ModuleModel::getModuleByName($name)->ID;
                foreach($fields as $field) {
                    $fieldAdded = ModuleModel::addFieldToModule($moduleID, $field, $course);
                } 
                foreach($categories as $category) {   
                    $categoriesAdded = ModuleModel::addCategoriesToModule($moduleID, $category);
                }
                foreach($exams as $exam) { 
                    $examsAdded = ExamModel::addExamToModule($moduleID, $exam);
                }
                foreach($basicLiterature as $basicLiteratureID) {
                    $basicLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $basicLiteratureID, 1);
                }
                foreach($deepeningLiterature as $deepeningLiteratureID) {
                    $deepeningLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $deepeningLiteratureID, 0);
                }
                
               
                if(!$moduleAdded) {
                    echo "Die Daten des Moduls wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$fieldAdded) {
                    echo "Die Studienrichtung wurde nicht ordnungsgemäß gespeichert.";
                }

                if(!$categoriesAdded) {
                    echo "Die Daten für die Modulkategorie wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$examsAdded) {
                    echo "Die Daten für die Prüfung wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$basicLiteratureAdded) {
                    echo "Die Basisliteratur wurde nicht ordnungsgemäß gespeichert.";
                }

                if(!$deepeningLiteratureAdded) {
                    echo "Die vertiefende Literatur wurde nicht ordnungsgemäß gespeichert.";
                }

                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "Das Modul wurde erfolgreich eingetragen.";
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
        $course, 
        $fields,
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
        $categories, 
        $exams, 
        $responsibleName,
        $responsibleEmail,
        $lectureLanguage,
        $frequency,
        $media,
        $basicLiteraturePreNote,
        $basicLiterature, 
        $basicLiteraturePostNote,
        $deepeningLiteraturePreNote,
        $deepeningLiterature, 
        $deepeningLiteraturePostNote,
        $overallGradeWeighting,
        $presenceCreditHours,
        $selfLearningCreditHours
    ) {
        if(isset($name)) {
            if(!empty($name)) {
                ModuleModel::deleteModuleField($moduleID);
                ModuleModel::deleteModuleCategory($moduleID);
                ModuleModel::deleteModuleLiterature($moduleID);
                ExamModel::deleteExamsByModuleID($moduleID);
                    
                $moduleAdded = true;
                $fieldAdded = true;
                $categoriesAdded = true;
                $examsAdded = true;
                $basicLiteratureAdded = true;
                $deepeningLiteratureAdded = true;

                $lockedFlag = ModuleModel::getModuleByID($moduleID)->lockedFlag; 

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
                    $deepeningLiteraturePostNote,
                    $overallGradeWeighting,
                    $presenceCreditHours,
                    $selfLearningCreditHours,
                    $lockedFlag
                );

                if(!empty($fields)) {
                    foreach($fields as $field) {
                        $fieldAdded = ModuleModel::addFieldToModule($moduleID, $field, $course);
                    }
                }
                
                if(!empty($categories)) {
                    foreach($categories as $category) {
                        $categoriesAdded = ModuleModel::addCategoriesToModule($moduleID, $category);
                    }
                }

                if(!empty($exams)) {
                    foreach($exams as $exam) {
                        $examsAdded = ExamModel::addExamToModule($moduleID, $exam);
                    }
                }

                if(!empty($basicLiterature)) {
                    foreach($basicLiterature as $basicLit) {
                        $basicLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $basicLit, 1);
                    }
                }
                
                if(!empty($deepeningLiterature)) {
                    foreach($deepeningLiterature as $deepeningLit) {
                        $deepeningLiteratureAdded = ModuleModel::addLiteratureToModule($moduleID, $deepeningLit, 0);
                    }
                }

                if(!$moduleAdded) {
                    echo "Die Daten des Moduls wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$fieldAdded) {
                    echo "Die Studienrichtung wurde nicht ordnungsgemäß gespeichert.";
                }

                if(!$categoriesAdded) {
                    echo "Die Daten für die Modulkategorie wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$examsAdded) {
                    echo "Die Daten für die Prüfung wurden nicht ordnungsgemäß gespeichert.";
                }

                if(!$basicLiteratureAdded) {
                    echo "Die Basisliteratur wurde nicht ordnungsgemäß gespeichert.";
                }

                if(!$deepeningLiteratureAdded) {
                    echo "Die vertiefende Literatur wurde nicht ordnungsgemäß gespeichert.";
                }

                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "Das Modul wurde erfolgreich aktualisiert.";
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

    static function lockModule($moduleID) {
        $module = ModuleModel::getModuleByID($moduleID);

        if(!empty($module)) {
            $lockState = $module->lockedFlag;

            if($lockState == 0) {
                $lockState = 1;
            }
            else {
                $lockState = 0;
            }
            
            ModuleModel::lockModule($moduleID, $lockState);
        }
    }
}