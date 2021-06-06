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
                    echo "<div class='service_notice service_notice--failure'>Ein Modul mit diesem Namen gibt es bereits.</div>";
                    return false;
                }
                if(!empty($code)) {
                    if(ModuleModel::getModuleByModuleCode($code)) {
                        echo "<div class='service_notice service_notice--failure'>Ein Modul mit diesem Modulcode gibt es bereits.</div>";
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
                    echo "<div class='service_notice service_notice--failure'>Die Daten des Moduls wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$fieldAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Studienrichtung wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$categoriesAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Daten für die Modulkategorie wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$examsAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Daten für die Prüfung wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$basicLiteratureAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Basisliteratur wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$deepeningLiteratureAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die vertiefende Literatur wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "<div class='service_notice service_notice--success'>Das Modul wurde erfolgreich eingetragen.</div>";
                }

                return true;
            }
            else {
                echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
            }
        }
        else {
            echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
        }
    }

    static function deleteModule($id) {
        if(isset($id)) {
            if(!ModuleModel::getModuleByID($id)) {
                echo "<div class='service_notice service_notice--failure'>Das ausgewählte Modul konnte nicht gefunden werden.</div>";
                return false;
            }

            $moduleDeleted = ModuleModel::deleteModule($id);
            $fieldDeleted = ModuleModel::deleteModuleField($id);
            $categoriesDeleted = ModuleModel::deleteModuleCategory($id);
            $examsDeleted = ExamModel::deleteExamsByModuleID($id);
            $LiteratureDeleted = ModuleModel::deleteModuleLiterature($id);

            if($moduleDeleted && $fieldDeleted && $categoriesDeleted && $examsDeleted && $LiteratureDeleted) {
                echo "<div class='service_notice service_notice--success'>Das ausgewählte Modul wurde erfolgreich gelöscht.</div>";
            }
            else {
                echo "<div class='service_notice service_notice--failure'>Es ist ein Fehler beim Löschen des Moduls aufgetreten. Bitte versuchen Sie es erneut.</div>";
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
                    echo "<div class='service_notice service_notice--failure'>Die Daten des Moduls wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$fieldAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Studienrichtung wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$categoriesAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Daten für die Modulkategorie wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$examsAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Daten für die Prüfung wurden nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$basicLiteratureAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die Basisliteratur wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if(!$deepeningLiteratureAdded) {
                    echo "<div class='service_notice service_notice--failure'>Die vertiefende Literatur wurde nicht ordnungsgemäß gespeichert.</div>";
                }

                if($moduleAdded && $fieldAdded && $categoriesAdded && $examsAdded && $basicLiteratureAdded && $deepeningLiteratureAdded) {
                    echo "<div class='service_notice service_notice--success'>Das Modul wurde erfolgreich aktualisiert.</div>";
                }

                return true;
            }
            else {
                echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
            }
        }
        else {
            echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
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