<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class ModuleModel {
/*
    Getting data from Database
*/    
    static function getAllModules() {
        $db = DatabaseService::getDatabaseObject(); // Get the database object which contains login information to access the database

        $query = "SELECT * FROM modules"; // A SQL query
        $result = mysqli_query($db, $query); // Run the sql query and save the result in the variable $result

        return $result; // Return the result
    }

    static function getModulesForList() {
        $db = DatabaseService::getDatabaseObject();
        
        //TODO: update sql statement if other colums needed 
        $query = "SELECT t1.*, t2.totalworkload FROM modules as t1 LEFT JOIN (SELECT moduleID, SUM(workload) as totalworkload FROM module_category_mm GROUP BY moduleID) as t2 ON t1.ID = t2.moduleID";
        $result = mysqli_query($db, $query);

        return $result;
    }

    static function getModuleByID($id) {
        $db = DatabaseService::getDatabaseObject();

        $id = mysqli_real_escape_string($db, $id); // Mask the data to prevent sql injection

        $query = "SELECT * FROM modules WHERE id = $id";
        $result = mysqli_query($db, $query);

        if($result->num_rows) { // Check if there are data records (in this case: if there is a module with the given id)
            $result = mysqli_fetch_object($result); // Convert the object into a normal php-object, so you can write e.g. $result->id to get the id of the current data record
        }
        else {
            $result = false; // Return false if there is are no data records (no module with the given id)
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

        $name = mysqli_real_escape_string($db, $name);
        
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

        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);
        $code = mysqli_real_escape_string($db, $code); 
        $summary = mysqli_real_escape_string($db, $summary); 
        $summaryEN = mysqli_real_escape_string($db, $summaryEN);
        $type = mysqli_real_escape_string($db, $type);
        $semester = mysqli_real_escape_string($db, $semester);
        $duration = mysqli_real_escape_string($db, $duration);
        $credits = mysqli_real_escape_string($db, $credits);
        $usability = mysqli_real_escape_string($db, $usability);
        $examRequirement = mysqli_real_escape_string($db, $examRequirement);
        $participationRequirement = mysqli_real_escape_string($db, $participationRequirement);
        $studyContent = mysqli_real_escape_string($db, $studyContent);
        $knowledgeBroadening = mysqli_real_escape_string($db, $knowledgeBroadening);
        $knowledgeDeepening = mysqli_real_escape_string($db, $knowledgeDeepening);
        $instrumentalCompetence = mysqli_real_escape_string($db, $instrumentalCompetence);
        $systemicCompetence = mysqli_real_escape_string($db, $systemicCompetence);
        $communicativeCompetence = mysqli_real_escape_string($db, $communicativeCompetence);
        $responsibleName = mysqli_real_escape_string($db, $responsibleName);
        $responsibleEmail = mysqli_real_escape_string($db, $responsibleEmail);
        $lectureLanguage = mysqli_real_escape_string($db, $lectureLanguage);
        $frequency = mysqli_real_escape_string($db, $frequency);
        $media = mysqli_real_escape_string($db, $media);
        $basicLiteraturePreNote = mysqli_real_escape_string($db, $basicLiteraturePreNote);
        $basicLiteraturePostNote = mysqli_real_escape_string($db, $basicLiteraturePostNote);
        $deepeningLiteraturePreNote = mysqli_real_escape_string($db, $deepeningLiteraturePreNote);
        $deepeningLiteraturePostNote = mysqli_real_escape_string($db, $deepeningLiteraturePostNote);
        $overallGradeWeighting = mysqli_real_escape_string($db, $overallGradeWeighting);
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

        if(empty($overallGradeWeighting)) {
            $overallGradeWeighting = "NULL";
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
                                        presenceCreditHours, selfLearningCreditHours) 
                    VALUES ('$name', NULLIF('$nameEN',''), NULLIF('$code',''), NULLIF('$summary',''), NULLIF('$summaryEN',''), NULLIF('$type',''), 
                    $semester, $duration, $credits, NULLIF('$usability',''), NULLIF('$examRequirement',''), NULLIF('$participationRequirement',''),
                    NULLIF('$studyContent',''), NULLIF('$knowledgeBroadening',''), NULLIF('$knowledgeDeepening',''), NULLIF('$instrumentalCompetence',''),
                    NULLIF('$systemicCompetence',''), NULLIF('$communicativeCompetence',''), NULLIF('$responsibleName',''), NULLIF('$responsibleEmail',''), 
                    NULLIF('$lectureLanguage',''), NULLIF('$frequency',''), NULLIF('$media',''), NULLIF('$basicLiteraturePreNote',''), NULLIF('$basicLiteraturePostNote',''), 
                    NULLIF('$deepeningLiteraturePreNote',''), NULLIF('$deepeningLiteraturePostNote',''), $overallGradeWeighting, $presenceCreditHours, $selfLearningCreditHours)";
        
        $result = mysqli_query($db, $insert);

        return $result;
    }


    static function addFieldToModule($moduleID, $field, $courseID){
        $db = DatabaseService::getDatabaseObject();

        $moduleID = mysqli_real_escape_string($db, $moduleID);
        $field = mysqli_real_escape_string($db, $field);
        $courseID = mysqli_real_escape_string($db, $courseID);

        if(!empty($field)) {
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
        $selfLearningCreditHours
    ) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);
        $code = mysqli_real_escape_string($db, $code); 
        $summary = mysqli_real_escape_string($db, $summary); 
        $summaryEN = mysqli_real_escape_string($db, $summaryEN);
        $type = mysqli_real_escape_string($db, $type);
        $semester = mysqli_real_escape_string($db, $semester);
        $duration = mysqli_real_escape_string($db, $duration);
        $credits = mysqli_real_escape_string($db, $credits);
        $usability = mysqli_real_escape_string($db, $usability);
        $examRequirement = mysqli_real_escape_string($db, $examRequirement);
        $participationRequirement = mysqli_real_escape_string($db, $participationRequirement);
        $studyContent = mysqli_real_escape_string($db, $studyContent);
        $knowledgeBroadening = mysqli_real_escape_string($db, $knowledgeBroadening);
        $knowledgeDeepening = mysqli_real_escape_string($db, $knowledgeDeepening);
        $instrumentalCompetence = mysqli_real_escape_string($db, $instrumentalCompetence);
        $systemicCompetence = mysqli_real_escape_string($db, $systemicCompetence);
        $communicativeCompetence = mysqli_real_escape_string($db, $communicativeCompetence);
        $responsibleName = mysqli_real_escape_string($db, $responsibleName);
        $responsibleEmail = mysqli_real_escape_string($db, $responsibleEmail);
        $lectureLanguage = mysqli_real_escape_string($db, $lectureLanguage);
        $frequency = mysqli_real_escape_string($db, $frequency);
        $media = mysqli_real_escape_string($db, $media);
        $basicLiteraturePreNote = mysqli_real_escape_string($db, $basicLiteraturePreNote);
        $basicLiteraturePostNote = mysqli_real_escape_string($db, $basicLiteraturePostNote);
        $deepeningLiteraturePreNote = mysqli_real_escape_string($db, $deepeningLiteraturePreNote);
        $deepeningLiteraturePostNote = mysqli_real_escape_string($db, $deepeningLiteraturePostNote);
        $overallGradeWeighting = mysqli_real_escape_string($db, $overallGradeWeighting);
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

        if(empty($overallGradeWeighting)) {
            $overallGradeWeighting = "NULL";
        }

        if(empty($presenceCreditHours)) {
            $presenceCreditHours = "NULL";
        }

        if(empty($selfLearningCreditHours)) {
            $selfLearningCreditHours = "NULL";
        }
    
        $insert = "UPDATE modules SET name = '$name', nameEN = NULLIF('$nameEN',''), code = NULLIF('$code',''), summary = NULLIF('$summary',''),
                                      summaryEN = NULLIF('$summaryEN',''), type = NULLIF('$type',''), semester = $semester, duration = $duration,
                                      credits = $credits, usability = NULLIF('$usability',''), examRequirement = NULLIF('$examRequirement',''), 
                                      participationRequirement = NULLIF('$participationRequirement',''), studyContent = NULLIF('$studyContent',''), 
                                      knowledgeBroadening = NULLIF('$knowledgeBroadening',''), knowledgeDeepening =  NULLIF('$knowledgeDeepening',''), 
                                      instrumentalCompetence = NULLIF('$instrumentalCompetence',''), systemicCompetence = NULLIF('$systemicCompetence',''), 
                                      communicativeCompetence = NULLIF('$communicativeCompetence',''), responsibleName = NULLIF('$responsibleName',''), 
                                      responsibleEmail = NULLIF('$responsibleEmail',''), lectureLanguage = NULLIF('$lectureLanguage',''), 
                                      frequency = NULLIF('$frequency',''), media = NULLIF('$media',''), basicLiteraturePreNote = NULLIF('$basicLiteraturePreNote',''), 
                                      basicLiteraturePostNote = NULLIF('$basicLiteraturePostNote',''), deepeningLiteraturePreNote = NULLIF('$deepeningLiteraturePreNote',''), 
                                      deepeningLiteraturePostNote = NULLIF('$deepeningLiteraturePostNote',''), overallGradeWeighting = $overallGradeWeighting, 
                                      presenceCreditHours = $presenceCreditHours, selfLearningCreditHours = $selfLearningCreditHours
                                  WHERE ID =  $moduleID";
        
        $result = mysqli_query($db, $insert);

        return $result;
    }

   /* static function updateFieldsOfModule($id, $moduleID, $field, $course){
        $db = DatabaseService::getDatabaseObject();

        if(!empty($field)) {
            $id = mysqli_real_escape_string($db, $id);
            $moduleID = mysqli_real_escape_string($db, $moduleID);
            $field = mysqli_real_escape_string($db, $field);
            $course = mysqli_real_escape_string($db, $course);

            if(empty($moduleID)) {
                return false;
            }

            $insert = "UPDATE module_field_mm SET moduleID = $moduleID, fieldID = $field, courseID = $course WHERE ID = $id)";
            $result = mysqli_query($db, $insert);
            return $result;
        }
    }
    
    static function updateCategoriesOfModule($id, $moduleID, $category) {
        $db = DatabaseService::getDatabaseObject();

        if(!empty($categories)) {

            if(empty($moduleID)) {
                return false;
            }

            $id = mysqli_real_escape_string($db, $id);
            $moduleID = mysqli_real_escape_string($db, $moduleID);

            $categoryID = mysqli_real_escape_string($db, $category[0]);
            $workload = mysqli_real_escape_string($db, $category[1]);
            $theoryFlag = mysqli_real_escape_string($db, $category[2]);

            if(empty($categoryID)) {
                return false;
            }
                
            if(empty($workload)) {
                $workload = "NULL";
            }

            if(empty($theoryFlag) && $theoryFlag !== "0") {
                $theoryFlag = "NULL";
            }
                
            $insert = "UPDATE module_category_mm SET moduleID = $moduleID, categoryID = $categoryID, workload = $workload, theoryFlag = $theoryFlag WHERE ID = $id";
                
            $result = mysqli_query($db, $insert);
        }
        return $result;
    }

    static function updateLiteratureOfModule($id, $moduleID, $literatureID, $basicLiteratureFlag) {
        $db = DatabaseService::getDatabaseObject();

        if(!empty($literatureID)) {
            $id = mysqli_real_escape_string($db, $id);
            $moduleID = mysqli_real_escape_string($db, $moduleID);
            $literatureID = mysqli_real_escape_string($db, $literatureID);
            $basicLiteratureFlag = mysqli_real_escape_string($db, $basicLiteratureFlag);

                 
            $insert = "UPDATE module_literature_mm SET moduleID = $moduleID, literatureID = $literatureID, 
                                                       basicLiteratureFlag = $basicLiteratureFlag
                                                   WHERE ID = $id"; 
                
            $result = mysqli_query($db, $insert);
        }
        return $result;
    }*/

    static function getAllModulesOfCourse($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    LEFT JOIN fields AS t3 ON t2.fieldID = t3.id
                    WHERE t3.courseID = $courseID OR t2.courseID = $courseID";
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
    static function getCompulsoryCourseModules($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Pflichtmodul' AND t2.fieldID IS NULL ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getElectiveCourseModules($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Wahlpflichtmodul' AND t2.fieldID IS NULL ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getPracticalCourseModules($courseID) {
        $db = DatabaseService::getDatabaseObject();

        $courseID = mysqli_real_escape_string($db, $courseID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.courseID = $courseID AND t1.type = 'Praxismodul' AND t2.fieldID IS NULL ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getCompulsoryModulesByField($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Pflichtmodul' ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getElectiveModulesByField($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Wahlpflichtmodul' ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
    static function getPracticalModulesByField($fieldID) {
        $db = DatabaseService::getDatabaseObject();

        $fieldID = mysqli_real_escape_string($db, $fieldID);

        $query = "SELECT t1.* FROM modules AS t1
                    JOIN module_field_mm AS t2 ON t1.id = t2.moduleID
                    WHERE t2.fieldID = $fieldID AND t1.type = 'Praxismodul' ORDER BY t1.semester";
        $result = mysqli_query($db, $query);

        return $result;
    }
}