<?php

namespace Modulist\Services;

use Modulist\Models\LiteratureModel;

class LiteratureService{
    static function addLiterature($auth, $title, $year, $edition, $place, $publisher, $isbn) {
        if(isset($auth) && isset($title) && isset($year)) {
            if(!empty($auth) && !empty($title) && !empty($year)) {
                if(LiteratureModel::isLiteratureByATY($auth, $title, $year)) {
                    echo "<div class='service_notice service_notice--failure'>Einen Literatursatz mit überstimmendem Autor, Titel und Erscheinungsjahr gibt es bereits.</div>";
                    return false;
                }
                else {
                    LiteratureModel::addLiterature($auth, $title, $year, $edition, $place, $publisher, $isbn);
                    echo "<div class='service_notice service_notice--success'>Der Literatursatz wurde erfolgreich eingetragen.</div>";
                    return true;
                }
            }
            else {
                echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
            }
        }
        else {
            echo "<div class='service_notice service_notice--failure'>Bitte füllen Sie alle Pflichtfelder aus.</div>";
        }
    }

    static function changeLiterature($id, $auth, $title, $year, $edition, $place, $publisher, $isbn) {
        if(isset($auth, $title, $year)) {
            if(!empty($auth) && !empty($title) && !empty($year)) {
                if(!LiteratureModel::getLiteratureByID($id)) {
                    echo "<div class='service_notice service_notice--failure'>Der ausgewählte Literatursatz konnte nicht gefunden werden.</div>";
                    return false;
                }
                if (LiteratureModel::isLiteratureByATYExceptSelf($id, $auth, $title, $year)){
                    echo "<div class='service_notice service_notice--failure'>Einen Literatursatz mit überstimmendem Autor, Titel und Erscheinungsjahr gibt es bereits.</div>";
                    return false;
                }
                LiteratureModel::changeLiterature($id, $auth, $title, $year, $edition, $place, $publisher, $isbn);
                echo "<div class='service_notice service_notice--success'>Der Literatursatz wurde erfolgreich bearbeitet.</div>";
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
    
    static function deleteLiterature($id) {
        if(isset($id)) {
            if(!LiteratureModel::getLiteratureByID($id)) {
                echo "<div class='service_notice service_notice--failure'>Der ausgewählte Literatursatz konnte nicht gefunden werden.</div>";
                return false;
            }

            LiteratureModel::deleteLiterature($id);
            echo "<div class='service_notice service_notice--success'>Der ausgewählte Literatursatz wurde erfolgreich gelöscht.</div>";
            return true;
        }
    }
}