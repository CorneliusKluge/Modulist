<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class ModuleModel {
/*
    Getting data from Database
*/    
    static function getAllModules() {
        $db = DatabaseService::getDatabaseObject(); 

        $query = "SELECT * FROM modules"; 
        $result = mysqli_query($db, $query); 

        return $result; 
    }

    static function getModulesForList() {
        $db = DatabaseService::getDatabaseObject();
        
        $query = "SELECT t1.*, t2.totalworkload FROM modules as t1 LEFT JOIN (SELECT moduleID, SUM(workload) as totalworkload FROM module_category_mm GROUP BY moduleID) as t2 ON t1.ID = t2.moduleID";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getModuleByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "SELECT * FROM modules WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) { 
            $result = mysqli_fetch_object($result); 
        }
        else {
            $result = false; 
        }
        return $result;
    }

    static function getModuleByModuleCode($moduleCode) {
        $db = DatabaseService::getDatabaseObject();

        $moduleCode = mysqli_real_escape_string($db, $moduleCode);
        
        $query = "SELECT * FROM modules WHERE code = '$moduleCode'";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }
        return $result;
    }

    static function getModuleByName($name) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, trim($name));
        
        $query = "SELECT * FROM modules WHERE name = '$name'";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
        }
        else {
            $result = false;
        }
        return $result;
    }

    static function getAllModuleCategories($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM module_category_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getModuleCourse($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT distinct courseID FROM module_field_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function getAllModuleFields($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM module_field_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function getWholeModuleLiterature($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM module_literature_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function getModuleBasicLiterature($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM module_literature_mm WHERE moduleID = $moduleID AND basicLiteratureFlag = 1";

        $result = mysqli_query($db, $query);
        
        return $result;
    }

     static function getModuleDeepeningLiterature($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT * FROM module_literature_mm WHERE moduleID = $moduleID AND basicLiteratureFlag = 0";

        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function isModuleCategoryByIDs($categoryID, $moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $categoryID = mysqli_real_escape_string($db, $categoryID);
        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT id FROM module_category_mm WHERE categoryID = $categoryID AND moduleID <> $moduleID";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }

    static function isModuleFieldByIDs($fieldID, $moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);
        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT id FROM module_field_mm WHERE fieldID = $fieldID AND moduleID <> $moduleID";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }

    static function isModuleLiteratureByIDs($literatureID, $moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $literatureID = mysqli_real_escape_string($db, $literatureID);
        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "SELECT id FROM module_literature_mm WHERE literatureID = $literatureID AND moduleID <> $moduleID";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            return true;
        }
        else {
            return false;
        }
    }

/*
    Add a new Module to Database
*/
    static function addModule(
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
    ) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, trim($name));
        $nameEN = mysqli_real_escape_string($db, trim($nameEN));
        $code = mysqli_real_escape_string($db, trim($code)); 
        $summary = mysqli_real_escape_string($db, trim($summary)); 
        $summaryEN = mysqli_real_escape_string($db, trim($summaryEN));
        $type = mysqli_real_escape_string($db, trim($type));
        $semester = mysqli_real_escape_string($db, $semester);
        $duration = mysqli_real_escape_string($db, $duration);
        $credits = mysqli_real_escape_string($db, $credits);
        $usability = mysqli_real_escape_string($db, trim($usability));
        $examRequirement = mysqli_real_escape_string($db, trim($examRequirement));
        $participationRequirement = mysqli_real_escape_string($db, trim($participationRequirement));
        $studyContent = mysqli_real_escape_string($db, trim($studyContent));
        $knowledgeBroadening = mysqli_real_escape_string($db, trim($knowledgeBroadening));
        $knowledgeDeepening = mysqli_real_escape_string($db, trim($knowledgeDeepening));
        $instrumentalCompetence = mysqli_real_escape_string($db, trim($instrumentalCompetence));
        $systemicCompetence = mysqli_real_escape_string($db, trim($systemicCompetence));
        $communicativeCompetence = mysqli_real_escape_string($db, trim($communicativeCompetence));
        $responsibleName = mysqli_real_escape_string($db, trim($responsibleName));
        $responsibleEmail = mysqli_real_escape_string($db, trim($responsibleEmail));
        $lectureLanguage = mysqli_real_escape_string($db, trim($lectureLanguage));
        $frequency = mysqli_real_escape_string($db, trim($frequency));
        $media = mysqli_real_escape_string($db, trim($media));
        $basicLiteraturePreNote = mysqli_real_escape_string($db, trim($basicLiteraturePreNote));
        $basicLiteraturePostNote = mysqli_real_escape_string($db, trim($basicLiteraturePostNote));
        $deepeningLiteraturePreNote = mysqli_real_escape_string($db, trim($deepeningLiteraturePreNote));
        $deepeningLiteraturePostNote = mysqli_real_escape_string($db, trim($deepeningLiteraturePostNote));
        $overallGradeWeighting = mysqli_real_escape_string($db, trim($overallGradeWeighting));
        $presenceCreditHours = mysqli_real_escape_string($db, $presenceCreditHours);
        $selfLearningCreditHours = mysqli_real_escape_string($db, $selfLearningCreditHours);

        if(empty($semester)) {
            $semester = "NULL";
        }

        if(empty($duration)) {
            $duration = "NULL";
        }

        if(empty($credits)) {
            $credits = "NULL";
        }

        if(empty($presenceCreditHours)) {
            $presenceCreditHours = "NULL";
        }

        if(empty($selfLearningCreditHours)) {
            $selfLearningCreditHours = "NULL";
        }
    
        $insert = "INSERT INTO modules (name, nameEN, code, summary, summaryEN, type, semester, duration, credits, usability, 
                                        examRequirement, participationRequirement, studyContent, knowledgeBroadening, 
                                        knowledgeDeepening, instrumentalCompetence, systemicCompetence, communicativeCompetence,
                                        responsibleName, responsibleEmail, lectureLanguage, frequency, media, basicLiteraturePreNote, 
                                        basicLiteraturePostNote, deepeningLiteraturePreNote, deepeningLiteraturePostNote, overallGradeWeighting,
                                        presenceCreditHours, selfLearningCreditHours, lockedFlag) 
                    VALUES ('$name', NULLIF('$nameEN',''), NULLIF('$code',''), NULLIF('$summary',''), NULLIF('$summaryEN',''), NULLIF('$type',''), 
                    $semester, $duration, $credits, NULLIF('$usability',''), NULLIF('$examRequirement',''), NULLIF('$participationRequirement',''),
                    NULLIF('$studyContent',''), NULLIF('$knowledgeBroadening',''), NULLIF('$knowledgeDeepening',''), NULLIF('$instrumentalCompetence',''),
                    NULLIF('$systemicCompetence',''), NULLIF('$communicativeCompetence',''), NULLIF('$responsibleName',''), NULLIF('$responsibleEmail',''), 
                    NULLIF('$lectureLanguage',''), NULLIF('$frequency',''), NULLIF('$media',''), NULLIF('$basicLiteraturePreNote',''), NULLIF('$basicLiteraturePostNote',''), 
                    NULLIF('$deepeningLiteraturePreNote',''), NULLIF('$deepeningLiteraturePostNote',''), NULLIF('$overallGradeWeighting',''), $presenceCreditHours, $selfLearningCreditHours, 0)";
        
        $result = mysqli_query($db, $insert);

        return $result;
    }


    static function addFieldToModule($moduleID, $field, $courseID) {
        $db = DatabaseService::getDatabaseObject(); 

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $field = mysqli_real_escape_string($db, $field);
        $courseID = mysqli_real_escape_string($db, $courseID);

        if(!empty($field) || $field == 0) {
            if($field == 0) {
                $field = "NULL";
            }

            if(empty($moduleID)) {
                return false;
            }

            $insert = "INSERT INTO module_field_mm (moduleID, fieldID, courseID) VALUES ($moduleID, $field, $courseID)";
            $result = mysqli_query($db, $insert);
            return $result;
        }
        return false;
    }
    
    static function addCategoriesToModule($moduleID, $category) {
        $db = DatabaseService::getDatabaseObject();
        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $categoryID = mysqli_real_escape_string($db, $category[0]);
        $workload = mysqli_real_escape_string($db, $category[1]);
        $theoryFlag = mysqli_real_escape_string($db, $category[2]);
        $semester = mysqli_real_escape_string($db, $category[3]);
  
        if(!empty($category)) {

            if(empty($moduleID)) {
                return false;
            }

            if(empty($categoryID)) {
                return false;
            }
            
            if(empty($workload)) {
                $workload = "NULL";
            }

            if(empty($theoryFlag) && $theoryFlag !== "0") {
                $theoryFlag = "NULL";
            }

            if(empty($semester)) {
                $semester = "NULL";
            }
            
            $insert = "INSERT INTO module_category_mm (moduleID, categoryID, workload, theoryFlag, semester) VALUES ($moduleID, $categoryID, $workload, $theoryFlag, $semester)";
            
            $result = mysqli_query($db, $insert);
            return $result;
        }
        return false;
    }

    static function addLiteratureToModule($moduleID, $literatureID, $basicLiteratureFlag) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $literatureID = mysqli_real_escape_string($db, $literatureID);
        $basicLiteratureFlag = mysqli_real_escape_string($db, $basicLiteratureFlag);

        if(!empty($literatureID)) {
            $insert = "INSERT INTO module_literature_mm (moduleID, literatureID, basicLiteratureFlag) 
                        VALUES ($moduleID, $literatureID, $basicLiteratureFlag)";
            
            $result = mysqli_query($db, $insert);
            return $result;
        }
        return false;
    }    
 
/*
    Delete data of module
*/
    static function deleteModule($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id);

        $query = "DELETE FROM modules WHERE ID = $id";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function deleteModuleCategory($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "DELETE FROM module_category_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function deleteModuleLiterature($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "DELETE FROM module_literature_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

    static function deleteModuleField($moduleID) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);

        $query = "DELETE FROM module_field_mm WHERE moduleID = $moduleID";

        $result = mysqli_query($db, $query);

        return $result;
    }

