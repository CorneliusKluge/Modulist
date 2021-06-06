<?php

namespace Modulist\Services;

use Modulist\Models\CourseModel;
use Modulist\Models\ModuleModel;

class CourseService {
    static function addCourse($name, $nameEN) {
        if(isset($name)) {
            if(!empty($name)) {
                if(CourseModel::isCourseByName($name)) {
                    echo "<div class='service_notice service_notice--failure'>Einen Studiengang mit diesem Namen gibt es bereits.</div>";
                    return false;
                }

                CourseModel::addCourse($name, $nameEN);

                echo "<div class='service_notice service_notice--success'>Der Studiengang wurde erfolgreich eingetragen.</div>";

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

    static function changeCourse($id, $name, $nameEN) {
        if(isset($id, $name)) {
            if(!empty($name)) {
                if(!CourseModel::isCourseByID($id)) {
                    echo "<div class='service_notice service_notice--failure'><div class='service_notice service_notice--failure'>Der ausgewählte Studiengang konnte nicht gefunden werden.</div>";
                    return false;
                }
                if(CourseModel::isCourseByNameExceptSelf($id, $name)) {
                    echo "<div class='service_notice service_notice--failure'>Einen Studiengang mit diesem Namen gibt es bereits.</div>";
                    return false;
                }

                CourseModel::updateCourse($id, $name, $nameEN);

                echo "<div class='service_notice service_notice--success'>Der Studiengang wurde erfolgreich bearbeitet.</div>";

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
    
    static function deleteCourse($id) {
        if(isset($id)) {
            if(!CourseModel::isCourseByID($id)) {
                echo "<div class='service_notice service_notice--failure'>Der ausgewählte Studiengang konnte nicht gefunden werden.</div>";
                return false;
            }

            CourseModel::deleteCourse($id);
            ModuleModel::deleteModuleFieldByCourseID($id);

            echo "<div class='service_notice service_notice--success'>Der ausgewählte Studiengang wurde erfolgreich gelöscht";

            return true;
        }
    }
}