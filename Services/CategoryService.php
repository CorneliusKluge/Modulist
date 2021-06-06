<?php

namespace Modulist\Services;

use Modulist\Models\CategoryModel;

class CategoryService {
    static function addCategory($name, $presenceFlag, $position) {
        if(isset($name, $position)) {
            if(!empty($name) && !empty($position)) {
                if(CategoryModel::getCategoryByName($name)) {
                    echo "<div class='service_notice service_notice--failure'>Eine Modulkategorie mit diesem Namen gibt es bereits.</div>";
                    return false;
                }

                CategoryModel::addCategory($name, $presenceFlag, $position);

                echo "<div class='service_notice service_notice--success'>Die Modulkategorie wurde erfolgreich eingetragen.</div>";

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
    static function changeCategory($id, $name, $presenceFlag, $position) {
        if(isset($name, $position)) {
            if(!empty($name) && !empty($position)) {

                CategoryModel::changeCategory($id, $name, $presenceFlag, $position);

                echo "<div class='service_notice service_notice--success'>Die Modulkategorie wurde erfolgreich geändert.</div>";

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

    static function deleteCategory($id) {
        if(!CategoryModel::getCategoryByID($id)) {
            echo "<div class='service_notice service_notice--failure'>Die ausgewählte Modulkategorie konnte nicht gefunden werden.</div>";
            return false;
        }

        CategoryModel::deleteCategory($id);

        echo "<div class='service_notice service_notice--success'>Die ausgewählte Modulkategorie wurde erfolgreich gelöscht";

        return true;
    }
}