/*
    Update data of existing module
*/    
    
    static function updateModule(
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
    ) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, trim($name));
        $nameEN = mysqli_real_escape_string($db, trim($nameEN));
        $code = mysqli_real_escape_string($db, trim($code)); 
        $summary = mysqli_real_escape_string($db, trim($summary)); 
        $summaryEN = mysqli_real_escape_string($db, trim($summaryEN));
        $type = mysqli_real_escape_string($db, trim($type));
        $semester = mysqli_real_escape_string($db, $semester);
        $duration = mysqli_real_escape_string($db, $duration);
        $credits = mysqli_real_escape_string($db, $credits);
        $usability = mysqli_real_escape_string($db, trim($usability));
        $examRequirement = mysqli_real_escape_string($db, trim($examRequirement));
        $participationRequirement = mysqli_real_escape_string($db, trim($participationRequirement));
        $studyContent = mysqli_real_escape_string($db, trim($studyContent));
        $knowledgeBroadening = mysqli_real_escape_string($db, trim($knowledgeBroadening));
        $knowledgeDeepening = mysqli_real_escape_string($db, trim($knowledgeDeepening));
        $instrumentalCompetence = mysqli_real_escape_string($db, trim($instrumentalCompetence));
        $systemicCompetence = mysqli_real_escape_string($db, trim($systemicCompetence));
        $communicativeCompetence = mysqli_real_escape_string($db, trim($communicativeCompetence));
        $responsibleName = mysqli_real_escape_string($db, trim($responsibleName));
        $responsibleEmail = mysqli_real_escape_string($db, trim($responsibleEmail));
        $lectureLanguage = mysqli_real_escape_string($db, trim($lectureLanguage));
        $frequency = mysqli_real_escape_string($db, trim($frequency));
        $media = mysqli_real_escape_string($db, trim($media));
        $basicLiteraturePreNote = mysqli_real_escape_string($db, trim($basicLiteraturePreNote));
        $basicLiteraturePostNote = mysqli_real_escape_string($db, trim($basicLiteraturePostNote));
        $deepeningLiteraturePreNote = mysqli_real_escape_string($db, trim($deepeningLiteraturePreNote));
        $deepeningLiteraturePostNote = mysqli_real_escape_string($db, trim($deepeningLiteraturePostNote));
        $overallGradeWeighting = mysqli_real_escape_string($db, trim($overallGradeWeighting));
        $presenceCreditHours = mysqli_real_escape_string($db, $presenceCreditHours);
        $selfLearningCreditHours = mysqli_real_escape_string($db, $selfLearningCreditHours);
        $lockedFlag = mysqli_real_escape_string($db, $lockedFlag);


        if(empty($semester)) {
            $semester = "NULL";
        }

        if(empty($duration)) {
            $duration = "NULL";
        }

        if(empty($credits)) {
            $credits = "NULL";
        }

        if(empty($presenceCreditHours)) {
            $presenceCreditHours = "NULL";
        }

        if(empty($selfLearningCreditHours)) {
            $selfLearningCreditHours = "NULL";
        }

        if(empty($lockedFlag)) {
            $lockedFlag = 0;
        }
    
        $query = "UPDATE modules SET name = '$name', nameEN = NULLIF('$nameEN',''), code = NULLIF('$code',''), summary = NULLIF('$summary',''),
                                      summaryEN = NULLIF('$summaryEN',''), type = NULLIF('$type',''), semester = $semester, duration = $duration,
                                      credits = $credits, usability = NULLIF('$usability',''), examRequirement = NULLIF('$examRequirement',''), 
                                      participationRequirement = NULLIF('$participationRequirement',''), studyContent = NULLIF('$studyContent',''), 
                                      knowledgeBroadening = NULLIF('$knowledgeBroadening',''), knowledgeDeepening =  NULLIF('$knowledgeDeepening',''), 
                                      instrumentalCompetence = NULLIF('$instrumentalCompetence',''), systemicCompetence = NULLIF('$systemicCompetence',''), 
                                      communicativeCompetence = NULLIF('$communicativeCompetence',''), responsibleName = NULLIF('$responsibleName',''), 
                                      responsibleEmail = NULLIF('$responsibleEmail',''), lectureLanguage = NULLIF('$lectureLanguage',''), 
                                      frequency = NULLIF('$frequency',''), media = NULLIF('$media',''), basicLiteraturePreNote = NULLIF('$basicLiteraturePreNote',''), 
                                      basicLiteraturePostNote = NULLIF('$basicLiteraturePostNote',''), deepeningLiteraturePreNote = NULLIF('$deepeningLiteraturePreNote',''), 
                                      deepeningLiteraturePostNote = NULLIF('$deepeningLiteraturePostNote',''), overallGradeWeighting = NULLIF('$overallGradeWeighting',''), 
                                      presenceCreditHours = $presenceCreditHours, selfLearningCreditHours = $selfLearningCreditHours, lockedFlag = $lockedFlag
                                  WHERE ID =  $moduleID";
        
        $result = mysqli_query($db, $query);

        return $result;
    }

