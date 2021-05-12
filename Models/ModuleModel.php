<?php

namespace Modulist\Models;

use Modulist\Services\DatabaseService;
use mysqli;

class ModuleModel {
    static function getAllModules() {
        $db = DatabaseService::getDatabaseObject(); // Get the database object which contains login information to access the database

        $query = "SELECT * FROM modules"; // A SQL query
        $result = mysqli_query($db, $query); // Run the sql query and save the result in the variable $result

        return $result; // Return the result
    }

    static function getModulesForList(){
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

    static function getModuleByName($name){
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
        $categories, 
        $exams,
        $responsible,
        $lectureLanguage,
        $frequency,
        $media,
        $basicLiteraturePreNote,
        $basicLiterature,
        $basicLiteraturePostNote,
        $deepeningLiteraturePreNote,
        $deepeningLiterature,
        $deepeningLiteraturePostNote
    ) {
        $db = DatabaseService::getDatabaseObject();

        $name = mysqli_real_escape_string($db, $name);
        $nameEN = mysqli_real_escape_string($db, $nameEN);
        $code = mysqli_real_escape_string($db, $code); 
        $field = mysqli_real_escape_string($db, $field);
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
        $responsible = mysqli_real_escape_string($db, $responsible);
        $lectureLanguage = mysqli_real_escape_string($db, $lectureLanguage);
        $frequency = mysqli_real_escape_string($db, $frequency);
        $media = mysqli_real_escape_string($db, $media);
        $basicLiteraturePreNote = mysqli_real_escape_string($db, $basicLiteraturePreNote);
        $basicLiteraturePostNote = mysqli_real_escape_string($db, $basicLiteraturePostNote);
        $deepeningLiteraturePreNote = mysqli_real_escape_string($db, $deepeningLiteraturePreNote);
        $deepeningLiteraturePostNote = mysqli_real_escape_string($db, $deepeningLiteraturePostNote);

        if(empty($semester)){
            $semester = "NULL";
        }

        if(empty($duration)){
            $duration = "NULL";
        }

        if(empty($credits)){
            $credits = "NULL";
        }
    
        $insert = "INSERT INTO modules (name, nameEN, code, summary, summaryEN, type, semester, duration, credits, usability, 
                                        examRequirement, participationRequirement, studyContent, knowledgeBroadening, 
                                        knowledgeDeepening, instrumentalCompetence, systemicCompetence, communicativeCompetence,
                                        responsible, lectureLanguage, frequency, media, basicLiteraturePreNote, 
                                        basicLiteraturePostNote, deepeningLiteraturePreNote, deepeningLiteraturePostNote) 
                    VALUES ('$name', NULLIF('$nameEN',''), NULLIF('$code',''), NULLIF('$summary',''), NULLIF('$summaryEN',''), NULLIF('$type',''), 
                    $semester, $duration, $credits, NULLIF('$usability',''), NULLIF('$examRequirement',''), NULLIF('$participationRequirement',''),
                    NULLIF('$studyContent',''), NULLIF('$knowledgeBroadening',''), NULLIF('$knowledgeDeepening',''), NULLIF('$instrumentalCompetence',''),
                    NULLIF('$systemicCompetence',''), NULLIF('$communicativeCompetence',''), NULLIF('$responsible',''), NULLIF('$lectureLanguage',''),
                    NULLIF('$frequency',''), NULLIF('$media',''), NULLIF('$basicLiteraturePreNote',''), NULLIF('$basicLiteraturePostNote',''), 
                    NULLIF('$deepeningLiteraturePreNote',''), NULLIF('$deepeningLiteraturePostNote',''))";
        

        $result = mysqli_query($db, $insert);
        var_dump($result);
        $fieldAdded = ModuleModel::addFieldToModule($name, $field);
        var_dump($fieldAdded);
        $categoriesAdded = ModuleModel::addCategoriesToModule($name, $categories);
        var_dump($categoriesAdded);
        $examsAdded = ModuleModel::addExamToModule($name, $exams);
        var_dump($examsAdded);
        $basicLiteratureAdded = ModuleModel::addLiteratureToModule($name, $basicLiterature, true);
        var_dump($basicLiteratureAdded);
        $deepeningLiteratureAdded = ModuleModel::addLiteratureToModule($name, $deepeningLiterature, false);
        var_dump($deepeningLiteratureAdded);

        return $result;
    }

