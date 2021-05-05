<?php

namespace Modulist\Services;

use Modulist\Models\CourseModel;
use Modulist\Models\FieldModel;

class FieldService {
    static function addField($name, $nameEN, $courseID) {
        if(isset($name, $courseID)) {
            if(!empty($name) && !empty($courseID)) {
                if(FieldModel::isFieldByName($name)) {
                    echo "Eine Studienrichtung mit diesem Namen gibt es bereits.";
                    return false;
                }

                if(!CourseModel::isCourseByID($courseID)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }

                FieldModel::addField($name, $nameEN, $courseID);

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
    static function changeField($id, $name, $nameEN, $courseID) {
        if(isset($id, $name, $courseID)) {
            if(!empty($name) && !empty($courseID)) {
                if(!FieldModel::isFieldByID($id)) {
                    echo "Die ausgewählte Studienrichtung konnte nicht gefunden werden.";
                    return false;
                }
                if(FieldModel::isFieldByNameExceptSelf($id, $name)) {
                    echo "Eine Studienrichtung mit diesem Namen gibt es bereits.";
                    return false;
                }
                if(!CourseModel::isCourseByID($courseID)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }

                FieldModel::updateField($id, $name, $nameEN, $courseID);

                echo "Die Studienrichtung wurde erfolgreich bearbeitet.";

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
    static function deleteField($id) {
        if(isset($id)) {
            if(!FieldModel::isFieldByID($id)) {
                echo "Die ausgewählte Studienrichtung konnte nicht gefunden werden.";
                return false;
            }

            FieldModel::deleteField($id);

            echo "Der ausgewählte Studiengang wurde erfolgreich gelöscht";

            return true;
        }
    }
}