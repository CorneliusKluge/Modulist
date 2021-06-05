<?php

namespace Modulist\Services;

use Modulist\Models\LiteratureModel;

class LiteratureService{
    static function addLiterature($auth, $title, $year, $edition, $place, $publisher, $isbn) {
        if(isset($auth) && isset($title) && isset($year)) {
            if(!empty($auth) && !empty($title) && !empty($year)) {
                if(LiteratureModel::isLiteratureByATY($auth, $title, $year)) {
                    echo "Einen Literatursatz mit überstimmendem Autor, Titel und Erscheinungsjahr gibt es bereits.";
                    return false;
                }
                else {
                    LiteratureModel::addLiterature($auth, $title, $year, $edition, $place, $publisher, $isbn);
                    echo "Der Literatursatz wurde erfolgreich eingetragen.";
                    return true;
                }
            }
            else {
                echo "Bitte füllen Sie alle Pflichtfelder aus.";
            }
        }
        else {
            echo "Bitte füllen Sie alle Pflichtfelder aus.";
        }
    }

    static function changeLiterature($id, $auth, $title, $year, $edition, $place, $publisher, $isbn) {
        if(isset($auth, $title, $year)) {
            if(!empty($auth) && !empty($title) && !empty($year)) {
                if(!LiteratureModel::getLiteratureByID($id)) {
                    echo "Der ausgewählte Literatursatz konnte nicht gefunden werden.";
                    return false;
                }
                if (LiteratureModel::isLiteratureByATYExceptSelf($id, $auth, $title, $year)){
                    echo "Einen Literatursatz mit überstimmendem Autor, Titel und Erscheinungsjahr gibt es bereits.";
                    return false;
                }
                LiteratureModel::changeLiterature($id, $auth, $title, $year, $edition, $place, $publisher, $isbn);
                echo "Der Literatursatz wurde erfolgreich bearbeitet.";
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
    static function deleteLiterature($id) {
        if(isset($id)) {
            if(!LiteratureModel::getLiteratureByID($id)) {
                echo "Der ausgewählte Literatursatz konnte nicht gefunden werden.";
                return false;
            }

            LiteratureModel::deleteLiterature($id);
            echo "Der ausgewählte Literatursatz wurde erfolgreich gelöscht";
            return true;
        }
    }
}