<?php

namespace Modulist\Services;

use Modulist\Models\CourseModel;

class CourseService {
    static function addCourse($name, $nameEN) {
        if(isset($name)) {
            if(!empty($name)) {
                if(CourseModel::isCourseByName($name)) {
                    echo "Einen Studiengang mit diesem Namen gibt es bereits.";
                    return false;
                }

                CourseModel::addCourse($name, $nameEN);

                echo "Der Studiengang wurde erfolgreich eingetragen.";

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
    static function changeCourse($id, $name, $nameEN) {
        if(isset($id, $name)) {
            if(!empty($name)) {
                if(!CourseModel::isCourseByID($id)) {
                    echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                    return false;
                }
                if(CourseModel::isCourseByNameExceptSelf($id, $name)) {
                    echo "Einen Studiengang mit diesem Namen gibt es bereits.";
                    return false;
                }

                CourseModel::updateCourse($id, $name, $nameEN);

                echo "Der Studiengang wurde erfolgreich bearbeitet.";

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
    static function deleteCourse($id) {
        if(isset($id)) {
            if(!CourseModel::isCourseByID($id)) {
                echo "Der ausgewählte Studiengang konnte nicht gefunden werden.";
                return false;
            }

            CourseModel::deleteCourse($id);

            echo "Der ausgewählte Studiengang wurde erfolgreich gelöscht";

            return true;
        }
    }
}