/*
    Lock module 
*/
    static function lockModule($moduleID, $lockedFlag) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $lockedFlag = mysqli_real_escape_string($db, $lockedFlag);

        $query = "UPDATE modules SET lockedFlag = $lockedFlag WHERE ID = $moduleID";
        $result = mysqli_query($db, $query);

        return $result;
    }

/*
    Functions needed for export 
*/
    static function getAllModulesOfCourseExceptLocked($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    LEFT JOIN fields AS t3 ON t2.fieldID = t3.id
                    WHERE (t3.courseID = $courseID OR t2.courseID = $courseID) AND t1.lockedFlag = 0";
        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function getAllModulesOfField($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getLVSByModuleIDAndSemster($moduleID, $semester) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $semester = mysqli_real_escape_string($db, $semester);

        $query = "SELECT SUM(workload) AS LVS FROM module_category_mm WHERE moduleID = $moduleID AND semester = $semester AND theoryFlag IS NULL";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
            return $result->LVS;
        }
        else {
            return "";
        }
    }

    static function getEVLTheoryByModuleIDAndSemester($moduleID, $semester) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $semester = mysqli_real_escape_string($db, $semester);

        $query = "SELECT SUM(workload) AS LVS FROM module_category_mm WHERE moduleID = $moduleID AND semester = $semester AND theoryFlag = 1";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
            return $result->LVS;
        }
        else {
            return "";
        }
    }

    static function getEVLPractiseByModuleIDAndSemester($moduleID, $semester) {
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $semester = mysqli_real_escape_string($db, $semester);

        $query = "SELECT SUM(workload) AS LVS FROM module_category_mm WHERE moduleID = $moduleID AND semester = $semester AND theoryFlag = 0";
        $result = mysqli_query($db, $query);

        if($result->num_rows) {
            $result = mysqli_fetch_object($result);
            return $result->LVS;
        }
        else {
            return "";
        }
    }

    static function getCompulsoryCourseModulesExceptLocked($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Pflichtmodul' AND t2.fieldID IS NULL AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);
        
        return $result;
    }

    static function getElectiveCourseModulesExceptLocked($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Wahlpflichtmodul' AND t2.fieldID IS NULL AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getPracticalCourseModulesExceptLocked($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Praxismodul' AND t2.fieldID IS NULL AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getCompulsoryModulesByFieldExceptLocked($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Pflichtmodul' AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getElectiveModulesByFieldExceptLocked($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Wahlpflichtmodul' AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getPracticalModulesByFieldExceptLocked($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Praxismodul' AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getCourseModulesExceptLocked($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t2.fieldID IS NULL AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getModulesByFieldExceptLocked($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.lockedFlag = 0 ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
}