<?php

namespace Modulist\Services;

use Modulist\Models\CategoryModel;

class CategoryService {
    static function addCategory($name, $presenceFlag, $position) {
        if(isset($name, $position)) {
            if(!empty($name) && !empty($position)) {
                if(CategoryModel::getCategoryByName($name)) {
                    echo "Eine Modulkategorie mit diesem Namen gibt es bereits.";
                    return false;
                }

                CategoryModel::addCategory($name, $presenceFlag, $position);

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
    static function changeCategory($id, $name, $presenceFlag, $position) {
        if(isset($name, $position)) {
            if(!empty($name) && !empty($position)) {

                CategoryModel::changeCategory($id, $name, $presenceFlag, $position);

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

    static function deleteCategory($id) {
        if(!CategoryModel::getCategoryByID($id)) {
            echo "Die ausgewählte Modulkategorie konnte nicht gefunden werden.";
            return false;
        }

        CategoryModel::deleteCategory($id);

        echo "Die ausgewählte Modulkategorie wurde erfolgreich gelöscht";

        return true;
    }
}
