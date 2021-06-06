<?php

namespace Modulist\Services;

use Modulist\Models\CourseModel;
use Modulist\Models\FieldModel;

class FieldService {
    static function addField($name, $nameEN, $courseID) {
        if(isset($name, $courseID)) {
            if(!empty($name) && !empty($courseID)) {
                if(FieldModel::isFieldByName($name)) {
                    echo "<div class='service_notice service_notice--failure'>Eine Studienrichtung mit diesem Namen gibt es bereits.</div>";
                    return false;
                }

                if(!CourseModel::isCourseByID($courseID)) {
                    echo "<div class='service_notice service_notice--failure'>Der ausgewählte Studiengang konnte nicht gefunden werden.</div>";
                    return false;
                }

                FieldModel::addField($name, $nameEN, $courseID);

                echo "<div class='service_notice service_notice--success'>Die Studienrichtung wurde erfolgreich eingetragen.</div>";

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
    static function changeField($id, $name, $nameEN, $courseID) {
        if(isset($id, $name, $courseID)) {
            if(!empty($name) && !empty($courseID)) {
                if(!FieldModel::isFieldByID($id)) {
                    echo "<div class='service_notice service_notice--failure'>Die ausgewählte Studienrichtung konnte nicht gefunden werden.</div>";
                    return false;
                }
                if(FieldModel::isFieldByNameExceptSelf($id, $name)) {
                    echo "<div class='service_notice service_notice--failure'>Eine Studienrichtung mit diesem Namen gibt es bereits.</div>";
                    return false;
                }
                if(!CourseModel::isCourseByID($courseID)) {
                    echo "<div class='service_notice service_notice--failure'>Der ausgewählte Studiengang konnte nicht gefunden werden.</div>";
                    return false;
                }

                FieldModel::updateField($id, $name, $nameEN, $courseID);

                echo "<div class='service_notice service_notice--success'>Die Studienrichtung wurde erfolgreich bearbeitet.</div>";

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
    static function deleteField($id) {
        if(isset($id)) {
            if(!FieldModel::isFieldByID($id)) {
                echo "<div class='service_notice service_notice--failure'>Die ausgewählte Studienrichtung konnte nicht gefunden werden.</div>";
                return false;
            }

            FieldModel::deleteField($id);

            echo "<div class='service_notice service_notice--success'>Die ausgewählte Studienrichtung wurde erfolgreich gelöscht";

            return true;
        }
    }
}