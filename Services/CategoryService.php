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
}