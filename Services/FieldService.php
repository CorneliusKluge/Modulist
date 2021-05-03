<?php

namespace Modulist\Services;

use Modulist\Models\CourseModel;
use Modulist\Models\FieldModel;

class FieldService {
    static function addField($name, $nameEN, $courseID) {
        if(isset($name, $course)) {
            if(!empty($name) && !empty($courseID)) {
                if(FieldModel::isFieldByName($name)) {
                    echo "Eine Studienrichtung mit diesem Namen gibt es bereits.";
                    return;
                }

                if(!CourseModel::isCourseByID($courseID)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return;
                }

                FieldModel::addField($name, $nameEN, $courseID);

                echo "Die Studienrichtung wurde erfolgreich eingetragen.";
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