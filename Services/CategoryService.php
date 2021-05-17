<?php

namespace Modulist\Services;

use Modulist\Models\CategoryModel;

class CategoryService {
    static function addCategory($name, $presenceFlag, $position, $creditHours) {
        if(isset($name, $presenceFlag, $position)) {
            if(!empty($name) && !empty($presenceFlag) && !empty($position)) {
                if(CategoryModel::getCategoryByName($name)) {
                    echo "Eine Modulkategorie mit diesem Namen gibt es bereits.";
                    return false;
                }

                CategoryModel::addCategory($name, $presenceFlag, $position, $creditHours);

                echo "Die Modulkategorie wurde erfolgreich eingetragen.";

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
    static function changeCategory($name, $presenceFlag, $position, $creditHours) {
        if(isset($name, $presenceFlag, $position)) {
            if(!empty($name) && !empty($presenceFlag) && !empty($position)) {

                CategoryModel::changeCategory($name, $presenceFlag, $position, $creditHours);

                echo "Die Modulkategorie wurde erfolgreich geändert.";

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

    static function deleteCategory($name) {
        if(isset($name)) {
            if(!CategoryModel::getCategoryByName($name)) {
                echo "Die ausgewählte Modulkategorie konnte nicht gefunden werden.";
                return false;
            }

            CategoryModel::deleteCategory($name);

            echo "Die ausgewählte Modulkategorie wurde erfolgreich gelöscht";

            return true;
        }
    }
}