    static function addFieldToModule($modulName, $field){
        $db = DatabaseService::getDatabaseObject();

        if(!empty($field)){
            $moduleID = ModuleModel::getModuleByName($modulName)->ID;

            if(empty($moduleID)){
                return false;
            }

            $insert = "INSERT INTO module_field_mm (moduleID, fieldID) VALUES ($moduleID, $field)";
            $result = mysqli_query($db, $insert);
            return $result;
        }
    }
    
    static function addCategoriesToModule($modulName, $categories){
        $db = DatabaseService::getDatabaseObject();

        if(!empty($categories)){
            $moduleID = ModuleModel::getModuleByName($modulName)->ID;

            if(empty($moduleID)){
                return false;
            }

            foreach($categories as $row){ //$categories = array ("0" >= array($categoryID, $workload),...)
                $categoryID = mysqli_real_escape_string($db, $row[0]);
                $workload = mysqli_real_escape_string($db, $row[1]);

                if(empty($categoryID)){
                    return false;
                }
                
                if(empty($workload)){
                    $workload = "NULL";
                }
                
                $insert = "INSERT INTO module_category_mm (moduleID, categoryID, workload) VALUES ('$moduleID', '$categoryID', $workload)";
                
                $result = mysqli_query($db, $insert);
            }
        }
        return $result;
    }

    static function addExamToModule($modulName, $exams){
        $db = DatabaseService::getDatabaseObject();
        if(!empty($exams)){
            $moduleID = ModuleModel::getModuleByName($modulName)->ID;

            if(empty($moduleID)){
                return false;
            }

            foreach($exams as $row){ 
                $examType = mysqli_real_escape_string($db, $row[0]);
                $examDuration = mysqli_real_escape_string($db, $row[1]);
                $examCircumference = mysqli_real_escape_string($db, $row[2]);
                $examPeriod = mysqli_real_escape_string($db, $row[3]);
                $examWeighting = mysqli_real_escape_string($db, $row[4]);

                if(empty($examType)){
                    $examType = 0;
                }
                
                if(empty($examDuration)){
                    $examDuration = "NULL";
                }

                if(empty($examWeighting)){
                    $examWeighting = "NULL";
                }

                if(empty($examCircumference)){
                    if(empty($examPeriod)){
                        $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examWeighting) 
                                    VALUES ('$moduleID', '$examType', $examDuration, NULL, NULL, $examWeighting)";
                    }
                    else{
                        $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examWeighting) 
                                    VALUES ('$moduleID', '$examType', $examDuration, NULL, '$examPeriod', $examWeighting)";
                    }
                }
                else if(empty($examPeriod)){
                    $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examWeighting) 
                                VALUES ('$moduleID', '$examType', $examDuration, '$examCircumference', NULL, $examWeighting)";
                }
                else{
                    $insert = "INSERT INTO exams (moduleID, examType, examDuration, examCircumference, examPeriod, examWeighting) 
                                VALUES ('$moduleID', '$examType', $examDuration, '$examCircumference', '$examPeriod', $examWeighting)";
                }
                $result = mysqli_query($db, $insert);
            }
        }
        return $result;
    }

    static function addLiteratureToModule($modulName, $literature, $basicLiteratureFlag){
        $db = DatabaseService::getDatabaseObject();

        if(!empty($literature)){
            $moduleID = ModuleModel::getModuleByName($modulName)->ID;
            foreach($literature as $literatureID){
                $literatureID = mysqli_real_escape_string($db, $literatureID);
                 
                $insert = "INSERT INTO module_literature_mm (moduleID, literatureID, basicLiteratureFlag) 
                            VALUES ($moduleID, $literatureID, $basicLiteratureFlag)";
                
                $result = mysqli_query($db, $insert);
            }
        }
        return $result;
    }    
}